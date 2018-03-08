<?php
/**
 * Template Name: Openweb - Page Descubre
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
<?php get_template_part('template-parts/components/chat'); ?>
<!-- end chat -->


<!-- page descubre -->
<?php
while (have_posts()) {
    the_post();
}?>


<!-- chat -->
<?php include('template-parts/components/chat.php'); ?>
<!-- end chat -->



<?php
if (have_posts()):
  while (have_posts()) : the_post();
    // the_content();
  endwhile;
endif;
?>

<!-- tips -->
<section class="container-fluid bg-grey200">
  <h2 class="title_hogar-seguro text-center"><?php the_field('encabezadotips'); ?></h2>
	<div class="container ">
		<!-- 
    <div class="row">
			<div class="col-xs-12 text-center">
			</div>
    </div>
  -->
		<div class="row">
			<?php 
				if(have_rows('tipshover') ): ?>
				<?php while( have_rows('tipshover') ): the_row(); ?>
			<div class="col-sm-4" style="padding-bottom: 30px;">
        <div class="hogar-contenedor ejemplo-1">
          <div class="tips-title-container">
            <span class="tips-title"><?php the_sub_field('title_tipshover'); ?></span>
          </div>
          <div class="img-container" style="background-image: url('<?php the_sub_field('imagen_tipshover'); ?>');">
          </div>
          <div class="mascara">  
            <h2><?php the_sub_field('title_tipshover'); ?></h2>  
              <p><?php the_sub_field('resumen_tipshover'); ?></p>
              <a href="<?php the_sub_field('url_button_tipshover'); ?>" class="tips-link" target="<?php the_sub_field('target_button_tipshover')?>"><?php the_sub_field('button_tipshover'); ?></a>  
          </div>  
          
        </div>
      </div>
				<?php
						$b++;
					  endwhile;
					endif;
        ?>		
		</div>	
	</div>
</section>

<?php

/*
$custom = get_post_custom();
if (isset($custom['openweb-related'][0])) {
    $relateds = unserialize($custom['openweb-related'][0]);
    $theme->renderView('post/related', $relateds);
}
*/

?>
<?php 
get_footer();
