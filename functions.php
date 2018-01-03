<?php

/**
 * OpenWeb functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package OpenWeb
 * @subpackage Theme
 * @since Theme 1.0
 */
if (version_compare(PHP_VERSION, '5.6', '<')) {
    die(__('El tema Openweb basado en Coronita sólo funciona a partir de las versiones 5.6.x de PHP', 'openweb'));
}

if (version_compare($GLOBALS['wp_version'], '4.4-alpha', '<')) {
    die(__('El tema Openweb basado en Coronita sólo funciona a partir de las versiones 4.4 de Wordpress', 'openweb'));
}

define('OPENWEB_THEME_PATH', __DIR__);

require_once OPENWEB_THEME_PATH.'/vendor/autoload.php';

$theme = \OpenWeb\Theme::getInstance();
$theme->init();
