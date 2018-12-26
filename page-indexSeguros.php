<?php
/**
 * Template Name: Openweb - Page Index Seguros
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
<!-- page index seguros -->

<?php if (is_page("Vida")) {?>
    <script src="<?php echo bloginfo('template_url'); ?>/js/dataTag_vida.js"></script>
<?php } elseif (is_page("Hogar")){?>
    <script src="<?php echo bloginfo('template_url'); ?>/js/dataTag_hogar.js"></script>
<?php }?>

<!-- chat -->
<?php get_template_part('template-parts/components/chat'); ?>
<!-- end chat -->


<!-- main slider -->
<?php get_template_part('template-parts/components/hero-slider');?>
<!-- end main slider -->


<section class="container-fluid" style="padding-top:0;">
    <div class="container">
	<div class="row">
		<div class="col-md-12">

                <!-- cards -->
                <?php if(get_field('cardseguro')): ?>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active">
                        <div class="row bbva-cards">

                            <?php
                            if( have_rows('cardseguro') ):
                                while ( have_rows('cardseguro') ) : the_row(); 

                                $post_object = get_sub_field('urlcardbutton');

                                if( $post_object ): 

                                    // override $post
                                    $post = $post_object;
                                    setup_postdata( $post ); 


                                    ?>

                                    <div class="col-sm-6 col-md-4">
                                        <div class="card">
                                        <?php if ( get_sub_field('urlexterno')): 
                                            //El objeto imagen
                                            if(!empty(get_sub_field('imagecard'))):
                                                $image = get_sub_field('imagecard');
                                                $imgURL = $image['url'];
                                                $imgAlt = $image['alt'];
                                            endif;    
                                        ?>
                                            <a href="<?php the_sub_field('urlexterno'); ?>" target="_blank">
                                            <img src="<?php echo $imgURL ;?>" alt="<?php echo $imgAlt; ?>">
                                        <?php else: ?>
                                            <a href="<?php the_permalink(); ?>" target="<?php ?>">
                                            <div class="card-post-image" style="background: url('<?php /* the_post_thumbnail();*/ the_post_thumbnail_url(); ?>') no-repeat;"></div>
                                        <?php   
                                            endif;
                                        ?>
                                            </a>
                                        <div class="card-body">
                                        <?php if ( get_sub_field('urlexterno')): ?>
                                            <h5 class="card-title"><?php the_sub_field('titulocard');?></h5>
                                            <p class="card-text"><?php the_sub_field('resumencard');?></p>
                                        <?php else: ?>
                                            <h5 class="card-title"><?php the_title();?></h5>
                                            <p class="card-text"><?php the_content();?></p>
                                        <?php endif; ?>
                                            <?php if ( get_sub_field('urlexterno')): ?>
                                            <!-- Si la url es para un cotizador, que muestre un boton -->
                                                <a href="<?php the_sub_field('urlexterno'); ?>" class="card-btn" target="_blank"><?php the_sub_field('labelurlexterno'); ?></a>
                                            <?php else :?>
                                            <!-- Si no lo es, que muestre un enlace normal -->
                                                <a href="<?php the_permalink(); ?>" class="card-link">Leer más</a>
                                            <?php endif ;?>
                                        </div>
                                        </div>
                                    </div>  
                                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
                                endif;
                            ?>
    
                            <?php
                                endwhile;
                                endif;
                            // endif;
                            ?>

                        </div>

                    <!-- lista de otros seguros -->
                    <?php if(get_field('listaproducto')): ?>
                    <div class="container space">
                        <div class="row">
                            <div class="col-xs-12 lista">
                                <h2 class="tituloLista">Otros Seguros de <?php the_title();?></h2>
                                <br>
                                <br>
                                <?php 
                                    if( have_rows('listaproducto') ):
                                        while ( have_rows('listaproducto') ) : the_row(); 

                                        $post_object = get_sub_field('ligaproducto');

                                        if( $post_object ): 

                                            // override $post
                                            $post = $post_object;
                                            setup_postdata( $post ); 
                                            ?>

                                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                            <p><?php the_content();?></p>
                                            <hr>
                                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
                                        endif;

                                    endwhile;
                                    endif;
                                ?>
                                

                            </div>
                        </div>
                    </div>
                
                <?php endif; ?>
                </div>

                       
                </div>
            	<?php endif; ?>
            
        </div>
	</div>
</div>
</section>

<?php

get_footer();
