<?php

namespace OpenWeb\Admin;

use OpenWeb\Admin;
use OpenWeb\Admin\Customize\CoronitaOptions;
use OpenWeb\Admin\Customize\OpenwebOptions;

class Customize extends Admin
{
    public $customize;

    protected function init()
    {
        add_action('customize_register', [$this, 'generateAdminCustomize']);
    }

    public function generateAdminCustomize(\WP_Customize_Manager $wp_customize)
    {
        CoronitaOptions::getInstance()->createPanel($wp_customize);
        OpenwebOptions::getInstance()->createPanel($wp_customize);
    }

    protected function cleanLabelNetwork($network)
    {
        return preg_replace('/\-/', ' ', $network);
    }
}
