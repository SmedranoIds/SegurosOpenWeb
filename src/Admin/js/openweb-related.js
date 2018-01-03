'use strict';

(function($) {
    var addRelated = function(title, val) {
        if ($('#openweb-related-selection span.openweb-related-item').length < 3) {
            var button = '<button type="button" class="ntdelbutton openweb-related-remove-item"><span class="remove-tag-icon" aria-hidden="true"></span><span class="screen-reader-text"></span></button>';
            $('#openweb-related-selection').append('<span class="openweb-related-item" data-val="' + val + '">' + button + '&nbsp;' + title + '</span>');
            var vals = $('#openweb-related-ids').val().split('|').filter(function (i) {
                return undefined || '' !== i;
            });
            vals.push(val);
            $('#openweb-related-ids').val(vals.join('|'));

            if ($('#openweb-related-selection-container').is(':hidden')) {
                $('#openweb-related-selection-container').show('slow');
            }

            return true;
        }

        return false;
    };

    var addRelatedCheckbox = function() {
        if ($(this).prop('checked')) {
            return addRelated($(this).next('.openweb-related-title').html(), $(this).val());
        }
    };

    $(document).on('click', '#openweb-related-manual', function() {
        $('#openweb-related-manual-container').show('slow');
    });

    $(document).on('click', '#openweb-related-auto', function () {
        if ($(this).not(':checked')) {
            $('#openweb-related-manual-container').hide('slow');
            $('#openweb-related-selection').html('');
            $('#openweb-related-ids').val('');
            $('.openweb-related-checkbox').prop('checked', false);
            $('#openweb-related-selection-container').hide();
        }
    });

    $(document).on('click', '.openweb-related-remove-item', function() {
        var parent = $(this).closest('span.openweb-related-item');
        var val = parent.attr('data-val');
        var vals = $('#openweb-related-ids').val().split('|').filter(function (i) { return val != i; });
        $('#openweb-related-ids').val(vals.join('|'));
        $('.openweb-related-checkbox').each(function () {
            if ($(this).val() == val) {
                $(this).prop('checked', false);
            }
        });
        parent.remove();

        if ($('#openweb-related-selection span.openweb-related-item').length == 0) {
            $('#openweb-related-selection-container').hide();
        }
    });

    $(document).on('click', '.openweb-related-checkbox', addRelatedCheckbox);

    $(document).ready(function() {
        $('.openweb-search').on('autocompleteselect', function (ev, ui) {
            addRelated(ui.item.post_title, ui.item.ID);
        });

        $('.openweb-tabs').tabs({
            activate: function(event, ui) {
                ui.oldTab.removeClass('tabs');
                ui.newTab.addClass('tabs');
            }
        });
    });
})(jQuery);
