<?php
/**
 * The main template file
 * Template Name: Openweb - Homepage
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Openweb
 * @subpackage Theme
 * @since 1.0
 * @version 1.0
 */
/*
require_once __DIR__.'/vendor/autoload.php';
$theme = \OpenWeb\Theme::getInstance();

$articles = [];

while (have_posts()) {
    the_post();
    $articles[] = get_post();
}

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
<?php //get_template_part('template-parts/components/oct-slider'); ?>
<?php //get_template_part('template-parts/components/buenfin-slider'); ?>
<?php //get_template_part('template-parts/components/blackFriday-slider'); ?>
<?php get_template_part('template-parts/components/dic-slider'); ?>



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

<?php get_footer();
