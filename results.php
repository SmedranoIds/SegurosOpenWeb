<?php
/**
 * Template Name: Openweb - Search Results
 * Template Post Type: page
 * Template Description: Plantilla para los resultados de la búsqueda en AWS CloudSearch
 *
 * @package OpenwebMod
 * @subpackage Coronita
 * @since OpenWeb Coronita 1.0
 */

get_header();
?>

<div class="bg-white">
    <div class="hidden" id="openweb-item">
        <div class="cq-searchpromote-result-item">
            <div class="description">
                <a href="#" class="openweb-url-item">
                    <strong class="openweb-title-item"></strong>
                </a>
                <p class="openweb-excerpt-item"></p>
            </div>
            <div style="clear:both"></div>
        </div>
    </div>

    <div class="results section">
        <div class="cq-searchpromote-results container">
            <div id="openweb-header-results">
                <h1><?php echo __('Resultados de la búsqueda', 'openweb'); ?></h1>
                <p class="hidden" id="openweb-count"><?php echo __('Mostrando resultados', 'openweb'); ?> <em id="openweb-results-range"></em> <?php echo __('de', 'openweb'); ?> <em id="openweb-results-count"></em> <?php echo __('para', 'openweb'); ?> <strong id="term"></strong></p>
                <p class="hidden" id="openweb-non-results"><?php echo __('No se han encontrado resultados para ', 'openweb'); ?></p>
            </div>

            <div id="openweb-results"></div>
        </div>
    </div>

    <div class="pagination section">
        <div class="cq-searchpromote-pagination container" id="openweb-pagination"></div>
    </div>
</div>

<?php get_footer();
