<?php
/**
 * Template Name: Openweb - Page
 * Template Post Type: page
 * Template Description: Plantilla para páginas.
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
<!-- page full -->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  	
	<?php
	$i == 0;
	if (get_field('banner')) {
		
	
		// check if the repeater field has rows of data
		if( have_rows('banner') ):
			// loop through the rows of data
			while ( have_rows('banner')  && $i==0 ) : the_row();
			?>
    <div class="hidden-xs item <?php if($i == 0) {echo 'active';} ?>" style="background-image: url('<?php the_sub_field('imagen'); ?>');height: 480px;width: 100%;background-size: cover;">
  		<div class="container">
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
								<a href="<?php the_sub_field('boton'); ?>"  target="<?php the_field('target'); ?>"><button type="button" class="btn"><?php the_sub_field('texto-boton') ?></button></a>
							</div>
							<?php } ?>
						</div>
		    		</div>
		      </div>
  		</div>
  	</div>
  	<div class="visible-xs">
  		<img class="img-responsive" src="<?php the_sub_field('imagen'); ?>" style="width: 100%;">
	  	<div class="container">
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
						<a href="<?php the_sub_field('boton'); ?>"><button type="button" class="btn"><?php the_sub_field('texto-boton') ?></button></a>
					</div>
					<?php } ?>
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
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

  <!-- Indicators -->
  <ol class="carousel-indicators">
   	<?php for ($j=0; $j < $i ; $j++) { ?>

   			<li data-target="#carousel-example-generic" data-slide-to="<?php echo $j; ?>" <?php if ($j == 0) {echo " class='active' ";} ?> ></li> 

	<?php } ?>
  </ol>
<?php } } ?>
	
</div>

<section class="container-fluid">
    <div class="container">
        <?php echo the_content(); ?>
    <div class="row">
	    <div class="col-md-12">
				<ul class="nav nav-tabs">
				  	<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php the_field("subtitulo") ?></a></li>
				  	<?php if( get_field('subtitulo2') ):	?>
					<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?php the_field("subtitulo2") ?></a></li>
					<?php endif; ?>
				</ul>
		</div>
	</div>
    <?php if(get_field('cuadrosegurosgris')): ?>
    	<!-- <div class="container">-->
    		<div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="home">
					<div class="row">
						<div class="col-md-12">
							<?php 
							if( have_rows('cuadrosegurosgris') ):
							  while ( have_rows('cuadrosegurosgris') ) : the_row(); 
							?>
							<div class="col-md-4">
								<div class="panel panel-default">
									  <div class="panel-body cuadrosIndex panelHgt">
									  	<h3>
									  		<a href="<?php the_sub_field('ligaproducto') ?>"><?php the_sub_field('tituloproducto') ?></a>
									  	</h3>
									  	<div class="row">
									  		<div class="col-md-12 col-sm-7">
									  			<span>
											  		<a href="<?php the_sub_field('ligaproducto') ?>", class="descripcionCuadroI"><?php the_sub_field('resumenproducto') ?></a>
											  	</span>
											  <?php if(get_sub_field('urlboton')): ?>
											  	<a class="vista" href="<?php the_sub_field('urlboton') ?>" target="<?php the_sub_field('targetbtn'); ?>"><button type="button" class="btn"><?php the_sub_field('txt-boton') ?></button></a>
											 <?php else: ?>
											 	<br>
											 <?php endif; ?>
									  		</div>
									  	</div>
									  </div>
								</div>
							</div>
							<?php
							  endwhile;
							endif;
							?>
						</div>
					</div>
			<?php endif; ?>
			<?php if(get_field('listaproducto')): ?>
		        <div class="container space">
							<div class="row">
								<div class="col-md-8 col-xs-12 lista">
									<div class="col-md-12 space">
										<h2 class="tituloLista">Otros Seguros de <?php the_field("subtitulo") ?></h2>
									</div>
									<?php 
									if( have_rows('listaproducto') ):
									  while ( have_rows('listaproducto') ) : the_row(); 
									?>
										<div class="col-md-12">
											<a href="<?php the_sub_field('ligaproducto') ?>">
												<h3><?php the_sub_field('tituloproducto') ?></h3>
											</a>
											<a href="<?php the_sub_field('ligaproducto') ?>">
												<p><?php the_sub_field('resumenproducto') ?></p>
											</a>
											<hr>
										</div>
									<?php
									  endwhile;
									endif;
									?>
								</div>
							</div>
						</div>
			<?php endif; ?>
				</div>

		<?php if( get_field('subtitulo2') ):	?>
			<div role="tabpanel" class="tab-pane" id="profile">
				<div class="row">
					<div class="col-md-12">
						<?php 
						if( have_rows('cuadrosegurosgris2') ):
							while ( have_rows('cuadrosegurosgris2') ) : the_row(); 
						?>
						<div class="col-md-4">
							<div class="panel panel-default">
									<div class="panel-body cuadrosIndex">
									<h3>
										<a href="<?php the_sub_field('ligaproducto') ?>"><?php the_sub_field('tituloproducto') ?></a>
									</h3>
									<div class="row">
										<div class="col-md-12 col-sm-7">
											<span>
												<a href="<?php the_sub_field('ligaproducto') ?>", class="descripcionCuadroI"><?php the_sub_field('resumenproducto') ?></a>
											</span>
										</div>
									</div>
									</div>
							</div>
						</div>
						<?php
							endwhile;
						endif;
						?>
					</div>
				</div>
			<?php endif; ?>
			<?php if(get_field('listaproducto2')): ?>
		        <div class="container">
					<div class="row">
						<div class="col-md-8 lista">
							<div class="col-md-12">
								<h2 class="tituloLista">Otros Seguros de <?php the_field("subtitulo2") ?></h2>
							</div>
							<?php 
							if( have_rows('listaproducto2') ):
								while ( have_rows('listaproducto2') ) : the_row(); 
							?>
								<div class="col-md-12">
									<a href="<?php the_sub_field('ligaproducto') ?>">
										<h3><?php the_sub_field('tituloproducto') ?></h3>
									</a>
									<a href="<?php the_sub_field('ligaproducto') ?>">
										<p><?php the_sub_field('resumenproducto') ?></p>
									</a>
									<hr>
								</div>
							<?php
								endwhile;
							endif;
							?>
						</div>
					</div>
				</div>
			<?php endif; ?>

		<!-- </div>-->
    </div>
</section>

<?php
$custom = get_post_custom();
if (isset($custom['openweb-related'][0])) {
    $relateds = unserialize($custom['openweb-related'][0]);

    $theme->renderView('post/related', $relateds);
}

get_footer();
