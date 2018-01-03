<?php $category = wp_get_post_categories($vars['item']->ID, ['fields' => 'names'])[0]; ?>

<a href="<?php echo get_permalink($vars['item']->ID); ?>" class="card-wrap">
    <span class="card-img bg-grey300" style="background-image: url(<?php echo get_the_post_thumbnail_url($vars['item']->ID, 'share-thumb'); ?>">
        <?php echo __('Imagen para', 'openweb');?> <?php echo $vars['item']->post_tile; ?>
    </span>
    <div class="card-text">
        <h4 class="article-category h6 bullet <?php echo \OpenWeb\Utils::sanitize($category); ?>">
            <?php echo $category; ?>
        </h4>
        <h3 class="h5"><?php echo $vars['item']->post_title; ?></h3>
        <p><?php echo \OpenWeb\Theme::getExcerpt($vars['item']); ?></p>
    </div>

    <p class="faux-link"> <?php echo __('Leer más', 'openweb'); ?></p>
</a>