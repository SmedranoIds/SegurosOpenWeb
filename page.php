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
	<div class="item <?php if($i == 0) {echo 'active';} ?>" 
	style="background-image: url('<?php the_sub_field('imagen'); ?>');height: 480px;width: 100%;background-size: cover;">
		<div class="container">
			<div class="col-md-8 col-lg-6" style="padding-top: 70px;">
				<?php if(!empty(get_sub_field('titulo'))): ?>		
				<div class="banner-msn">
					<div class="row">
						<div class="col-md-10 col-sm-10 titulo">
							<?php the_sub_field('titulo'); ?>
						</div>
					</div>
					<!-- <div class="spacebanner"></div> -->
					<div class="row">
						<div class="col-md-12 col-sm-12 tt2">
							<p><?php the_sub_field('introduccion'); ?></p>
						</div>
					</div>
					<!-- <div class="spacebanner"></div> -->
					<div class="row tt3">
						<?php if (get_sub_field('boton')) {?>
						<div class="col-md-7 col-sm-7 col-xs-7 text-left">
							<a href="<?php the_sub_field('boton'); ?>" target="<?php the_sub_field('target')?>"><button type="button" class="btn"><?php the_sub_field('texto-boton') ?></button></a>
						</div>
						<?php } ?>
					</div>
				</div>
				<?php endif; ?>
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
<!-- <div class="bg-blue-core"> 
<section class="container-fluid bg-grey300 hidden-lg">
	<div class="container">
		<div class="row">
		<?php
          if( have_rows('featured') ):
			while ( have_rows('featured') ) : the_row();
			?>
		<div class="col-sm-4 col-xs-12 text-center">
			<div class="container-imgHome">
			<div class="img-home">
				<img src="<?php the_sub_field('image'); ?>">
			</div>
			</div>
			<div class="icon-item">
				<p class="title-item">
					<?php the_sub_field('titulo'); ?>
				</p>
				<p class="txt-info"><?php the_sub_field('descripcion'); ?></p>
			</div>
        </div>
        <?php 
			endwhile;
			endif;
		?>
    </div>
    </div>
</section>
-->

<!-- featured mobile -->
<section class="container-fluid bg-grey200 hidden-lg">
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
<!-- end featured mobile -->



<!-- featured desktop -->
<section class="container-fluid bg-grey200 visible-lg">
	<div class="container">
		<div class="row">
		<p>&nbsp;</p>
		<?php 
			if(have_rows('featured') ): ?>
			<?php while( have_rows('featured') ): the_row(); ?>
		<div class="col-sm-4" style="padding-bottom: 30px;">
			<div class="homepage-container ejemplo-1">
			<div class="tips-title-container">
				<span class="tips-title"><?php the_sub_field('titulo'); ?></span>
			</div>
			<div class="img-container" style="background-image: url('<?php the_sub_field('image'); ?>');"></div>
			<div class="mascara">  
				<div class="titulo"><?php the_sub_field('titulo'); ?></div>  
				<p><?php the_sub_field('descripcion'); ?></p>
				<a href="<?php the_sub_field('url'); ?>" class="tips-link" target="<?php the_sub_field('target')?>"><?php the_sub_field('label'); ?></a>  
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
<!-- end featured desktop -->


<?php get_footer();