<div>
	<div class="container-fluid" style="padding-bottom: 0;">
		<div class="row">
			<?php
				if( have_rows('seccion_iconos') ):				
					while ( have_rows('seccion_iconos') ) : the_row();
			?>

			<div class="col-md-2 col-xs-4">
				<div class="icons-area">

					<?php if ( get_sub_field('url_icono_ext')): ?>
						<!-- Si la url es externa, que enlace acepte y use el link externo -->
                        <a href="<?php the_sub_field('url_icono_ext'); ?>" target="<?php the_sub_field('target_icono'); ?>"><span style="font-size: 30px;" class="<?php the_sub_field('clase_icono'); ?>"></span></a>
					<?php else :?>
					    <!-- Si no lo es, que muestre un enlace normal interno -->
						<a href="<?php the_sub_field('url_icono'); ?>" target="<?php the_sub_field('target_icono'); ?>"><span style="font-size: 30px;" class="<?php the_sub_field('clase_icono'); ?>"></span></a>
					<?php endif ;?>

					<label class="label-sectIcon" style="font-size: 1.3rem; margin-top: 10px; width: 100%;"><?php the_sub_field('label_icono'); ?></label>
				</div>
			</div>
            
			<?php 
				endwhile;
				endif;
			?>
		</div>
	</div>
</div>	