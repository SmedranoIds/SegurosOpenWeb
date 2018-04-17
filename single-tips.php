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
<?php get_template_part('template-parts/components/chat'); ?>
<!-- end chat -->

<!-- single tips -->
<section class="container-fluid" style="background: #e9e9e9;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="titulo"><?php the_title(); ?></h1>
				<p><?php the_field('encabezadotips'); ?></p>
			</div>
		</div>	
		<div class="row">
			<?php 
				if(have_rows('tipshover') ):
				
					while( have_rows('tipshover') ): the_row(); 
					
						if(!empty(get_sub_field('imagen_tipshover'))):
							$image = get_sub_field('imagen_tipshover'); 
							$imgURL = $image['url'];
							$imgAlt = $image['alt'];
						endif;
				
				?>
			<div class="col-md-6" style="padding-bottom: 30px;">
					<div class="col ">
  						<div class="contenedor3-img ejemplo-1">
  							<div class="tips-title-container">
  								<span class="tips-title"><?php the_sub_field('title_tipshover'); ?></span>
  							</div>
							<img style="width: 100%;" src="<?php echo $imgURL; ?>" alt="<?php echo $imgAlt; ?>" />  
					     	<div class="mascara">  
						    	<h2><?php the_sub_field('title_tipshover'); ?></h2>  
						        <p><?php the_sub_field('resumen_tipshover'); ?></p>
						        <a href="<?php the_sub_field('url_button_tipshover'); ?>" class="tips-link" target="<?php the_sub_field('target_button_tipshover')?>"><?php the_sub_field('button_tipshover'); ?></a>  
						    </div>  
						</div>
					</div>
				</div>
				<?php
						$b++;
					  endwhile;
					endif;
				?>
			<?php if(get_field('card_seguros_tips')): ?>
                <div class="tab-content-tips">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="row bbva-cards">
                            <?php if(get_field('card_seguros_tips')): ?>
                            <?php 
                                if( have_rows('card_seguros_tips') ):
								while ( have_rows('card_seguros_tips') ) : the_row(); 

									if(!empty(get_sub_field('imagecard'))):
										$image = get_sub_field('imagecard'); 
										$imgURL = $image['url'];
										$imgAlt = $image['alt'];
									endif;
                            ?>
                                <div class="col-sm-6 col-md-4">
                                    <div class="card">
                                    <a href="<?php the_sub_field('urlcardbutton') ?>" target="<?php the_sub_field('targetcardbutton')?>">
									<div style="margin-top:3rem; width: 100%; height:220px; background:url('<?php echo $imgURL; ?>'); background-size: cover;"></div>
									<!-- <img class="card-block" src="<?php echo $imgURL; ?>" alt="<?php echo $imgAlt; ?>"> -->
									</a>
                                        <div class="card-body-tips">
                                            <h5 class="card-title"><?php the_sub_field('titulocard') ?></h5>
                                            <p class="card-text"><?php the_sub_field('resumencard') ?></p>
                                            <a href="<?php the_sub_field('urlcardbutton') ?>" class="card-link" target="<?php the_sub_field('targetcardbutton')?>"><?php the_sub_field('textcardbutton') ?></a>
                                        </div>
                                    </div>
                                </div>      
                            <?php
                                endwhile;
                                endif;
                            ?>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
        	<?php endif;?>
        	
        	<?php if(get_field('listaproducto')): ?>
                    <div class="container space">
                        <div class="row">
                            <div class="col-xs-12 lista">
                                <h2 class="tituloLista">Otros Seguros de <?php the_field("subtitulo") ?></h2>
                                <br>    
                                <?php 
                                    if( have_rows('listaproducto') ):
                                        while ( have_rows('listaproducto') ) : the_row(); 
                                ?>      
                                <a href="<?php the_sub_field('ligaproducto') ?>">
                                    <h3><?php the_sub_field('tituloproducto') ?></h3>
                                </a>
                                <a href="<?php the_sub_field('ligaproducto') ?>">
                                    <p><?php the_sub_field('resumenproducto') ?></p>
                                </a>
                                <hr>    
                                <?php
                                    endwhile;
                                    endif;
                                ?>
                            </div>
                        </div>
                    </div>
                
                <?php endif; ?>					
		</div>	
	</div>
</section>

    <!--<div class="container">
    	<div class="col-xs-12">
	    	<div class="row">
					<h1 class="titulo"><?php the_title(); ?></h1>
					<p><?php the_field('encabezadotips'); ?></p>

						<?php
						if( have_rows('tipshover') ): ?>
						<?php while( have_rows('tipshover') ): the_row(); ?>
				<div class="col-md-12" style="padding-bottom: 30px;">
					<div class="col-md-6 col-xs-12 ">
  						<div class="contenedor3-img ejemplo-1">  
					    	<img style="width: 100%;" src="<?php the_sub_field('imagen_tipshover'); ?>" />  
					     	<div class="mascara">  
						    	<h2><?php the_sub_field('title_tipshover'); ?></h2>  
						        <p><?php the_sub_field('resumen_tipshover'); ?></p>
						        <a href="<?php the_sub_field('url_button_tipshover'); ?>" class="link"><?php the_sub_field('button_tipshover'); ?></a>  
						    </div>  
						</div>
					</div>
				<?php if( get_sub_field('titletips2')){ ?>
					<div class="col-md-6 col-xs-12">
						<div class="contenedor3-img ejemplo-1">  
					    	<img style="width: 100%;" src="https://media.forgecdn.net/avatars/124/768/636424778749237239.jpeg" />  
					     	<div class="mascara">  
						    	<h2>Ejemplo 1</h2>  
						        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vitae tortor diam  in ullamcorper malesuada.</p>
						        <a href="#" class="link">Leer mas</a>  
						    </div>  
						</div>
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
</section>-->
<?php

/*
$custom = get_post_custom();
if (isset($custom['openweb-related'][0])) {
    $relateds = unserialize($custom['openweb-related'][0]);

    $theme->renderView('post/related', $relateds);
}
*/

?>

<?php get_footer();
