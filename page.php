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
		    <div class="row">
		      <div class="col-md-12">
		      	<?php if(!empty(get_sub_field('titulo'))): ?>
		        <div class="box-tituloHome">
		          <h1 class="tituloHome"><?php the_sub_field('titulo'); ?></h1>
		          <p class="subtituloHome"><?php the_sub_field('introduccion'); ?></p>
		          <?php if (get_sub_field('boton')) {?>
		          <a href="<?php the_sub_field('boton'); ?>" target="_self"><span class="btn-bannerHome"><?php the_sub_field('texto-boton') ?></span></a>
		          <?php } ?>
		        </div>
		        <?php endif; ?>
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

 <!-- section-iconos desktop -->
<div >
	<div class="container-fluid">
		<div class="row">
			<?php
				if( have_rows('seccion_iconos') ):				
					while ( have_rows('seccion_iconos') ) : the_row();
			?>	
			<div class="col-md-2 col-xs-4">
				<div style="text-align: center; padding-bottom: 15px;">

					<?php if ( get_sub_field('url_icono_ext')): ?>
                     <!-- Si la url es externa, que enlace acepte y use el link externo -->
                        <a href="<?php the_sub_field('url_icono_ext'); ?>" target="<?php the_sub_field('target_icono'); ?>"><span style="font-size: 30px;" class="<?php the_sub_field('clase_icono'); ?>"></span></a>
                    <?php else :?>
                    <!-- Si no lo es, que muestre un enlace normal interno -->
                        <a href="<?php the_sub_field('url_icono'); ?>" target="<?php the_sub_field('target_icono'); ?>"><span style="font-size: 30px;" class="<?php the_sub_field('clase_icono'); ?>"></span></a>
                    <?php endif ;?>

					<label class="label-sectIcon" style="font-size: 1.3rem; margin-top: 10px; width: 100%;"><?php the_sub_field('label_icono'); ?></label>
				</div>
			</div>
			<?php 
				endwhile;
				endif;
			?>
		</div>
	</div>
</div>	
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
		              <img class="iconBox-infoApp" src="<?php the_sub_field('icono_bapp'); ?>">
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
		              <a class="link-interno" href="#">
		                <span class="icon-infoApp">Apple Store</span>
		              </a>
		            </div>
		            <div class="linkIcon-infoApp">
		              <a class="link-interno" href="#">
		                <span class="icon-infoApp">Google Play</span>
		              </a>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
		    <div class="col-md-6 col-sm-6 box-infoApp text-center">
		     	<div style=" ">
		      		<img class="image-bapp" src="<?php the_sub_field('imagen_bapp'); ?>">
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
<section class="container-fluid bg-grey200">
  <div class="container">
	  <div class="row">
	  	<?php
			if( have_rows('cards_home') ):				
				while ( have_rows('cards_home') ) : the_row();
			?>
			
			<?php if ( get_sub_field('activo')): ?>
            <!-- Si la card tiene la imagen a la derecha, que muestre: -->
                <div class="col-md-12">
			      <div class="card-content">
			        <a href="<?php the_sub_field('link_cardHome'); ?>" target="_self"><div class="card-derecha imagen-d" style="background-image: url('<?php the_sub_field('imagen_cardHome'); ?>');">
			          <label class="card-derecha titulo-cardHome-d"><?php the_sub_field('titulo_cardHome'); ?></label>
			        </div></a>
			        <div class="card-derecha contenido-d">
			          <div class="cont-inter">
			            <img class="imagen-con" src="<?php the_sub_field('icono_cardHome'); ?>">
			            <p class="icono-textoBapp"><?php the_sub_field('resumen_cardHome'); ?></p>
			          </div>
			          <div class="card-derecha links-d">
			            <label><a href="<?php the_sub_field('link_cardHome'); ?>" target="self"><?php the_sub_field('textLink_cardHome'); ?></a></label>
			          </div>
			        </div>
			      </div>
			    </div>
            <?php else :?>
            <!-- Si no lo es, que muestre un card normal -->
                <div class="col-md-12">
			      <div class="card-content">
			        <a href="<?php the_sub_field('link_cardHome'); ?>" target="_self"><div class="card-izquierda imagen" style="background-image: url('<?php the_sub_field('imagen_cardHome'); ?>');">
			          <label class="card-izquierda titulo-cardHome"><?php the_sub_field('titulo_cardHome'); ?></label>
			        </div></a>
			        <div class="card-izquierda contenido">
			          <div class="cont-inter">
			            <img class="imagen-con" src="<?php the_sub_field('icono_cardHome'); ?>">
			            <p class="icono-textoBapp"><?php the_sub_field('resumen_cardHome'); ?></p>
			          </div>
			          <div class="card-izquierda links">
			            <label><a href="<?php the_sub_field('link_cardHome'); ?>" target="self"><?php the_sub_field('textLink_cardHome'); ?></a></label>
			          </div>
			        </div>
			      </div>
			    </div>
            <?php endif ;?>
	    <?php 
				endwhile;
				endif;
			?>
	  </div>
    </div>
</section>
<!-- end cards intro -->

<h1 class="hide"><?php echo get_bloginfo('name'); ?></h1>


<!-- featured mobile -->
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