<?php
/**
 * Template Name: Openweb - single
 * Template Post Type: page
 * Template Description: Plantilla para páginas.
 *
 * @package Openweb
 * @subpackage Coronita
 * @since OpenWeb Coronita 1.0
 */

get_header();

while (have_posts()) {
    the_post();
?>
<!-- page single -->


<!-- chat -->
<?php get_template_part('template-parts/components/chat');; ?>
<!-- end chat -->


<!-- main slider -->
<?php get_template_part('template-parts/components/hero-slider');?>
<!-- end main slider -->


<!-- contenido relacionado -->
<?php
/*
$custom = get_post_custom();
if (isset($custom['openweb-related'][0])) {
    $relateds = unserialize($custom['openweb-related'][0]);

    $theme->renderView('post/related', $relateds);
}*/
?>

<div class="container-fluid">
    <div class="container separador">
        <div class="row">

            <div id="info-seguroBBVA" class="col-xs-12 datosSeguro">
                
                <!-- Titulo sin banner -->
                <?php if( get_field('titulosinbanner') ): ?>
                    <h1 class="titulo"><?php the_field('titulosinbanner'); ?></h1>
                    <br>
                <?php endif; ?>
                <!-- end titulo -->

                <?php 
                $a = 0;
                if( have_rows('informacion') ):
                    while ( have_rows('informacion') ) : the_row(); 
                ?>
                    <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading<?php echo $a ?>">
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
                    ?>
                <?php if( have_rows('archivos') ): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFive">
                            <h4 class="panel-title">
                            <a  class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                Condiciones Generales
                            </a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
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
                                    <?php
                                    endwhile;
                                    endif;
                                    ?>
                                    <br>
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
                        <div class="panel-heading" role="tab" id="heading<?php echo $a ?>">
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
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                            <a  class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix" class="trigger collapsed">
                                Preguntas Frecuentes
                                
                            </a>
                            </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
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


            <!-- 
                Columna derecha
            <div class="col-md-4 col-xs-12">
                <div class="panel panel-default text-center">
                    <div class="panel-body bordeCuadros">
                    <a class="chat posIcon", href="", onclick="openChat();">
                        <i class="iconSprite chat"></i>
                        Chat
                    </a>
                    </div>
                </div>
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

            -->
        </div>
    </div>
</div>
<?php
}
?>

<?php

get_footer();
