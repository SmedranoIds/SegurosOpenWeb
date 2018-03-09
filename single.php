<?php
/**
 * The template for displaying all single posts
 *
 *
 * @package OpenWeb
 * @subpackage Theme
 * @since 1.0
 * @version 1.0
 */

get_header();

while (have_posts()) {
    the_post();
?>
<!-- single  -->



<!-- chat -->
<?php get_template_part('template-parts/components/chat'); ?>
<!-- end chat -->


<!-- main slider -->
<?php get_template_part('template-parts/components/hero-slider');?>
<!-- end main slider -->



<!-- cuadro auto alerta 
<div class="bg-grey200">
	<br>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4">


				<?php 
					if( have_rows('autoalerta')): 
					while ( have_rows('autoalerta') ) : the_row();
				?>
				<div class="panel panel-default">
					<div class="panel-body">
						<h4><a href="http://tmkt.segurosbancomer.com/autoalerta/" target="_blank">AutoAlerta Bancomer</a></h4>
						<p>
							<?php if(get_sub_field('imgautoalerta')):?>
							<img src="<?php the_sub_field('imgautoalerta'); ?>" style="padding: 0 0 15px 15px; float: right;">
							<?php endif;?>
							<?php the_sub_field('desc_autoalerta') ?>
							<br>
							<a href="http://tmkt.segurosbancomer.com/autoalerta/" target="_blank"><b>Detalle del producto</b></a>	
							<br>

						</p>
					</div>
				</div>
				<?php 
						endwhile;
					endif;
				?>

			</div>
		</div>
	</div>
</div>
 end auto alerta -->

	
<!-- area de info -->
<div class="container separador">
		<div class="row">
			<div id="info-seguroBBVA" lass="col-xs-12 datosSeguro">
			<!-- <div class="col-md-12 accordion"> -->

				<!-- cuadros información -->
				<?php 
				$a = 0;
				if( have_rows('informacion') ):
				  while ( have_rows('informacion') ) : the_row(); 
				?>
				  <div class="panel panel-default">
				    <div class="panel-heading" role="tab" id="<?php if($a != 0){?> collapsed <?php } ?>" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $a ?>" aria-expanded="true" aria-controls="collapse<?php echo $a ?>">
				      <h4 class="panel-title">
				        <a class="<?php if($a != 0){?> collapsed <?php } ?>" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $a ?>" aria-expanded="true" aria-controls="collapse<?php echo $a ?> ">
				          <?php the_sub_field('titulo') ?>
								</a> 
								
				      </h4>
						</div> 
						<!--
												<div id="collapse<?php echo $a ?>" class="panel-collapse collapse in <?php if($a === 0){?> in <?php } ?>" role="tabpanel" aria-labelledby="heading<?php echo $a ?>">
						-->
						<div id="collapse<?php echo $a ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?php echo $a ?>">
				      <div class="panel-body">
				        <?php the_sub_field('contenido') ?>
				      </div>
				    </div>
				  </div>
				  <?php
				  	$a++;
					endwhile;
					endif;
					?>
				<?php if( have_rows('archivos') ): ?>
					<div class="panel panel-default">
					    <div class="panel-heading" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive" role="tab" id="headingFive">
					      <h4 class="panel-title">
					        <a  class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
					          Condiciones Generales
					        </a>
					      </h4>
					    </div>
					    <div id="collapseFive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFive">
					      <div class="panel-body">
					        <ul>
					        	<?php 
								if( have_rows('archivos') ):
								  while ( have_rows('archivos') ) : the_row();
								?>
								<p class="whitSpace"><strong><?php the_sub_field('tituloapartados') ?></strong></p>
					        	<p class="whitSpace"><?php the_sub_field('apartados') ?></p>
					        		<?php 
									if( have_rows('pdf') ):
									  while ( have_rows('pdf') ) : the_row();
									?>
					        			<li class="icon-pdf"><a href="<?php the_sub_field('urlarchivo') ?>" target="_blank"><?php the_sub_field('titulo') ?></a></li>
					        			<!-- <li class="bbva-coronita_doc-pdf"><a href="<?php the_sub_field('urlarchivo') ?>" target="_blank"><?php the_sub_field('titulo') ?></a></li> -->
					        		<?php
									endwhile;
									endif;
									?>
									<!-- <br> -->
					        	<?php
								endwhile;
								endif;
								?>
					        </ul>
					      </div>
					    </div>
					</div>
					<?php 
						if( have_rows('masinfo') ):
						$a = 30;
						if( have_rows('masinfo') ):
						while ( have_rows('masinfo') ) : the_row(); 
					?>
					  <div class="panel panel-default">
					    <!-- <div class="panel-heading" role="tab" id="heading<?php echo $a ?> <?php if($a != 0){?> collapsed <?php } ?>" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $a ?>" aria-expanded="true" aria-controls="collapse<?php echo $a ?>"> -->
					    <div class="panel-heading" role="tab" id="heading<?php echo $a ?>" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $a ?>" aria-expanded="true" aria-controls="collapse<?php echo $a ?>">
					      <h4 class="panel-title">
					        <!-- <a class="<?php if($a != 0){?> collapsed <?php } ?>" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $a ?>" aria-expanded="true" aria-controls="collapse<?php echo $a ?>"> -->
					        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $a ?>" aria-expanded="true" aria-controls="collapse<?php echo $a ?>">
					          <?php the_sub_field('titulo') ?>
					        </a>
					      </h4>
					    </div>
					    <div id="collapse<?php echo $a ?>" class="panel-collapse <?php if($a === 0){?> in <?php } ?>" role="tabpanel" aria-labelledby="heading<?php echo $a ?>">
					      <div class="panel-body">
					        <?php the_sub_field('contenido') ?>
					      </div>
					    </div>
					  </div>
				  <?php
					  	$a++;
						endwhile;
						endif;
					endif;
					?>

				<?php endif;	?>

			</div>
			<!-- end left column -->


			<!-- right column 
			<div class="col-md-4 col-xs-12 info-col-der">
			
				<?php //if(!get_post_type_object('empresas')): ?>
				<div class="panel panel-default text-center">
					<div class="panel-body bordeCuadros">
						<a class="chat posIcon", href="", onclick="openChat();">
							<i class="iconChat"></i>
							Chat
						</a>
					</div>
				</div>
				<?php //endif; ?>

				 
				<?php
				if( have_rows('cuadrochat2') ):
					if( have_rows('cuadrochat2') ):
						while ( have_rows('cuadrochat2') ) : the_row(); 
					?>
						<div class="panel panel-default text-center">
							<div class="panel-body bordeCuadros">
								<a class="chat posIcon", href="<?php the_sub_field('url') ?>" target="_blank">
									<i class="iconSprite <?php the_sub_field('imgclase') ?>"></i>
									<?php the_sub_field('titulo') ?>
								</a>
								
							</div>
						</div>
					<?php
						endwhile;
					endif;
				endif;
					?>
				
				
				<?php
				if( have_rows('cuadroblanco') ):
					while ( have_rows('cuadroblanco') ) : the_row(); 
				?>
				<div class="panel panel-default <?php the_sub_field('clase') ?>">
					<div class="panel-body bordeCuadros">
						<h2><?php the_sub_field('titulocuadro') ?></h2>
						<div class="row">
							<div class="col-md-7 col-sm-7">
								<p class="descripcion"><?php the_sub_field('descripcioncuadro') ?></p>
								
							</div>
							<div class="col-md-5 col-sm-5 text-center">
								<img class="imgCuadros", src="<?php the_sub_field('img') ?>" alt="">
							</div>
						</div>
						<?php if( get_sub_field('ligaproducto') ): ?>
							<a class="cuadro", href="<?php the_sub_field('ligaproducto') ?>">
								<?php the_sub_field('leyendaurl') ?>
								<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								
						</a>
					<?php endif; ?>
					</div>
				</div>
				<?php
					endwhile;
					endif;
				?>
				
			</div>

			end right column -->
		</div>
	</div>

<?php if (the_field('iframe')): ?>
	<div class="col-xs-12">
			<?php (the_field('iframe'))?>
	</div>
<?php endif; ?>


	<?php 
		if( have_rows('preguntas') ): 
	?>
		<!-- faqs vers mobile --> 
		<div class="bg-grey100 faqs_content hidden-md hidden-lg">
		<h3 style="padding-left: 2rem;">Preguntas frequentes</h3>

		<?php
			$q = 30;
			if( have_rows('preguntas') ):
				while ( have_rows('preguntas') ) : the_row(); 
		?>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="heading<?php echo $q ?> <?php if($q != 0){?> collapsed <?php } ?>" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $q ?>" aria-expanded="true" aria-controls="collapse<?php echo $q ?>">
					<h4 class="panel-title">
						<a class="<?php if($q != 0){?> collapsed <?php } ?>" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $q ?>" aria-expanded="true" aria-controls="collapse<?php echo $q ?>">
							<?php the_sub_field('pregunta') ?>
						</a>
					</h4>
				</div>
				<div id="collapse<?php echo $q ?>" class="panel-collapse collapse <?php if($q === 0){?> in <?php } ?>" role="tabpanel" aria-labelledby="heading<?php echo $q ?>">
					<div class="panel-body">
						<?php the_sub_field('respuesta') ?>
					</div>
				</div>
			</div>
		<?php
				$q++;
				endwhile;
			endif;
		?>
		</div>


		<!-- faqs vers tablet & desktop -->
		<div class="bg-grey100 faqs_content hidden-xs hidden-sm">
		<div class="container">
			<div class="col-xs-12">
				<h3>Preguntas frequentes</h3>
			</div>
			
			<div class="">
				<!-- listado de preguntas -->
				<div class="col-xs-5 faqs-tab-menu">
					<div class="faqs-sidetab">
						<?php 
							if( have_rows('preguntas') ):
							while ( have_rows('preguntas') ) : the_row();
						?>
							<a href="#"><?php the_sub_field('pregunta') ?></a>
						<?php
							endwhile;
							endif;
						?>
					</div>
				</div>

				<!-- area de respuestas -->
				<!-- <div class="col-xs-7 bhoechie-tab faqs-tab"> -->
				<div class="col-xs-7 faqs-tab">
						<?php 
						if( have_rows('preguntas') ):
							while ( have_rows('preguntas') ) : the_row();
						?>
						<!-- <div class="bhoechie-tab-content faqs-tab-content"> -->
						<div class="faqs-tab-content">
							<p class="title-faq"><?php the_sub_field('pregunta') ?><p>
							<p><?php the_sub_field('respuesta') ?></p>
						</div>
						<?php
							endwhile;
							endif;
						?>
				</div>
				
			</div>
		</div>
		</div>
		<?php 
			endif;
		?>

<?php
	}
	get_footer();
?>