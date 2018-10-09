<?php
/**
 * Template Name: Openweb - Page Register
 * Template Post Type: page
 * Template Description: Plantilla para páginas de ejemplo.
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

<?php if (is_page("Inicio")) {?>
    <script src="<?php echo bloginfo('template_url'); ?>/js/dataTag_home.js" type="text/javascript"></script>
<?php } ?>

<!-- page & index -->
<?php //get_template_part('template-parts/components/home-slider'); ?>
<?php //get_template_part('template-parts/components/bcom-slider'); ?>
<?php get_template_part('template-parts/components/oct-slider'); ?>



<!-- section-iconos desktop -->
<?php get_template_part('template-parts/components/icons-home'); ?>
<!-- end section-iconos desktop -->




<!-- banner-medio desktop -->
<section class="container-fluid bg-blue-core" style="background-image: url('/wp-content/uploads/2018/05/spotlight-dark-blue.svg'); background-size: cover;">
  	<div class="row">
  		<div class="col-md-12 text-center">
  			<?php
				if( have_rows('banner_app') ):				
					while ( have_rows('banner_app') ) : the_row();
			?>	
  			<label class="titulo-bannerApp"><h2><?php the_sub_field('titulo_bapp'); ?></h2></label>
	  		<br>
	  		<label style="color: #2dcdcd;"><?php the_sub_field('subtitulo_bapp'); ?></label>
  		</div>
  	</div>
    <div class="row" style="padding-left: 7%; padding-right: 7%; padding-top: 3%;">
	    <div class="col-md-6 col-sm-6 box-infoApp">
	     	<div class="green-square"></div>
		      <div class="boxIn-infoApp bg-navy">
		        <div class="boxContent-infoApp">
		          <h1 class="boxTitle">
		            <span class="box-icon">
									<?php 
										$appIcon = get_sub_field('icono_bapp');
										if( !empty($appIcon) ):
									?>
									<img class="iconBox-infoApp" src="<?php echo $appIcon['url']; ?>" alt="<?php echo $appIcon['alt']; ?>">
									<?php endif; ?>
		              <!-- <img class="iconBox-infoApp" src="<?php the_sub_field('icono_bapp'); ?>"> -->
		            </span>
		            <span class="textBox-infoApp">
		              <b><?php the_sub_field('text_bapp'); ?></b>
		              <br>
		            </span>
		          </h1>
		          <div class="resumen-infoApp">
		            <?php the_sub_field('resumen_bapp'); ?>
		            <br>
		            <?php the_sub_field('textDown_bapp'); ?>
		          </div>
		          <div class="opciones-infoApp">
		            <div class="linkIcon-infoApp">
		              <a class="link-interno" target="_blank" href="https://itunes.apple.com/mx/app/bancomer-seguros-sos/id1320083642?mt=8">
		                <span class="icon-infoApp">Apple Store</span>
		              </a>
		            </div>
		            <div class="linkIcon-infoApp">
		              <a class="link-interno" target="_blank" href="https://play.google.com/store/apps/details?id=mx.com.segurosbancomer.autoalerta&hl=en">
		                <span class="icon-infoApp">Google Play</span>
		              </a>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
		    <div class="col-md-6 col-sm-6 box-infoApp text-center">
		     	<div style=" ">
						<?php 
							$app = get_sub_field('imagen_bapp');
							if( !empty($app) ):
						?>
						<img class="image-bapp" src="<?php echo $app['url']; ?>" alt="<?php echo $app['alt']; ?>">
						<?php endif; ?>
						<!-- <img class="image-bapp" src="<?php the_sub_field('imagen_bapp'); ?>"> -->
		     	</div>
		    </div>
	</div>
 	<?php 
				endwhile;
				endif;
			?>
</section>
<!-- end banner-medio desktop -->

<!-- cards intro -->
<?php get_template_part('template-parts/components/home-cards'); ?>
<!-- end cards intro -->

<h1 class="hide"><?php echo get_bloginfo('name'); ?></h1>


<!-- featured mobile -->
<!-- 
<section class="container-fluid bg-grey200 hidden-lg hide">
	<div class="container">
		<div class="row justify-content-start">
		<p>&nbsp;</p>
			<?php
				if( have_rows('featured') ):				
					while ( have_rows('featured') ) : the_row();
			?>	
				<div class="col-xs-10 col-md-4 col-xs-offset-1 col-md-offset-0">
				<div class="card homepage-mobile-container">
					<div class="text-center">
					<a href="<?php the_sub_field('url') ?>" target="<?php the_sub_field('target')?>" class="img-container" style="background-image: url('<?php the_sub_field('image'); ?>');"
					></a>
					</div>
					<div class="card-body bg-blue-core">
						<h5 class="card-title"><?php the_sub_field('titulo') ?></h5>
						<p class="card-text"><?php the_sub_field('descripcion') ?></p>
						<a href="<?php the_sub_field('url') ?>" class="card-btn" target="<?php the_sub_field('target') ?>"><?php
							the_sub_field('label')
						?></a>
					</div>
				</div>
				</div>

			<?php 
				endwhile;
				endif;
			?>
			<p>&nbsp;</p>
		</div>
	</div>
</section>
-->
<!-- end featured mobile -->

<!-- featured desktop -->
<!--<section class="container-fluid bg-grey200 visible-lg">
	<div class="container">
		<div class="row">
		<p>&nbsp;</p>
		<?php 
			if(have_rows('featured') ): ?>
			<?php while( have_rows('featured') ): the_row(); ?>
		<a href="<?php the_sub_field('url'); ?>" class="tips-link" target="<?php the_sub_field('target')?>">
		<div class="col-sm-4" style="padding-bottom: 30px;">
			<div class="homepage-container ejemplo-1">
			<div class="tips-title-container">
				<span class="tips-title"><?php the_sub_field('titulo'); ?></span>
			</div>
			<div class="img-container" style="background-image: url('<?php the_sub_field('image'); ?>');"></div>
			<div class="mascara">  
				<div class="titulo"><?php the_sub_field('titulo'); ?></div>  
				<p><?php the_sub_field('descripcion'); ?></p>
				<!-- <a href="<?php the_sub_field('url'); ?>" class="tips-link" target="<?php the_sub_field('target')?>"><?php the_sub_field('label'); ?></a>   -->
			<!--</div>  
			
			</div>
		</div>
		</a>
	  	<?php
		endwhile;
		endif;
		?>		
		<p>&nbsp;</p>
		</div>	
	</div>
</section>-->
<!-- end featured desktop -->


<?php get_footer();