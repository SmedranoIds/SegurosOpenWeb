<?php
/**
 * Template Name: Openweb - Page Cuadros
 * Template Post Type: page
 * Template Description: Plantilla para páginas sólo con cabecera y pie.
 *
 * @package Openweb
 * @subpackage Coronita
 * @since OpenWeb Coronita 1.0
 */

get_header();
?>

<?php
while (have_posts()) {
    the_post();
}
?>
<!-- chat -->
<?php include('template-parts/chat.php'); ?>
<!-- end chat -->

<!-- tips -->
<section class="container-fluid">
    <div class="container">
    	<div class="col-md-8 col-xs-12">
	    	<div class="row">
					<h1 class="titulo"><?php the_title(); ?></h1>
					<p><?php the_field('encabezadotips'); ?></p>

						<?php
						if( have_rows('cuadrostips') ): ?>
						<?php while( have_rows('cuadrostips') ): the_row(); ?>
				<div class="col-md-12 float-square">
					<div class="col-md-6 col-xs-12 float-square2">
  							<p><img class="img-rounded posImg" src="<?php the_sub_field('imagetips'); ?>" alt="Card image cap" height="120px">
    							<h4 class="card-title"><?php the_sub_field('titletips'); ?></h4>
    						</p>
							<p class="card-text "><?php the_sub_field('texttips'); ?>
								<br>
    							<a href="<?php the_sub_field('urlbutton') ?>" class="btn btn-primary button-styles">
    								Ir
    							</a>
							</p>
					</div>
				<?php if( get_sub_field('titletips2')){ ?>
					<div class="col-md-6 col-xs-12 float-square3">
  							<p><img class="img-rounded posImg" src="<?php the_sub_field('imagetips2'); ?>" alt="Card image cap" height="120px">
    							<h4 class="card-title"><?php the_sub_field('titletips2'); ?></h4>
    						</p>
							<p class="card-text "><?php the_sub_field('texttips2'); ?>
								<br>
    							<a href="<?php the_sub_field('urlbutton2') ?>" class="btn btn-primary button-styles">
    								Ir
    							</a>
							</p>
					</div>
				<?php } ?>
				</div>
						
						<?php
						$b++;
					  endwhile;
					endif;
					?>	
	    	</div>
	    </div>
    	<div class="col-md-4 col-xs-12">
						<div class="panel panel-default text-center">
					  		<div class="panel-body bordeCuadros">
					  			<a class="chat posIcon", href="", onclick="openChat(href);">
					  				<i class="iconSprite chat"></i>
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
						<a class="cuadro", href="<?php the_sub_field('ligaproducto') ?>">
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
<?php
$custom = get_post_custom();
if (isset($custom['openweb-related'][0])) {
    $relateds = unserialize($custom['openweb-related'][0]);

    $theme->renderView('post/related', $relateds);
}
?>

<?php get_footer();
