<?php
/**
 * Template Name: Openweb - Page Full
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



<!-- area de tabs 
<div class="nav-container" class="container-fluid">
    <div class="container">
        <ul class="nav nav-tabs" role="tablist" >
        
            <?php
            // si hay elementos para crear tabs
            
            if( have_rows('tabpages') ):
                while ( have_rows('tabpages') ) : the_row(); 
                
            ?>

            <li role="presentation" <?php if( get_sub_field('active') ): ?> class="active" <?php endif; ?> >
            <?php 
                //Obtener el arreglo del objeto page/post 
                 $page_object = get_sub_field('link');
                
                //si tiene algo
                if( $page_object ): 

                    // override el objeto global $post de wordpress
                    $post = $page_object;
                    setup_postdata( $post ); 
            	?>
                <a <?php if( !get_sub_field('active') ): echo 'href="'./* imprime el link */ the_permalink().'"'; endif; ?> >
                    <?php /*imprime el nombre de la pagina */ the_title(); ?>
                </a>   

            </li>
            <?php
                /* IMPORTANTE - reset el objeto $post para que wordpress vuelva a funcionar correctamente */
                wp_reset_postdata();
            
                endif; 
                endwhile;
            endif;
            ?>
        </ul>
    </div>
</div> 
 end area de tabs -->

<!-- 2nd area de tabs -->
<!--
<div class="nav-container" class="container-fluid">
    <div class="container">
        <ul class="nav nav-tabs" role="tablist" >
            <li role="presentation" class="active">
                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                    <?php //the_field("subtitulo"); ?>
                    <?php /*imprime el nombre de la pagina */ the_title(); ?>
                </a>           
                </a>
            </li>
            <?php if( get_field('subtitulo2') ): ?>
            <li role="presentation">
                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                    <?php the_field("subtitulo2"); ?>
                </a>
            </li>  
            <?php endif; ?> 
                               
        </ul>
    </div>
</div> 
-->
<!-- end 2nd area de tabs -->

<section class="container-fluid" style="padding-top:0;">
    <div class="container">
	<div class="row">
		<div class="col-md-12">

                <!-- cards -->
                <?php if(get_field('cardseguro')): ?>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active">
                        <div class="row bbva-cards">

                            <br>
                            cards versión 1
                            <br>
                            <br>
                            <?php if(get_field('cardseguro')): ?>
                            <?php 
                                if( have_rows('cardseguro') ):
                                while ( have_rows('cardseguro') ) : the_row(); 

                                //Objeto imagen:
                                //si es diferente de vacío, que busque el objeto
                                if(!empty(get_sub_field('imagecard'))):
                                    //busca el objeto imagen
                                    $image = get_sub_field('imagecard');
                                    $imgURL = $image['url'];
                                    $imgAlt = $image['alt'];
                                endif;
                            ?>
                                <div class="col-sm-6 col-md-4">
                                    <div class="card">
                                    <a href="<?php //the_sub_field('urlcardbutton') ?>" target="<?php the_sub_field('targetcardbutton')?>">
                                        <img class="card-block" src="<?php echo $imgURL; ?>" alt="<?php echo $imgAlt; ?>" >
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php the_sub_field('titulocard') ?></h5>
                                        <p class="card-text"><?php the_sub_field('resumencard') ?></p>

                                        <?php if ( get_sub_field('urlexterno')): ?>
                                        <!-- Si la url es para un cotizador, que muestre un boton -->
                                            <a href="<?php the_sub_field('urlexterno') ?>" class="card-btn" target="_blank"><?php
                                                the_sub_field('labelurlexterno')
                                            ?></a>
                                        <?php else :?>
                                        <!-- Si no lo es, que muestre un enlace normal -->
                                            <a href="<?php //the_sub_field('urlcardbutton') ?>" class="card-link" target="<?php the_sub_field('targetcardbutton')?>">
                                                <?php the_sub_field('textcardbutton') ?>
                                            </a>
                                        <?php endif ;?>
                                    </div>
                                    </div>
                                </div>      
                            <?php
                                endwhile;
                                endif;
                            ?>
                            <?php endif;?>


                            

                            <?php
                            //  if(get_field('cardseguro')): 

                            if( have_rows('cardseguro') ):
                                while ( have_rows('cardseguro') ) : the_row(); 

                                $post_object = get_sub_field('urlcardbutton');

                                if( $post_object ): 

                                    // override $post
                                    $post = $post_object;
                                    setup_postdata( $post ); 
                                    ?>

                                    <!-- 
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <p><?php the_content();?></p>
                                    <hr>-->

                                    <div class="col-sm-6 col-md-4">
                                        <div class="card">
                                        <!-- <?php the_post_thumbnail();?> -->
                                        <a href="<?php the_permalink(); ?>" target="<?php ?>">
                                            <?php the_post_thumbnail(); ?>
                                            <!-- <img class="card-block" src="<?php ?>" alt="<?php ?>" > -->
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php the_title();?></h5>
                                            <p class="card-text"><?php the_content();?></p>

                                            <?php if ( get_sub_field('urlexterno')): ?>
                                            <!-- Si la url es para un cotizador, que muestre un boton -->
                                                <a href="<?php the_sub_field('urlexterno') ?>" class="card-btn" target="_blank"><?php
                                                    //the_sub_field('labelurlexterno'); ?>Cotizar ahora</a>
                                            <?php else :?>
                                            <!-- Si no lo es, que muestre un enlace normal -->
                                                <a href="<?php the_permalink(); ?>" class="card-link">
                                                    <?php //the_sub_field('textcardbutton') ?>Leer más
                                                </a>
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
