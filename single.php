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
								<a href="<?php the_sub_field('boton'); ?>" target="_blank"><button type="button" class="btn"><?php the_sub_field('texto-boton') ?></button></a>
							</div>
							<?php } ?>
						</div>
						<?php if (get_sub_field('urlboton2')) {  ?>
						<div class="spacebanner"></div>
						<div class="row tt3">
							<div class="col-md-7 col-sm-7 col-xs-7 text-left">
								<a href="<?php the_sub_field('urlboton2'); ?>" target="_blank"><button type="button" class="btn"><?php the_sub_field('txt-boton2') ?></button></a>
							</div>
						</div>
						<?php  }?>
		    		</div>
		      </div>
  		</div>
  	</div>
  	<div class="visible-xs">
  		<img class="img-responsive" src="<?php the_sub_field('imagen'); ?>">
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
						<a href="<?php the_sub_field('boton'); ?>"><button type="button" class="btn btn-info"><?php the_sub_field('texto-boton') ?></button></a>
					</div>
					<?php } ?>
				</div>
			<?php if (get_sub_field('urlboton2')) {?>
				<div class="col-xs-12 text-center">
					<div class="col-xs-12 text-center">
						<a href="<?php the_sub_field('urlboton2'); ?>"><button type="button" class="btn btn-info"><?php the_sub_field('txt-boton2') ?></button></a>
					</div>
				</div>
			<?php } ?>
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
			<div class="col-md-12 datosSeguro">

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
					    <div class="panel-heading collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive" role="tab" id="headingFive">
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
					    <div class="panel-heading" role="tab" id="heading<?php echo $a ?> <?php if($a != 0){?> collapsed <?php } ?>" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $a ?>" aria-expanded="true" aria-controls="collapse<?php echo $a ?>">
					      <h4 class="panel-title">
					        <a class="<?php if($a != 0){?> collapsed <?php } ?>" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $a ?>" aria-expanded="true" aria-controls="collapse<?php echo $a ?>">
					          <?php the_sub_field('titulo') ?>
					        </a>
					      </h4>
					    </div>
					    <div id="collapse<?php echo $a ?>" class="panel-collapse collapse <?php if($a === 0){?> in <?php } ?>" role="tabpanel" aria-labelledby="heading<?php echo $a ?>">
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

				<?php  endif;	
				 if( have_rows('preguntas') ): ?>
					<div class="panel panel-default ">
					    <div class="panel-heading collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix" class="trigger collapsed" role="tab" id="headingSix">
					      <h4 class="panel-title">
					        <a  class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix" class="trigger collapsed">
					          Preguntas Frecuentes
					        	
					        </a>
					      </h4>
					    </div>
					    <div id="collapseSix" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSix">
					      <div class="panel-body">
					      	<?php 
								if( have_rows('preguntas') ):
								  while ( have_rows('preguntas') ) : the_row();
								?>
					      	<h3><?php the_sub_field('pregunta') ?></h3>
					      	<p><?php the_sub_field('respuesta') ?></p>

					      	<?php
							endwhile;
							endif;
							?>
					      </div>
					    </div>
					</div>
				<?php  endif; ?>
				

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


<?php
}



get_footer();
?>