'use strict';

(function($) {
    $(document).ready(function() {
        $('#customize-control-openweb_platform_cloudsearch_content_types input[type="checkbox"]').on('change', function() {
            var $parent = $(this).parents('.customize-control-multi-checkbox');
            var values = $parent.find('input[type="checkbox"]:checked').map(function() { return this.value; }).get().join(',');
            $parent.find('input[type="hidden"]').val(values);
        });
    });
})(jQuery);