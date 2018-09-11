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

            
            if(!empty(get_sub_field('imagen'))):
                $banner = get_sub_field('imagen');
                $urlBanner = $banner['url'];
                $altBanner = $banner['alt'];
            endif;
        
        ?>
        <div class="hidden-xs item hero-slider <?php if($i == 0) {echo 'active';} ?>" style="background-image: url('<?php /*the_sub_field('imagen');*/ echo $urlBanner; ?>'); <?php 
            if(is_page("salud")):
                echo "background-position: center -150px";
            endif;
            
            if(is_page("seguro-hogar")):
                echo "background-position: center -40px;";
            endif;
            
            /*
            if(is_page("seguro-automotriz")):
                echo "background-position: center -150px";
            endif;
            if(is_page("seguro-ahorro")):
                echo "background-position: center -240px;";
            endif;

            if(is_page("seguro-hogar/bancomer/")):
                echo "background-position: center -70px;";
            endif;
            if(is_page("seguro-hogar/contenidos/")):
                echo "background-position: center -20px;";
            endif;
            */
            
            ?>;">
            <div class="container">
                <div class="col-md-6 col-sm-7" style="padding-top: 70px;">
                        <div class="banner-msn">
                            <div class="row tt">
                                <div class="col-md-10 col-sm-10">
                                    <h1 class="banner-title"><?php the_sub_field('titulo'); ?></h1>
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
                                    <a href="<?php the_sub_field('boton'); ?>" target="<?php the_sub_field('target-btn')?>"><button type="button" class="btn"><?php the_sub_field('texto-boton') ?></button></a>
                                </div>
                                <?php } ?>
                            </div>
                            <?php if (get_sub_field('urlboton2')) {  ?>
                            <div class="spacebanner"></div>
                            <div class="row tt3">
                                <div class="col-md-7 col-sm-7 col-xs-7 text-left">
                                    <a href="<?php the_sub_field('urlboton2'); ?>" target="<?php the_sub_field('target-btn-2')?>"><button type="button" class="btn"><?php the_sub_field('txt-boton2') ?></button></a>
                                </div>
                            </div>
                            <?php  }?>
                        </div>
                </div>
            </div>
        </div>
        <div class="visible-xs">
            <img class="img-responsive" src="<?php /*the_sub_field('imagen');*/ echo $urlBanner; ?>" alt="<?php echo $altBanner; ?>">
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
                            <a href="<?php the_sub_field('boton'); ?>" target="<?php the_sub_field('target-btn')?>"><button type="button" class="btn"><?php the_sub_field('texto-boton') ?></button></a>
                        </div>
                        <?php } ?>
                    </div>
                <?php if (get_sub_field('urlboton2')) {?>
                    <div class="col-xs-12 text-center">
                        <div class="col-xs-12 text-center">
                            <a href="<?php the_sub_field('urlboton2'); ?>"><button type="button" class="btn"><?php the_sub_field('txt-boton2') ?></button></a>
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