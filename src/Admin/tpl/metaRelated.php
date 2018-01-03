<fieldset>
    <ul class="categorychecklist form-no-clear">
        <li>
            <label class="selectit">
                <input value="auto" name="openweb-related" id="openweb-related-auto" <?php echo $vars['meta']['openweb-related-type'][0] === 'auto' || ! isset($vars['meta']['openweb-related-type']) ? 'checked="checked"' : ''; ?> type="radio">
                <?php echo __('Generar <strong>automáticamente</strong> las publicaciones relacionadas.', 'openweb'); ?>
                <p class="description customize-control-description"><?php echo __('Se generarán con un algoritmo de aleatoridad a partir de las categorías y etiquetas asociadas a la publicación.', 'openweb'); ?></p>
            </label>
        </li>
        <li>
            <label class="selectit">
                <input value="manual" name="openweb-related" id="openweb-related-manual" <?php echo $vars['meta']['openweb-related-type'][0] === 'manual' ? 'checked="checked"' : ''; ?> type="radio">
                <?php echo __('Seleccionar <strong>manualmente</strong> 3 publicaciones relacionadas.', 'openweb'); ?>
            </label>
        </li>
    </ul>
    <div class="<?php echo $vars['meta']['openweb-related-type'][0] === 'auto' || ! isset($vars['meta']['openweb-related-type']) ? 'hidden' : ''; ?>" id="openweb-related-manual-container">
        <div class="accordion-container openweb-accordion-container">
            <input type="hidden" value="<?php echo implode('|', $vars['terms-related-ids']); ?>" name="openweb-related-ids" id="openweb-related-ids">
            <ul class="outer-border">
                <li class="control-section accordion-section">
                    <h4 class="accordion-section-title" tabindex="0"><?php echo __('Entradas', 'openweb'); ?>
                        <span class="screen-reader-text"><?php echo __('Pulsa retorno o intro para abrir esta sección', 'openweb'); ?></span>
                    </h4>
                    <div class="accordion-section-content">
                        <div id="openweb-tabs-posts" class="categorydiv openweb-tabs">
                            <ul class="category-tabs">
                                <li class="tabs">
                                    <a href="#openweb-more-recent-posts" class="nav-tab-link"><?php echo __('Más reciente', 'openweb'); ?></a>
                                </li>
                                <li>
                                    <a href="#openweb-search-posts" class="nav-tab-link"><?php echo __('Buscar', 'openweb'); ?></a>
                                </li>
                            </ul>
                            <div id="openweb-more-recent-posts" class="tabs-panel">
                                <ul class="categorychecklist" id="openweb-list-recent-posts">
                                <?php if (is_array($vars['posts-recents'])): ?>
                                    <?php foreach ($vars['posts-recents'] as $post): ?>
                                        <li>
                                            <label class="menu-item-title">
                                                <input class="menu-item-checkbox openweb-related-checkbox" name="openweb-related-page[]" value="<?php echo $post->ID; ?>" type="checkbox" <?php echo in_array($post->ID, $vars['terms-related-ids']) ? 'checked="checked"' : ''; ?>>
                                                <span class="openweb-related-title"><?php echo $post->post_title; ?></span>
                                            </label>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </ul>
                            </div>
                            <div class="hidden" id="openweb-search-posts" class="tabs-panel">
                                <p>
                                    <input type="text" placeholder="<?php echo __('Buscar artículo', 'openweb'); ?>" id="openweb-search-post" class="openweb-search" data-type="quick-search-posttype-post">
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="control-section accordion-section">
                    <h4 class="accordion-section-title" tabindex="0"><?php echo __('Páginas', 'openweb'); ?>
                        <span class="screen-reader-text"><?php echo __('Pulsa retorno o intro para abrir esta sección', 'openweb'); ?></span>
                    </h4>
                    <div class="accordion-section-content">
                        <div class="inside">
                            <div id="openweb-tabs-pages" class="categorydiv openweb-tabs">
                                <ul class="category-tabs">
                                    <li class="tabs">
                                        <a href="#openweb-more-recent-pages" class="nav-tab-link"><?php echo __('Más reciente', 'openweb'); ?></a>
                                    </li>
                                    <li>
                                        <a href="#openweb-search-pages" class="nav-tab-link"><?php echo __('Buscar', 'openweb'); ?></a>
                                    </li>
                                </ul>
                                <div id="openweb-more-recent-pages" class="tabs-panel">
                                    <ul class="categorychecklist" id="openweb-list-recent-pages">
                                    <?php if (is_array($vars['pages-recents'])): ?>
                                        <?php foreach ($vars['pages-recents'] as $page): ?>
                                            <li>
                                                <label class="menu-item-title">
                                                    <input class="menu-item-checkbox openweb-related-checkbox" name="openweb-related-page[]" value="<?php echo $page->ID; ?>" type="checkbox" <?php echo in_array($page->ID, $vars['terms-related-ids']) ? 'checked="checked"' : ''; ?>>
                                                    <span class="openweb-related-title"><?php echo $page->post_title; ?></span>
                                                </label>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="hidden" id="openweb-search-pages" class="tabs-panel">
                                    <p>
                                        <input type="text" placeholder="<?php echo __('Buscar página', 'openweb'); ?>" id="openweb-search-page" class="openweb-search" data-type="quick-search-posttype-page">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div id="openweb-related-selection-container" class="<?php echo ! count($vars['terms-related']) ? 'hidden' : ''; ?>">
        <h4><?php echo __('Publicaciones seleccionadas', 'openweb'); ?></h4>
        <div id="openweb-related-selection" class="tagchecklist">
        <?php if (isset($vars['terms-related']) && count($vars['terms-related'])): ?>
            <?php foreach ($vars['terms-related'] as $related): ?>
                <span class="openweb-related-item" data-val="<?php echo $related->ID; ?>">
                    <button type="button" class="ntdelbutton openweb-related-remove-item"><span class="remove-tag-icon" aria-hidden="true"></span><span class="screen-reader-text"></span></button>
                    &nbsp;
                    <?php echo $related->post_title; ?>
                </span>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
    </div>
</fieldset>
