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


<!-- chat -->
<?php include('template-parts/components/chat.php'); ?>
<!-- end chat -->


<!-- main slider -->
<?php include('template-parts/components/hero-slider.php')?>
<!-- end main slider -->



<section class="container-fluid">
    <div class="container">
	<div class="row">
		<div class="col-md-12">
            <!-- Nav tabs -->
            <div class=" ">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                            <?php the_field("subtitulo"); ?>        
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

            <!-- Tab panes -->
                <?php if(get_field('cardseguro')): ?>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <div class="row bbva-cards">
                            <?php if(get_field('cardseguro')): ?>
                            <?php 
                                if( have_rows('cardseguro') ):
                                while ( have_rows('cardseguro') ) : the_row(); 
                            ?>
                                <div class="col-sm-6 col-md-4">
                                    <div class="card">
                                    <a href="<?php the_sub_field('urlcardbutton') ?>" target="<?php the_sub_field('targetcardbutton ')?>"><img class="card-block" src="<?php the_sub_field('imagecard') ?>" alt="Card image cap"></a>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php the_sub_field('titulocard') ?></h5>
                                            <p class="card-text"><?php the_sub_field('resumencard') ?></p>
                                            <a href="<?php the_sub_field('urlcardbutton') ?>" class="card-link" target="<?php the_sub_field('targetcardbutton   ')?>"><?php the_sub_field('textcardbutton') ?></a>
                                        </div>
                                    </div>
                                </div>      
                            <?php
                                endwhile;
                                endif;
                            ?>
                            <?php endif;?>
                        <!--</div>-->
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
                </div>
                    <?php endif; ?>
                    </div>


                    <?php if( get_field('subtitulo2') ):    ?>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <div class="row bbva-cards">
                            <?php if(get_field('cardseguro2')): ?>

                                <?php 
                                    if( have_rows('cardseguro2') ):
                                    while ( have_rows('cardseguro2') ) : the_row(); 
                                ?>
                                <div class="col-sm-6 col-md-4">
                                    <div class="card">
                                    <a href="<?php the_sub_field('urlcardbutton') ?>" target="<?php the_sub_field('targetcardbutton ')?>"><img class="card-block" src="<?php the_sub_field('imagecard') ?>" alt="Card image cap"></a>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php the_sub_field('titulocard') ?></h5>
                                            <p class="card-text"><?php the_sub_field('resumencard') ?></p>
                                            <a href="<?php the_sub_field('urlcardbutton') ?>" class="card-link" target="<?php the_sub_field('targetcardbutton   ')?>"><?php the_sub_field('textcardbutton') ?></a>
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
	                <?php if(get_field('listaproducto2')): ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 lista">
                                    
                                    <h2 class="tituloLista">Otros Seguros de <?php the_field("subtitulo2") ?></h2>
                                    <br>
                                    <?php 
                                    if( have_rows('listaproducto2') ):
                                        while ( have_rows('listaproducto2') ) : the_row(); 
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

                <?php endif; ?>                        
                </div>
            	<?php endif; ?>
            </div>
        </div>
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

get_footer();
