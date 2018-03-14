<?php
/**
 * Template Name: Openweb - Page Glosario
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

<?php
if (have_posts()):
  while (have_posts()) : the_post();
     the_content();
  endwhile;
endif;
?>


<?php 
get_footer();