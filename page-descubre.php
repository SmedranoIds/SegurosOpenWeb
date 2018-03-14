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

<?php
/*
if (have_posts()):
  while (have_posts()) : the_post();
     //the_content();
  endwhile;
endif;
*/
?>
<?php
while (have_posts()) {
    the_post();
}
?>

<?php 
  if( have_rows('tipshover') ):
 ?>
<section class="container-fluid bg-grey200">
  <h2 class="title_hogar-seguro text-center">
    <?php the_field('encabezadotips'); ?>
  </h2>
	<div class="container ">
		<div class="row">
      <?php 
        while ( have_rows('tipshover') ) : the_row(); 
        
        //si es diferente de vacío
        if(!empty(get_sub_field('imagen_tipshover'))):
          //busca el objeto imagen
          $image = get_sub_field('imagen_tipshover');
          $url = $image['url'];
          $imgAlt = $image['alt'];
        endif;
        ?>
      <div class="col-sm-4" style="padding-bottom: 30px;">
        <div class="hogar-contenedor ejemplo-1">
          <div class="tips-title-container">
            <span class="tips-title"><?php the_sub_field('title_tipshover') ?></span>
          </div>
          <div class="img-container" style="background-image: url('<?php 
            echo $url;
          ?>');">
          </div>
          <div class="mascara">  
          <h2><?php the_sub_field('title_tipshover') ?></h2>  
              <p><?php the_sub_field('resumen_tipshover') ?></p>
             
          </div>  
        </div>
      </div>
      <!-- <p><img src="<?php
                //si es diferente de vacío
                if(!empty(get_sub_field('imagen_tipshover'))):
                  //busca el objeto imagen
                  $image = get_sub_field('imagen_tipshover');
                  $url = $image['url'];
                  echo $url;
                endif;
                ?>" alt="<?php 
                
                //si es diferente de vacío
                if(!empty(get_sub_field('imagen_tipshover'))):
                  //busca el objeto imagen
                  $image = get_sub_field('imagen_tipshover');
                  $alt = $image['alt'];
                  echo $alt;
                endif;

              ?>">
      </p>-->
			<?php
        endwhile;
      ?>

		</div>	
	</div>
</section>
<?php 
  endif;
?>

<?php 
get_footer();
