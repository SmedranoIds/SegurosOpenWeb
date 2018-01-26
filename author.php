<?php
/**
 * The template for displaying all posts's author
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#author
 *
 * @package OpenwebMod
 * @subpackage Theme
 * @since 1.0
 * @version 1.0
 */

get_header();
$theme = \OpenWeb\Theme::getInstance();
$name = get_the_author_meta('display_name');
$author = get_queried_object();
$articles = [];

while (have_posts()) {
    the_post();
    $articles[] = get_post();
}
?>

<section>
    <section class="container-fluid image-header image-header-blog" style="background-image: url(<?php echo get_the_author_meta('image-page-author'); ?>)" role="heading" data-300="background-position: 50% 30%" data-0="background-position: 50% 50%">
        <div class="image-header-overlay"></div>

        <?php if (($quote = get_the_author_meta('quote-page-author'))): ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">

                    <h2 id="image-header-474633988" class="h1" data-300="opacity:0;" data-0="opacity:1; margin:0 auto">
                        <?php echo '“'.get_the_author_meta('quote-page-author').'”'; ?>
                    </h2>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </section>
</section>

<section class="container-fluid blog-author-page">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="profile-img img-round">
                    <img src="<?php echo get_avatar_url(get_the_author_meta('user_email')); ?>" alt="<?php echo $name; ?>">
                </div>

                <h1 class="h2"><?php echo $name; ?></h1>
                <?php if (($twitter = get_the_author_meta('twitter'))): ?>
                <ul class="blog-author-social">
                    <li>
                        <a href="https://twitter.com/<?php echo $twitter; ?>" target="_blank" class="icon bbva-twitter">
                            <span><?php echo $twitter; ?></span>
                        </a>
                    </li>
                </ul>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-8">
                <p><?php echo get_the_author_meta('description'); ?></p>
            </div>

            <div class="col-xs-6 col-sm-2">
                <p class="blog-counter">
                    <span class="large-numbers"><?php echo $theme->countAuthorArticles($author->ID); ?></span>
                    <?php echo __('Artículos escritos', 'openweb'); ?>
                </p>
                <p></p>
            </div>

            <div class="col-xs-6 col-sm-2">
                <p class="blog-counter">
                    <span class="large-numbers"><?php echo $theme->countCategoriesByAuthor($author->ID); ?></span>
                    <?php echo __('Categorías incluídas', 'openweb'); ?>
                </p>
                <p></p>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid bg-grey100">

    <section class="container">
        <div class="row">
            <div class="col-xs-8">
                <h2><?php echo __('Artículos recientes', 'openweb'); ?></h2>
            </div>
        </div>
    </section>

    <?php $theme->renderView('loop/structure', $articles); ?>

</section>

<?php get_footer();