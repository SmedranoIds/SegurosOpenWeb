<?php
/**
 * Template Name: Openweb - Page Empty
 * Template Post Type: page
 * Template Description: Plantilla para páginas sólo con cabecera y pie.
 *
 * @package Openweb
 * @subpackage Coronita
 * @since OpenWeb Coronita 1.0
 */

get_header();
?>
<!-- page empty -->

<?php $textAll = get_field('comprobantes_fiscales_campos'); ?>

<!-- chat -->
<?php get_template_part('template-parts/components/chat'); ?>
<!-- end chat -->


<!-- main slider -->
<?php get_template_part('template-parts/components/hero-slider');?>
<!-- end main slider -->

<!-- contenido -->
<section class="container-fluid">
    <div class="container">
    	
		<div class="row">
			<div class="col-xs-12 text-justify">					
				<h1 class="titulo"><?php 
				/* imprimir el título - dependiendo si es el tal cual o algún título en especial */
				if(get_field('parent')):
					the_field('parent');
				else: 
					the_title(); 
				endif;
				?></h1>
				<?php 	
				if(get_field('page_content')):
					the_field('page_content');
				endif;

				?>
			</div>
		</div>
	    
    </div>
</section>
<!-- Bloques de Contenido-->
<?php if( get_field('bloque_conetnido') ):?>

<section class="container-fluid bg-grey100">

	<?php if( have_rows('bloque_conetnido') ):
      			while ( have_rows('bloque_conetnido') ) : the_row();
      	?>
  <div class="contiene-descripcion-producto">
    <div class="descripcion-producto">
    	
      <div class="descripcion-producto__mod">
      	<div class="descripcion-producto__mod__title">
          <link>
          <div class="icondescription__base">
            <i class="icondescription__icon bbva-icon-descripcion <?php the_sub_field('icono_contenido'); ?>"></i>
            <h3 class="icondescription__title"><?php the_sub_field('titulo_contenido'); ?></h3>
            <div class="icondescription__text">
            	<?php the_sub_field('subtitulo_contenido'); ?>  
              <br>
            </div>
          </div>
        </div>
        <div class="descripcion-producto__mod__content">
        	<?php the_sub_field('resumen_contenido'); ?>	
        </div>
      </div>
      
    </div>
  </div>
  <?php 
				endwhile;
				endif;
			?>
</section>
<?php endif;?>
<!-- Termina bloques de contenido-->

<?php get_footer();
