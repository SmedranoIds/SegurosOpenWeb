<?php

namespace OpenWeb\Admin\Customize;

use OpenWeb\Admin\Customize;
use OpenWeb\Admin\Customize\Control\MultipleCheckbox;

class OpenwebOptions extends Customize
{
    protected function init()
    {
    }

    protected function createPanel($customize)
    {
        $this->customize = $customize;

        $this->customize->add_panel('openweb_options', [
            'title' => __('Opciones OpenWeb', 'openweb'),
            'priority' => 211,
            'capability' => 'edit_theme_options',
        ]);

        $this->createSearchSection();
        $this->createSecuritySection();
    }

    private function createSearchSection()
    {
        $this->customize->add_section('openweb_search_section' , [
            'title' => __('Buscador OpenWeb', 'openweb'),
            'panel' => 'openweb_options',
            'priority' => 1,
            'capability' => 'edit_theme_options',
        ]);

        $this->generateSearchSettings();
    }

    private function generateSearchSettings()
    {
        $this->customize->add_setting('openweb_platform_cloudsearch', [
            'type' => 'theme_mod',
            'default'  => true,
            'capability' => 'edit_theme_options',
        ]);
        $this->customize->add_setting('openweb_platform_cloudsearch_results', [
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
        ]);
        $this->customize->add_setting('openweb_platform_cloudsearch_content_types', [
            'type' => 'option',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => [$this, 'sanitizeContentTypes'],
        ]);
        
        $this->generateSearchControls();
    }
    
    private function generateSearchControls()
    {
        $this->customize->add_control('openweb_platform_cloudsearch', [
            'label'    => __('Buscador Cloudsearch', 'openweb'),
            'section'  => 'openweb_search_section',
            'priority' => 1,
            'type'     => 'checkbox',
            'description' => __('La plataforma usa el servicio de AWS CloudSearch para las búsquedas, marcando la casilla se añadirán automáticamente los componentes visuales necesarios, recuerda que más abajo puedes definir los contenidos a indexar automáticamente.', 'openweb')
        ]);

        $this->customize->add_control('openweb_platform_cloudsearch_results', [
            'label'    => __('Página de resultados', 'openweb'),
            'section'  => 'openweb_search_section',
            'priority' => 2,
            'description' => __('Asocia la página de resultados que hayas creado en el apartado páginas.', 'openweb'),
            'type'     => 'dropdown-pages'
        ]);

        $types = get_post_types();
        $choices = array_combine(array_keys($types), array_map(function($val) { return ucwords(str_replace('_', ' ', $val)); }, array_values($types)));

        $this->customize->add_control(
            new MultipleCheckbox($this->customize, 'openweb_platform_cloudsearch_content_types', [
                'label' => __('Contenidos a indexar', 'openweb'),
                'section'  => 'openweb_search_section',
                'priority' => 3,
                'description' => __('Asocia las tipos de contenidos definidos en Wordpress para su indexación.', 'openweb'),
                'choices' => $choices
            ])
        );
    }

    private function createSecuritySection()
    {
        $this->customize->add_section('openweb_security_section' , [
            'title' => __('Zona Privada', 'openweb'),
            'panel' => 'openweb_options',
            'priority' => 2,
            'capability' => 'edit_theme_options',
        ]);

        $this->generateSecuritySettings();
    }

    private function generateSecuritySettings()
    {
        $this->customize->add_setting('openweb_platform_security', [
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
        ]);

        $this->customize->add_setting('openweb_platform_security_register', [
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
        ]);
        
        $this->generateSecurityControls();
    }
    
    private function generateSecurityControls()
    {
        $this->customize->add_control('openweb_platform_security', [
            'label' => __('Zona privada', 'openweb'),
            'section' => 'openweb_security_section',
            'priority' => 1,
            'type' => 'checkbox',
            'description' => __('La plataforma ofrece la capacidad de tener un área privada para usuarios con Armadillo'.PHP_EOL.', esta opción es solo para añadir la visualización en el tema.', 'openweb')
        ]);

        $this->customize->add_control('openweb_platform_security_register', [
            'label'    => __('Página de registro', 'openweb'),
            'section'  => 'openweb_security_section',
            'priority' => 2,
            'description' => __('Asocia la página de registro de usuarios que hayas creado en el apartado páginas.', 'openweb'),
            'type'     => 'dropdown-pages'
        ]);
    }

    public function sanitizeContentTypes($values)
    {
        $multi = ! is_array($values) ? explode(',', $values) : $values;

        return ! empty($multi) ? array_map('sanitize_text_field', $multi) : array();
    }
}
