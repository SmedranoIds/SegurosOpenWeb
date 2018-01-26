<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package OpenwebMod
 * @subpackage Theme
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div>
    <div class="fullwidthsection section">
        <section class="container-fluid" role="region" aria-label="content section 291901148">

            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="text parbase section">
                            <h1>Oops! <?php echo __('Esta no es la página que buscabas', 'openweb'); ?>.</h1>
                            <p><span class="lead"><?php echo __('Puedes usar nuestro buscador para encontrar lo que necesitas', 'openweb'); ?>.</span></p>
                        </div>
                        <div class="horizontalrule section"><hr></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php get_footer();
