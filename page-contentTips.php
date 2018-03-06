<?php
/**
 * Template Name: Openweb - Page contenidoTips
 * Template Post Type: page
 * Template Description: Plantilla para páginas sólo con cabecera y pie.
 *
 * @package Openweb
 * @subpackage Coronita
 * @since OpenWeb Coronita 1.0
 */

get_header();
?>

<!-- chat -->
<?php get_template_part('template-parts/components/chat.php'); ?>
<!-- end chat -->


<?php
while (have_posts()) {
    the_post();
}
?>
<!-- contentTips -->
<section class="container-fluid">
    <div class="container">	
		<div class="row tt">	
			<div class="col-xs-11">
				<article class="block item-list">
					<div class="inner">
						<h1 class="titulo"><?php the_field('titulo1'); ?></h1>
						<p><img src="<?php the_field('imagen'); ?>" alt="" title="" style="float: left; padding-right: 20px;"/>
							<br>
						<strong><?php the_title(); ?></strong></p>
						<br>
						<p><?php the_field('textbody'); ?></p>	
					</div>
				</article>

			</div>	
		</div>	
    </div>
</section>

<?php get_footer();
