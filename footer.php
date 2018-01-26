<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
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


<?php if (get_theme_mod('coronita_show_prefooter')):
    get_template_part('template-parts/footer/prefooter');
endif; ?>


<footer class="container-fluid footer-full">
	<section class="container">
		<div class="row">
			<div class="col-sm-8 tagline-container">
                <?php $theme->getLogoFooter(); ?>
                <?php if (($tagline = get_theme_mod('coronita_tagline_footer'))): ?>
				<p class="tagline"><?php echo $tagline; ?></p>
                <?php endif; ?>
			</div>
			<div class="col-sm-4 social-media">
				<ul>
                <?php foreach ($theme::SOCIAL_NETWORKS as $network): ?>
                    <?php if (($option = get_option('coronita_'.$network.'_url'))): ?>
					<li>
                        <a href="<?php echo $option; ?>" title="<?php echo __(sprintf('Síguenos en %s', ucfirst($network)), 'openweb'); ?>" target="_blank"><i class="fa fa-<?php echo $network; ?>"></i></a>
                    </li>
                    <?php endif; ?>
                <?php endforeach; ?>
				</ul>
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
		<div class="row">
            <div class="col-md-12">
            <?php
            if (has_nav_menu('prefooter-left')) {
                wp_nav_menu([
                    'container'       => 'nav',
                    'theme_location'  => 'footer-links',
                    'menu_class'      => '',
                    //'container_class' => 'row',
                    'container_class' => '',
                    'depth'           => 1,
                ]);
            }
            ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
                <?php if (($copyright = get_theme_mod('coronita_copyright_footer'))): ?>
				<p class="disclosure"><?php echo $copyright; ?></p>
                <?php endif; ?>
			</div>
		</div>
	</section>
</footer>

<?php wp_footer(); ?>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="<?php echo bloginfo('template_url'); ?>/js/script.js" type="text/javascript"></script>
</html>
