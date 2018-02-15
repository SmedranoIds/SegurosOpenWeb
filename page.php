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
<?php include('template-parts/components/chat.php'); ?>
<!-- end chat -->



<!-- page & index -->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  	
	<?php
	$i == 0;
	if (get_field('banner')) {
		
	
		// check if the repeater field has rows of data
		if( have_rows('banner') ):
			// loop through the rows of data
			while ( have_rows('banner')   ) : the_row();
			?>
    <div class="item <?php if($i == 0) {echo 'active';} ?>" style="background-image: url('<?php the_sub_field('imagen'); ?>');height: 480px;width: 100%;background-size: cover;">
  		<div class="container hidden-xs">
  			<div class="col-md-6 col-sm-6" style="padding-top: 70px;">
		            <div class="banner-msn">
						<div class="row tt">
							<div class="col-md-10 col-sm-10">
								<h2><?php the_sub_field('titulo'); ?></h2>
							</div>
						</div>
						<div class="spacebanner"></div>
						<div class="row">
							<div class="col-md-12 col-sm-12 tt2">
								<p><?php the_sub_field('introduccion'); ?></p>
							</div>
						</div>
						<div class="spacebanner"></div>
						<div class="row tt3">
							<?php if (get_sub_field('boton')) {?>
							<div class="col-md-7 col-sm-7 col-xs-7 text-left">
								<a href="<?php the_sub_field('boton'); ?>" target="<?php the_sub_field('target')?>"><button type="button" class="btn"><?php the_sub_field('texto-boton') ?></button></a>
							</div>
							<?php } ?>
						</div>
		    		</div>
		      </div>
  		</div
		  >
  	<div class="visible-xs"><!-- 
  		<img class="img-responsive" src="<?php the_sub_field('imagen'); ?>"> -->
	  	<div class="container banner-msn">
	  		<div class="row sec-index-mov">
				<div class="col-xs-12 text-center">
					<h2><?php the_sub_field('titulo'); ?></h2>
				</div>
			</div>
			<div class="row sec-index-mov">
				<div class="col-xs-12 text-center">
					<p><?php the_sub_field('introduccion'); ?></p>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-xs-12 text-center">
					<?php if (get_sub_field('boton')) {?>
					<div class="col-xs-12 text-center">
						<a href="<?php the_sub_field('boton'); ?>" target="<?php the_sub_field('target')?>"><button type="button" class="btn"><?php the_sub_field('texto-boton') ?></button></a>
					</div>
					<?php } ?>
				</div>
			</div>
	  	</div>
  	</div>

  	</div>

	<?php 
		$i ++;
		endwhile;
		endif;
	?>

 </div>
<?php if ($i!=1) { ?>
  <!-- Controls -->
 

  <!-- Indicators -->
  <ol class="carousel-indicators">
   	<?php for ($j=0; $j < $i ; $j++) { ?>

   			<li data-target="#carousel-example-generic" data-slide-to="<?php echo $j; ?>" <?php if ($j == 0) {echo " class='active' ";} ?> ></li> 

	<?php } ?>
  </ol>
<?php } } ?>


</div>


<!-- Segunda sección -->
<div class="container icons-home">
	<div class="row">
		<?php
          if( have_rows('segundaseccion') ):
			// loop through the rows of data
			while ( have_rows('segundaseccion') ) : the_row();
			?>
		<div class="col-sm-4 col-xs-12 text-center">
			<div class="container-imgHome">
			<div class="img-home">
				<img src="<?php the_sub_field('imgicon'); ?>">
			</div>
			</div>
			<div class="icon-item">
				<!-- <h4><?php the_sub_field('titulo'); ?></h4> -->
				<p>
					<b><?php the_sub_field('titulo'); ?></b><br>
					<span><?php the_sub_field('subtitulo'); ?></span>
				</p>
			</div>
        </div>
        <?php 
			endwhile;
			endif;
		?>
    </div>
</div>


<?php get_footer();