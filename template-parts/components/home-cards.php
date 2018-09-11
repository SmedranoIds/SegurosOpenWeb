<section class="container-fluid bg-grey200">
  <div class="container">
	  <div class="row">
	  	<?php
			if( have_rows('cards_home') ):				
				while ( have_rows('cards_home') ) : the_row();
			?>
			
			<?php if ( get_sub_field('activo')): ?>
                <!-- Si la card tiene la imagen a la derecha, que muestre: -->
                <div class="col-md-12">
			      <div class="card-content">
			        <a href="<?php the_sub_field('link_cardHome'); ?>" target="_self"><div class="card-derecha imagen-d" style="background-image: url('<?php the_sub_field('imagen_cardHome'); ?>');">
			          <label class="card-derecha titulo-cardHome-d"><?php the_sub_field('titulo_cardHome'); ?></label>
			        </div></a>
			        <div class="card-derecha contenido-d">
			          <div class="cont-inter">
									<?php 
										$icono = get_sub_field('icono_cardHome');
										if( !empty($icono) ):
									?>
									<img class="imagen-con" src="<?php echo $icono['url']; ?>" alt="<?php echo $icono['alt']; ?>">
									<?php endif; ?>
			            <p class="icono-textoBapp"><?php the_sub_field('resumen_cardHome'); ?></p>
			          </div>
			          <div class="card-derecha links-d">
			            <label><a href="<?php the_sub_field('link_cardHome'); ?>" target="self"><?php the_sub_field('textLink_cardHome'); ?></a></label>
			          </div>
			        </div>
			      </div>
			    </div>
			<?php else :?>
                <!-- Si no lo es, que muestre un card normal -->
                <div class="col-md-12">
			      <div class="card-content">
			        <a href="<?php the_sub_field('link_cardHome'); ?>" target="_self"><div class="card-izquierda imagen" style="background-image: url('<?php the_sub_field('imagen_cardHome'); ?>');">
			          <label class="card-izquierda titulo-cardHome"><?php the_sub_field('titulo_cardHome'); ?></label>
			        </div></a>
			        <div class="card-izquierda contenido">
			          <div class="cont-inter">
									<?php 
										$icono = get_sub_field('icono_cardHome');
										if( !empty($icono) ):
									?>
									<img class="imagen-con" src="<?php echo $icono['url']; ?>" alt="<?php echo $icono['alt']; ?>">
									<?php endif; ?>
			            <p class="icono-textoBapp"><?php the_sub_field('resumen_cardHome'); ?></p>
			          </div>
			          <div class="card-izquierda links">
			            <label><a href="<?php the_sub_field('link_cardHome'); ?>" target="self"><?php the_sub_field('textLink_cardHome'); ?></a></label>
			          </div>
			        </div>
			      </div>
			    </div>
			<?php endif ;?>
	    <?php 
				endwhile;
				endif;
			?>
	  </div>
    </div>
</section>