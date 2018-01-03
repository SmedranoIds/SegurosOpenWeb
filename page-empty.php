<?php
/**
 * Template Name: Openweb - Page Empty
 * Template Post Type: page
 * Template Description: Plantilla para páginas sólo con cabecera y pie.
 *
 * @package OpenWeb
 * @subpackage Coronita
 * @since OpenWeb Coronita 1.0
 */

get_header();
?>

<?php $textAll = get_field('comprobantes_fiscales_campos'); ?>

<?php
while (have_posts()) {
    the_post();
}
?>

<section class="container-fluid">
    <div class="container">
    	<div class="col-md-8">
	    	<div class="row">
	    		<div class="col-md-12 col-xs-12">
					<h1 class="titulo"><?php the_field('parent') ?></h1>
						<p>
							<?php echo $textAll; ?>
						</p>
				</div>
    		</div>
	    </div>
    	<div class="col-md-4 col-xs-12">
				<div class="panel panel-default text-center">
			  		<div class="panel-body bordeCuadros">
			  			<a class="chat posIcon", href="", onclick="openChat(href);">
			  				<i class="icon chat"></i>
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
					  	</div>
					  	
						<?php if( get_field('ligaboton') ):	?>
						<a class="cuadro", href="<?php the_sub_field('ligaproducto') ?>" target="_blank">
					  		Cotiza Aquí
					  		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						</a>
						<?php endif;	?>
					  </div>
					</div>
					<?php
					  endwhile;
					endif;
					?>
		</div>
    </div>
</section>

<?php get_footer();
