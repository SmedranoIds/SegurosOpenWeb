<?php
/**
 * Template Name: Openweb - Page contenidoTips
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

<section class="container-fluid">
    <div class="container">
    	<div class="col-md-12 col-sm-12">
	    	<div class="row tt">
						
					<div class="row">
						<div class="col-xs-10 col-xs-offset-1">
							<article class="block item-list">
								<div class="inner">
									<h1 class="titulo"><?php the_field('titulo1'); ?></h1>
								    <p><img src="<?php the_field('imagen'); ?>" alt="" title="" style="float: left; padding-right: 20px;"/>
								    	<br>
								    <strong><?php the_title(); ?></strong></p>
								    <br>
								    <p><?php the_field('textbody'); ?></p>
								    
								     
								</div>
							</article>

						</div>
					</div>
	    		</div>
	    	</div>
    </div>
</section>

<?php get_footer();
