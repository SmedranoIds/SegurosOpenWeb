'use strict';

(function($) {
    $(document).ready(function() {
        if ($('.openweb-search').length > 0) {
            $('.openweb-search').autocomplete({
                minLength: 4,
                source: function (req, res) {
                    var params = {
                        'action': 'menu-quick-search',
                        'response-format': 'json',
                        'q': req.term,
                        'type': $(this.element).attr('data-type')
                    };
                    $.post(ajaxurl, params, function (d) {
                        var json = ('[' + d.replace(/\n/g, ',') + ']').replace(/,\]/g, ']');
                        res(JSON.parse(json));
                    });
                }
            }).each(function () {
                $(this).autocomplete('instance')._renderItem = function (ul, item) {
                    return $('<li>')
                        .append('<span class="openweb-search-item">' + item.post_title + '</span>')
                        .appendTo(ul);
                };
            });
        }
    });
})(jQuery);
