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
				/*			
					if (have_posts()):
						while (have_posts()) : the_post();
						the_content();
						endwhile;
					else:
						echo '<p>&nbps;</p>';
					endif;
				*/
				?>
			</div>
		</div>
	    
		<!-- 
    	<div class="col-md-4 col-xs-12">
				<div class="panel panel-default text-center">
			  		<div class="panel-body bordeCuadros">
			  			<a class="chat posIcon", href="", onclick="openChat(href);">
			  				
			  				<i class="iconChat"></i>
			  				Chat</br>
			  			</a>
			  		</div>
			  	</div>

					<?php if( have_rows('cuadroblanco') ): ?>
					<?php while( have_rows('cuadroblanco') ): the_row(); ?>
					<div class="panel panel-default <?php the_sub_field('clase') ?>">
					  <div class="panel-body bordeCuadros">
					  	<h2><?php the_sub_field('titulocuadro') ?></h2>
					  	<div class="row">
					  		<div class="col-md-7 col-sm-7">
							  	<p class="descripcion"><?php the_sub_field('descripcion') ?></p>
					  		</div>
					  		<div class="col-md-5 col-sm-5 text-center">
					  			<img class="imgCuadros", src="<?php the_sub_field('img') ?>" alt="">
							</div>
							<div class="col-sm-12">
								<?php if( get_sub_field('ligaproducto') ): ?>
								<a class="cuadro", href="<?php the_sub_field('ligaproducto') ?>" target="<?php the_sub_field('targeturl')?>" >
								<?php the_sub_field('leyendaurl') ?>
								<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								</a>
								<?php endif; ?>
							</div>
					  	</div>
					  </div>
					</div>
					<?php
					  endwhile;
					endif;
					?>
		</div>
		-->
    </div>
</section>

<?php get_footer();
