<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Openweb
 * @subpackage Theme
 * @since 1.0
 * @version 1.0
 */

require_once __DIR__.'/vendor/autoload.php';
$theme = \OpenWeb\Theme::getInstance();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/custom.css">
    <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/customSeguros.css">

    <?php wp_head(); ?>
    <!-- HTML5 Shim and Respond.js  IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body <?php body_class(); ?>>

<header id="top" class="container-fluid ids-header">
    <nav class="navbar navbar-static-top">
        <div class="navbar-header container hidden-lg">
            <a href="#sidr-main" id="responsive-menu-button" class="navbar-toggle bbva-coronita_menu collapsed">
                <span class="sr-only">View Menu</span>
            </a>
             <?php $theme->getLogo(true); ?>
            <?php if (get_theme_mod('openweb_platform_security')): ?>
                <a class="sign-in" href="#login-in-mobile" id="openweb-access-mobile" role="button" data-toggle="collapse"
                   aria-expanded="false" aria-controls="login-in-mobile">
                    <?php echo __('Acceso a usuarios', 'openweb'); ?>
                </a>
                <a class="sign-in" href="#login-in-mobile" id="openweb-access-mobile" role="button" data-toggle="collapse"
                   aria-expanded="false" aria-controls="login-in-mobile">
                    <?php echo __('Registro', 'openweb'); ?>
                </a>
                <!-- <span id="login-openweb-mobile" class="hidden-lg"><?php _e('Hola', 'openweb'); ?></span> -->
            <?php endif; ?>
        </div>

        <section role="navigation" class="collapse navbar-collapse" id="navigation">
            <?php if (has_nav_menu('top-links')): ?>
                <?php wp_nav_menu([
                    'container_class' => 'top-nav container',
                    'theme_location'  => 'top-links',
                    'depth'           => 1,

                ]);
                ?>
            <?php endif; ?>

            <div class="main-nav container">
                <?php $theme->getLogo(); ?>
                <?php if (has_nav_menu('main')): ?>
                    <?php wp_nav_menu([
                        'container'       => '',
                        'menu_id'         => 'main-menu-id',
                        'theme_location'  => 'main',
                        'menu_class'      => 'primary-nav sidr-class-primary-nav',
                        'container_class' => 'main-nav container',
                    ]);
                    ?>
                <?php endif; ?>

                <!-- btns acceso -->
                <!-- 
                <ul class="sidr-hidden">
                    <?php if (get_theme_mod('openweb_platform_security')): ?>
                        <li class="sign-in">
                            <a href="#header-sign-in" id="openweb-access-lg" role="button" data-toggle="collapse" aria-expanded="false"
                               aria-controls="header-sign-in-mobile" data-logout="<?php _e('Cerrar sesión', 'openweb'); ?>">
                                <?php echo __('Acceder', 'openweb'); ?>
                            </a>
                            <span id="login-openweb-lg"><?php _e('Hola', 'openweb'); ?></span>
                        </li>
                        <?php if (($register = get_theme_mod('openweb_platform_security_register'))): ?>
                            <li class="apply" id="register">
                                <a href="<?php echo get_permalink($register); ?>"><?php echo __('Registro', 'openweb'); ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
                -->

                <ul class="sidr-hidden ids-access-btns">
                    <?php if (get_theme_mod('openweb_platform_security')): ?>
                        <li class="sign-in">
                            <a href="#header-sign-in" id="openweb-access-lg" role="button" data-toggle="collapse" aria-expanded="false"
                               aria-controls="header-sign-in-mobile" data-logout="<?php _e('Cerrar sesión', 'openweb'); ?>">
                                <?php echo __('Acceso a usuarios', 'openweb'); ?>
                            </a>
                            <span id="login-openweb-lg"><?php _e('Hola', 'openweb'); ?></span>
                        </li>
                        
                        <li class="apply" id="register">
                            <!-- <a href="<?php echo get_permalink($register); ?>"><?php echo __('Registro', 'openweb'); ?></a> -->
                            <a href="#" role="button" data-toggle="collapse" aria-expanded="false"
                            aria-controls="header-sign-in-mobile"><?php echo __('Registro', 'openweb'); ?></a>
                        </li>
                        
                    <?php endif; ?>
                </ul>
                <!-- end btns acceso -->
            </div>

            <?php if (get_theme_mod('openweb_platform_security')): ?>
            <section id="header-sign-in" class="collapse"></section>
            <?php endif; ?>

            <div class="secondary-nav">
                <div class="container" id="search-container" data-placeholder="<?php echo __('Escribe aquí tu búsqueda', 'openweb'); ?>" data-placeholder-mobile="<?php echo __('Buscar', 'openweb'); ?>">
                    <?php if (has_nav_menu('secondary')): ?>
                        <?php wp_nav_menu([
                            'container'       => '',
                            'menu_id'         => 'secondary-menu',
                            'theme_location'  => 'secondary',
                            'menu_class'      => 'searchIcon',
                            'depth'           => 1,
                        ]);
                        ?>
                    <?php else: ?>
                    <ul id="secondary-menu">
                        <li class="search-wrapper">
                            <span class="search-trigger bbva-coronita_search"></span>
                        </li>
                    </ul>
                    <?php endif; ?>

                    <div class="form-wrapper">
                        <span class="search-close">
                            <span class="search-close-left"></span>
                            <span class="search-close-right"></span>
                        </span>

                        <form method="get" name="searchform" id="searchform" action="<?php echo get_theme_mod('openweb_platform_cloudsearch_results')
                            ? get_permalink(get_theme_mod('openweb_platform_cloudsearch_results'))
                            : ''; ?>">
                            <input type="text" id="q" name="q" value="" autocomplete="off" />
                            <input type="submit" value="<?php echo __('Buscar', 'openweb'); ?>" class="btn btn-secondary" />
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </nav>

    <?php if (get_theme_mod('openweb_platform_security')): ?>
    <section id="login-in-mobile" class="collapse">
        <!-- acceso -->
        <div class="sign-in-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-5 text-center">
                        <h2 class="h3">
                            <!-- <?php echo __('Acceso a ', 'openweb'); ?> <?php echo bloginfo('name'); ?> -->
                            Acceso a usuarios
                        </h2>
                    </div>
                    <div class="col-md-12 col-lg-7 text-center">
                        <!-- <form id="openweb-form-login" autocomplete="off" class="mod" method="" action="">
                            <div class="form-group">
                                <div id="signon-error-msg">
                                    <p><span class="icon icon-lg bbva-coronita_alert"></span> <?php echo __('Usuario o contraseña incorrectos.', 'openweb'); ?></p>
                                </div>

                                <div class="input-control icon-username">
                                    <input placeholder="<?php echo __('Usuario', 'openweb'); ?>" required="required" autocomplete="off" type="text" name="UserNameInput" value="" id="userNameInput">
                                </div>

                                <div class="input-control icon-lock">
                                    <input class="inputpassword" placeholder="<?php echo __('Contraseña', 'openweb'); ?>" required="required" autocomplete="off" type="password" name="passwordInput" value="" id="passwordInput">
                                </div>

                                <div class="input-control remember-me">
                                    <input type="checkbox" class="css-checkbox" id="remembermeChk" value=""/>
                                    <label for="remembermeChk"><span class="faux-box"></span><?php echo __('Recuérdame', 'openweb'); ?></label>
                                </div>

                                <div class="input-control">
                                    <input id="login" class="btn btn-aqua" type="submit" name="signon" value="<?php echo __('Acceder', 'openweb'); ?>">
                                </div>
                            </div>
                        </form> -->
                        <div class="form-group ids-btn-area-priv">
                        <a href="https://www.segurosbancomer.com.mx/psns_mult_web_psnspublicwebapp_02/loginpage.jsp" id="login" class="btn btn-aqua" target="_blank">Personas</a>

                        <a href="https://www.segurosbancomer.com.mx/psns_mult_web_psnspublicwebapp_02/loginpage.jsp" id="login" class="btn btn-aqua" target="_blank">Empresas</a>
                        
                        </div>
                    </div>
                    <a class="sign-in-close visible-xs visible-sm visible-md hidden-lg" href="#" data-toggle="collapse" data-target="#login-in-mobile">
                        <span class="icon icon-sm bbva-coronita_close"></span>
                    </a>
                    <a class="sign-in-close hidden-xs hidden-sm hidden-md" href="#" data-toggle="collapse" data-target="#header-sign-in">
                        <span class="icon icon-sm bbva-coronita_close"></span>
                    </a>
                </div>
            </div>
        </div>
        <!-- end acceso -->
    </section>
    <?php endif; ?>
</header>

