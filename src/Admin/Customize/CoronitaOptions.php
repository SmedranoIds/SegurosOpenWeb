<?php

namespace OpenWeb\Admin\Customize;

use OpenWeb\Theme;
use OpenWeb\Admin\Customize;

class CoronitaOptions extends Customize
{
    protected function init()
    {
    }

    protected function createPanel($customize)
    {
        $this->customize = $customize;

        $this->customize->add_panel('coronita_options', [
            'title' => __('Opciones Coronita', 'openweb'),
            'priority' => 210,
            'capability' => 'edit_theme_options',
        ]);

        $this->createFooterSection();
        $this->createSocialNetworkSection();
    }
    
    private function createFooterSection()
    {
        $this->customize->add_section('coronita_footer_section', [
            'title' => __('Coronita Footer', 'openweb'),
            'panel' => 'coronita_options',
            'priority' => 1,
            'capability' => 'edit_theme_options',
        ]);

        $this->generateFooterSettings();
    }
    
    private function generateFooterSettings()
    {
        $this->customize->add_setting('coronita_show_prefooter', [
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
        ]);
        $this->customize->add_setting('openweb_logo_footer', [
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
        ]);
        $this->customize->add_setting('coronita_tagline_footer', [
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
        ]);
        $this->customize->add_setting('coronita_copyright_footer', [
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
        ]);
        
        $this->generateFooterControls();
    }
    
    private function generateFooterControls()
    {
        $this->customize->add_control('coronita_show_prefooter', [
            'label' => __('Mostrar Prefooter', 'openweb'),
            'section' => 'coronita_footer_section',
            'priority' => 1,
            'type' => 'checkbox',
        ]);

        $this->customize->add_control(
            new \WP_Customize_Cropped_Image_Control($this->customize, 'openweb_logo_footer', [
                'label' => __('Logo', 'openweb'),
                'section' => 'coronita_footer_section',
                'priority' => 2,
                'height'      => 21,
                'width'       => 156,
                'flex-height' => false,
                'flex-width'  => false,
            ])
        );

        $this->customize->add_control('coronita_tagline_footer', [
            'label' => __('Descripción corta', 'openweb'),
            'section' => 'coronita_footer_section',
            'priority' => 3,
            'type' => 'text',
            'description' => __('Texto que aparece al lado del logo del pie.', 'openweb'),
        ]);

        $this->customize->add_control('coronita_copyright_footer', [
            'label' => __('Texto Copyright', 'openweb'),
            'section' => 'coronita_footer_section',
            'priority' => 4,
            'type' => 'textarea',
            'description' => __('Texto de copyright que aparece al final del pie.', 'openweb'),
        ]);
    }

    private function createSocialNetworkSection()
    {
        $this->customize->add_section('coronita_social_section' , [
            'title' => __('Redes Sociales', 'openweb'),
            'panel' => 'coronita_options',
            'priority' => 2,
            'capability' => 'edit_theme_options',
        ]);

        $this->generateSocialNetworkSettingsControls();
    }

    private function generateSocialNetworkSettingsControls()
    {
        for ($x=0, $c=count(Theme::SOCIAL_NETWORKS); $x<$c; ++$x) {
            $setting = sprintf('coronita_%s_url', Theme::SOCIAL_NETWORKS[$x]);

            $this->customize->add_setting($setting, [
                'type' => 'option',
                'capability' => 'edit_theme_options',
            ]);

            $this->customize->add_control($setting, [
                'label' => __(sprintf('%s URL', ucwords($this->cleanLabelNetwork(Theme::SOCIAL_NETWORKS[$x]))), 'openweb'),
                'section' => 'coronita_social_section',
                'priority' => $x + 1,
                'type' => 'text',
                'input_attrs' => [
                    'placeholder' => 'https://',
                ],
            ]);
        }
    }
}