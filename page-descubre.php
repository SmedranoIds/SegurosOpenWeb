<?php
/**
 * Template Name: Openweb - Page Descubre
 * Template Post Type: page
 * Template Description: Plantilla para páginas sólo con cabecera y pie.
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


<!-- page descubre -->
<?php
while (have_posts()) {
    the_post();
}?>


<!-- chat -->
<?php include('template-parts/components/chat.php'); ?>
<!-- end chat -->



<?php
if (have_posts()):
  while (have_posts()) : the_post();
    the_content();
  endwhile;
endif;
?>

<!-- tips -->
<section class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
        <h2 class="title_hogar-seguro"><?php the_field('encabezadotips'); ?></h2>
			</div>
		</div>	
		<div class="row">
			<?php 
				if(have_rows('tipshover') ): ?>
				<?php while( have_rows('tipshover') ): the_row(); ?>
			<div class="col-md-4" style="padding-bottom: 30px;">
        <div class="hogar-contenedorejemplo-1">
          <div class="tips-title-container">
            <span class="tips-title"><?php the_sub_field('title_tipshover'); ?></span>
          </div>
          <img style="width: 100%;" src="<?php the_sub_field('imagen_tipshover'); ?>" />  
          <div class="mascara">  
            <h2><?php the_sub_field('title_tipshover'); ?></h2>  
              <p><?php the_sub_field('resumen_tipshover'); ?></p>
              <a href="<?php the_sub_field('url_button_tipshover'); ?>" class="tips-link" target="<?php the_sub_field('target_button_tipshover')?>"><?php the_sub_field('button_tipshover'); ?></a>  
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
                            ?>
                                <div class="col-sm-6 col-md-4">
                                    <div class="card">
                                    <a href="<?php the_sub_field('urlcardbutton') ?>" target="<?php the_sub_field('targetcardbutton')?>"><img class="card-block" src="<?php the_sub_field('imagecard') ?>" alt="Card image cap"></a>
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

<?php

/*
$custom = get_post_custom();
if (isset($custom['openweb-related'][0])) {
    $relateds = unserialize($custom['openweb-related'][0]);
    $theme->renderView('post/related', $relateds);
}
*/

?>
<?php 
get_footer();
