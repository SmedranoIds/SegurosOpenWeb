<section class="pre-footer container-fluid bg-white">
    <div class="container">
        <div class="row">
            <section class="flex">
                <?php
                if (has_nav_menu('prefooter-left')) {
                    wp_nav_menu([
                        'theme_location'  => 'prefooter-left',
                        'menu_class'      => 'preFooter-style',
                        'container_class' => 'col-xs-12 col-sm-6 col-md-3',
                        'depth'           => 1,
                    ]);
                }

                if (has_nav_menu('prefooter-left-center')) {
                    wp_nav_menu([
                        'theme_location'  => 'prefooter-left-center',
                        'menu_class'      => 'preFooter-style',
                        'container_class' => 'col-xs-12 col-sm-6 col-md-3',
                        'depth'           => 1,
                    ]);
                }
                
                //if (has_nav_menu('prefooter-middle')) {
                //    wp_nav_menu([
                //        'theme_location'  => 'prefooter-middle',
                //        'menu_class'      => '',
                //        'container_class' => 'col-xs-12 col-sm-6 col-md-2',
                //        'depth'           => 1,
                //    ]);
                //}

                //if (has_nav_menu('prefooter-middle-center')) {
                //    wp_nav_menu([
                //        'theme_location'  => 'prefooter-middle-center',
                //        'menu_class'      => '',
                //        'container_class' => 'col-xs-12 col-sm-6 col-md-2',
                //        'depth'           => 1,
                //    ]);
                //}

                if (has_nav_menu('prefooter-right-center')) {
                    wp_nav_menu([
                        'theme_location'  => 'prefooter-right-center',
                        'menu_class'      => 'preFooter-style',
                        'container_class' => 'col-xs-12 col-sm-6 col-md-3',
                        'depth'           => 1,
                    ]);
                }

                if (has_nav_menu('prefooter-right')) {
                    wp_nav_menu([
                        'theme_location'  => 'prefooter-right',
                        'menu_class'      => 'preFooter-style',
                        'container_class' => 'col-xs-12 col-sm-6 col-md-3',
                        'depth'           => 1,
                    ]);
                }

                ?>
            </section>
        </div>
    </div>
</section>