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
		<!-- <div class="row tt">	 -->
		<div class="row">	
			<!-- <div class="col-xs-10 col-xs-offset-1"> -->
			<div class="col-xs-12">
				<!-- <article class="block item-list text-justify"> -->
				<article class="block text-justify">
					<!-- <div class="inner"> -->
					<h1 class="titulo"><?php the_field('titulo1'); ?></h1>
					<p>
					<?php 
						if(!empty(get_field('imagen'))):
							$image = the_field('imagen');
							$imgURL = $image['url'];
							$imgAlt = $image['alt'];
					?>
					<img src="<?php echo $imgURL; ?>" alt="<?php echo $imgAlt; ?>" style="float: left; padding-right: 20px;"/>
						<br>
					<?php
						endif;
					?>
					<strong><?php the_title(); ?></strong></p>
					<br>
					<p><?php the_field('textbody'); ?></p>	
					<!-- </div> -->
				</article>

			</div>	
		</div>	
    </div>
</section>

<?php get_footer();
