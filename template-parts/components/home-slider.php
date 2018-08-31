<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  	
	<?php
	$i == 0;
	if (get_field('banner')) {
		
	
		// check if the repeater field has rows of data
		if( have_rows('banner') ):
			// loop through the rows of data
			while ( have_rows('banner')   ) : the_row();
			?>
	<div class="item <?php if($i == 0) {echo 'active';} ?>" 
	style="background-image: url('<?php the_sub_field('imagen'); ?>');height: 480px;width: 100%;background-size: cover;">
		<div class="container">
		    <div class="row">
		      <div class="col-md-12">
		      	<?php if(!empty(get_sub_field('titulo'))): ?>
		        <div class="box-tituloHome">
		          <h1 class="tituloHome"><?php the_sub_field('titulo'); ?></h1>
		          <p class="subtituloHome"><?php the_sub_field('introduccion'); ?></p>
		          <?php if (get_sub_field('boton')) {?>
		          <a href="<?php the_sub_field('boton'); ?>" target="_self"><span class="btn-bannerHome"><?php the_sub_field('texto-boton') ?></span></a>
		          <?php } ?>
		        </div>
		        <?php endif; ?>
		      </div>
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

  <!-- Indicators -->
  <ol class="carousel-indicators">
   	<?php for ($j=0; $j < $i ; $j++) { ?>
		<li data-target="#carousel-example-generic" data-slide-to="<?php echo $j; ?>" <?php if ($j == 0) {echo " class='active' ";} ?> ></li> 
	<?php } ?>
  </ol>
<?php } } ?>
</div>