<?php

namespace OpenWeb;

use OpenWeb\Utils;

abstract class Admin
{
    const TPL_DIR = __DIR__.DIRECTORY_SEPARATOR.'Admin'.DIRECTORY_SEPARATOR.'tpl';

    final public static function getInstance()
    {
        static $instances = [];

        $calledClass = get_called_class();

        if (! isset($instances[$calledClass])) {
            $instances[$calledClass] = new $calledClass();
            $instances[$calledClass]->init();
        }

        return $instances[$calledClass];
    }

    final private function __clone()
    {
    }

    protected function __construct()
    {
        add_action('admin_enqueue_scripts', function() {
            wp_register_style('openweb-admin-css', get_template_directory_uri().'/src/Admin/css/admin.css');
            wp_enqueue_style('openweb-admin-css');

            wp_enqueue_script('accordion');
            wp_enqueue_script('jquery-ui-tabs');
            wp_enqueue_script('jquery-ui-autocomplete');
            wp_enqueue_script('openweb-admin-js', get_template_directory_uri().'/src/Admin/js/admin.js', ['jquery-ui-autocomplete'], '1.0.0');
        });
    }

    protected function getTPL($tpl, array $vars = [])
    {
        if (! is_file(($file = static::TPL_DIR.DIRECTORY_SEPARATOR.$tpl.'.php'))) {
            trigger_error(sprintf('No existe el template %s en el directorio', $file), E_USER_ERROR);
        }

        return Utils::renderTpl($file, $vars);
    }

    abstract protected function init();
}
