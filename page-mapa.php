<?php
/**
 * Template Name: Openweb - Mapa
 * Template Post Type: page
 * Template Description: Plantilla para páginas.
 *
 * @package OpenWeb
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
<!-- mapa -->
<section class="container-fluid">
    <div class="container">
      <h1 class="titulo"><?php echo the_title_attribute(); ?></h1>
        <?php echo the_content(); ?>
    </div>
</section>

<?php
$custom = get_post_custom();
if (isset($custom['openweb-related'][0])) {
    $relateds = unserialize($custom['openweb-related'][0]);

    $theme->renderView('post/related', $relateds);
}

get_footer();
