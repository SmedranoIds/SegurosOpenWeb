<?php
require_once OPENWEB_THEME_PATH.'/vendor/autoload.php';

$theme = \OpenWeb\Theme::getInstance();
$authorUrl = get_author_posts_url(get_the_author_meta('ID'));
$authorName = get_the_author_meta('display_name');
$custom = get_post_custom();
?>

<section class="container page-header">
    <div class="row">
        <div class="col-xs-12 col-sm-2"></div>
        <div class="col-xs-12 col-sm-8">
            <h1 class="h2"><?php the_title(); ?></h1>
        </div>
        <div class="col-xs-12 col-sm-2"></div>
    </div>
</section>

<section class="container-fluid image-header image-header-blog bg-grey300"
         style="background-image: url(<?php the_post_thumbnail_url('main-thumb'); ?>)"
         data-300="background-position: 50% 30%" data-0="background-position: 50% 50%" id="post-image">
</section>

<section class="container-fluid blog-article-block" id="post-author">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-2"></div>

            <div class="col-xs-12 col-sm-8">
                <div class="blog-author-block">
                    <div class="blog-author">
                        <div class="profile-img img-round">
                            <a href="<?php echo $authorUrl; ?>" class="img-link">
                                <img src="<?php echo get_avatar_url(get_the_author_meta('user_email')); ?>"
                                     alt="<?php echo $authorName; ?>" data-object-fit="cover" class="media">
                            </a>
                        </div>
                        <p class="byline">
							    <span itemprop="author" itemscope="" itemtype="http://schema.org/Person">
                                    <span itemprop="name">
                                        <a href="<?php echo $authorUrl; ?>"><?php echo $authorName; ?></a>
							        </span>
							    </span>
                        </p>
                    </div>
                    <ul class="blog-social-share">
                        <?php foreach ($theme::SHARE_BUTTONS_SOCIAL_NET as $social): $name = str_replace('-', '', $social); ?>
                            <li>
                                <a href="#" data-type="<?php echo $name; ?>"
                                   data-url="<?php echo get_permalink(); ?>"
                                   data-title="<?php echo the_title(); ?>"
                                   data-via="<?php echo get_bloginfo('name'); ?>"
                                   data-description="<?php echo wp_strip_all_tags(strip_shortcodes(get_the_excerpt()), true); ?>"
                                   data-media="<?php the_post_thumbnail_url('share-thumb'); ?>"
                                   class="prettySocial">
                                    <span class="icon bbva-<?php echo $social; ?>"></span>
                                    <span><?php echo $name; ?>"></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="col-xs-12 col-sm-2"></div>
        </div>
    </div>
</section>

<section class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-2"></div>
            <div class="col-xs-12 col-sm-8">
                <meta itemprop="datePublished" content="<?php the_date('Y-m-d'); ?>">
                <p class="blog-date"><?php the_modified_date('l, d F Y'); ?></p>
                <?php $categories = get_the_category(); ?>
                <?php if (count($categories)): ?>
                <div>
                    <ul class="category-content">
                    <?php foreach ($categories as $category): ?>
                        <li>
                            <h4 class="h6 item-category <?php echo \OpenWeb\Utils::sanitize($category->name); ?>">
                                <a href="<?php echo get_category_link($category); ?>"><?php echo $category->name; ?></a>
                            </h4>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                <section>
                    <div class="text parbase section" id="content">
                        <?php the_content(); ?>
                    </div>

                    <?php
                    $tags = wp_get_post_tags($post->ID, ['fields' => 'ids']);

                    if (count($tags)): $cloud = wp_tag_cloud(['include' => $tags, 'format' => 'array']); ?>
                        <ul class="openweb-cloud-tag">
                        <?php foreach ($cloud as $link): ?>
                            <li><?php echo $link; ?></li>
                        <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if (isset($custom['openweb-disclaimer'])): ?>
                        <div class="text parbase section">
                            <p><span class="disclosure"><?php echo $custom['openweb-disclaimer'][0]; ?></p>
                        </div>
                    <?php endif; ?>
                </section>
            </div>
            <div class="col-xs-12 col-sm-2"></div>
        </div>
    </div>
</section>

<?php
if (isset($custom['openweb-related'][0])) {
    $relateds = unserialize($custom['openweb-related'][0]);

    if (count($relateds)) {
        $theme->renderView('post/related', $relateds);
    }
}
