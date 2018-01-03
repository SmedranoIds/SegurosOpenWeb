<section class="container-fluid bg-grey100">
    <div class="bbva-cards card-stack">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="thin"><?php echo __('También te pueden interesar', 'openweb'); ?></h2>
                </div>
            </div>
            <div class="row">
                <section class="card-block">
                    <?php foreach ($vars as $related): ?>
                        <?php $category = wp_get_post_categories($related->ID, ['fields' => 'names'])[0]; ?>
                        <div class="col-xs-12 col-md-4">
                            <a href="<?php echo get_permalink($related->ID); ?>" class="card-wrap">
                                <span class="card-img bg-grey300" style="background-image: url(<?php echo get_the_post_thumbnail_url($related->ID, 'small-list-thumb'); ?>">
                                    <?php echo __('Imagen para', 'openweb');?> <?php echo $related->post_tile; ?>
                                </span>
                                <div class="card-text">
                                    <h4 class="article-category h6 bullet <?php echo \OpenWeb\Utils::sanitize($category); ?>">
                                         <?php echo __('Leer más', 'openweb'); ?>
                                    </h4>
                                    <h3 class="h5"><?php echo $related->post_title; ?></h3>
                                    <p><?php echo \OpenWeb\Theme::getExcerpt($related); ?></p>
                                </div>

                                <p class="faux-link"></p>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </section>
            </div>
        </div>
    </div>
</section>