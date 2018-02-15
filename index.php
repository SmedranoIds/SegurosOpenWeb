<?php
/**
 * The main template file
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Openweb
 * @subpackage Theme
 * @since 1.0
 * @version 1.0
 */
require_once __DIR__.'/vendor/autoload.php';
$theme = \OpenWeb\Theme::getInstance();

$articles = [];

while (have_posts()) {
    the_post();
    $articles[] = get_post();
}

get_header();
?>

<!-- chat -->
<?php include('template-parts/components/chat.php'); ?>
<!-- end chat -->

<section class="container-fluid bg-grey100">
    <section class="title text parbase container">
        <h1>
            <?php if (is_home()) {
                echo bloginfo('name');
            } elseif (is_category() || is_tag() || is_tax()) {
                echo sanitize_post($GLOBALS['wp_the_query']->get_queried_object())->name;
            }
            ?>
        </h1>
    </section>

    <div>
        <?php $theme->renderView('loop/structure', $articles); ?>
    </div>

</section>

<?php get_footer();
