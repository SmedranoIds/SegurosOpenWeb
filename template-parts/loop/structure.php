<?php
$part1 = array_slice($vars, 0, 3);
$part2 = array_slice($vars, 3, 3);
$part3 = array_slice($vars, 6, 3);

$theme = \OpenWeb\Theme::getInstance();
?>

<div class="featuredArticles">
    <div class="articles">
        <?php if (count($part1)): ?>
        <div class="bbva-cards bbva-cards-editorial card-stack">
            <div class="container">
                <div class="row">
                    <section class="card-block">
                        <div class="col-xs-12 col-md-6">
                            <?php if (isset($part1[0])): ?>
                                <?php echo $theme->renderView('loop/item', ['item' => $part1[0]]); ?>
                            <?php endif; ?>
                        </div>

                        <div class="col-xs-12 col-md-6">
                            <?php if (isset($part1[1])): ?>
                                <?php echo $theme->renderView('loop/item', ['item' => $part1[1]]); ?>
                            <?php endif; ?>

                            <?php if (isset($part1[2])): ?>
                                <?php echo $theme->renderView('loop/item', ['item' => $part1[2]]); ?>
                            <?php endif; ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (count($part2)): ?>
        <div class="bbva-cards card-stack">
            <div class="container">
                <div class="row">
                    <section class="card-block">
                        <?php foreach ($part2 as $item): ?>
                        <div class="col-xs-12 col-md-4">
                            <?php echo $theme->renderView('loop/item', ['item' => $item]); ?>
                        </div>
                        <?php endforeach; ?>
                    </section>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if (count($part3)): ?>
        <div class="bbva-cards bbva-cards-editorial bbva-cards-editorial-alternate card-stack">
            <div class="container">
                <div class="row">
                    <section class="card-block">
                        <div class="col-xs-12 col-md-6">
                            <?php if (isset($part3[0])): ?>
                                <?php echo $theme->renderView('loop/item', ['item' => $part3[0]]); ?>
                            <?php endif; ?>
                        </div>

                        <div class="col-xs-12 col-md-6">
                            <?php if (isset($part3[1])): ?>
                                <?php echo $theme->renderView('loop/item', ['item' => $part3[1]]); ?>
                            <?php endif; ?>

                            <?php if (isset($part3[2])): ?>
                                <?php echo $theme->renderView('loop/item', ['item' => $part3[2]]); ?>
                            <?php endif; ?>
                        </div>
                    </section>
                </div>

                <?php
                $data = '';
                $type = '';
                $post = \OpenWeb\Admin\Post::PATH_POST;

                if (is_home()) {
                    $data = 'home';
                } elseif (is_category()) {
                    $data = 'category_'.get_queried_object()->cat_ID;
                    $type = \OpenWeb\Admin\Post::PATH_CATEGORY;
                } elseif (is_tag()) {
                    $data = 'tag_'.get_queried_object()->term_id;
                    $type = \OpenWeb\Admin\Post::PATH_TAG;
                } elseif (is_author()) {
                    $data = 'author_'.get_queried_object()->ID;
                    $type = \OpenWeb\Admin\Post::PATH_AUTHOR;
                }
                ?>

                <div class="row" id="tpl-more">
                    <div class="col-xs-12">
                        <div class="view-more">
                            <a href="#" class="icon-link" id="lazyload" data-lazy="<?php echo $data; ?>" data-page="0" data-type="<?php echo $type; ?>" data-post="<?php echo $post; ?>">
                                <span class="icon bbva-coronita_add"></span><?php echo __('Ver más artículos', 'openweb'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div id="moreArticles"></div>

    </div>
</div>