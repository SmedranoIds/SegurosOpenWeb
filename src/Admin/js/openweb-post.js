'use strict';

(function($) {
    var mandatory = ['categorydiv', 'postexcerpt', 'postimagediv', 'openweb-related-post'];

    var errClass = 'openweb-error';

    var showMandatoryFields = function() {
        mandatory.forEach(function(item) {
            $('#'+item+' h2 span').append('<span class="openweb-mandatory"></span>');
        });
    };

    var checkCategory = function() {
        return $('#category-all input[type="checkbox"]:checked').length > 0;
    };

    var checkTitle = function() {
        return $('#title').val().trim() !== '';
    };

    var checkExcerpt = function() {
        return $('#excerpt').val().trim() !== '';
    };

    var checkRelated = function() {
        return $('#openweb-related-post input[type="radio"]:checked').length === 1;
    };

    var checkImage = function() {
        return $('#_thumbnail_id').val() !== '-1';
    };

    var checkContent = function() {
        if (null === tinyMCE.activeEditor) {
            return $('#content').val().trim() !== '';
        } else {
            return tinyMCE.get('content').getContent().trim() !== '';
        }
    };

    var writeMessages = function(msgs) {
        var ul = ['<ul>'];
        msgs.forEach(function(msg) {
            ul.push('<li>'+msg+'</li>');
        });
        ul.push('</ul>');

        $('#post').before('<div id="error_message" class="error">'+ul.join('')+'</div>');
    };

    var validateContent = function() {
        var err = [];
        if ($('#error_message').length > 0) {
            $('#error_message').remove();
        }
        $('.'+errClass).removeClass();

        if (false === checkTitle()) {
            err.push('Escribe el <strong>título</strong>');
            $('#title').addClass(errClass);
        } else {
            $('#title').removeClass(errClass);
        }

        if (('page' === typenow && $('#page_template').val() !== 'results.php') || 'post' === typenow) {
            if (false === checkContent()) {
                err.push('Añade el <strong>contenido</strong>');
                $('#wp-content-editor-container').addClass(errClass);
            } else {
                $('#wp-content-editor-container').removeClass(errClass);
            }
        }

        if (('page' === typenow && $('#page_template').val() === 'default') || 'post' === typenow) {
            if (false === checkImage()) {
                err.push('Añade la <strong>imagen destacada</strong>');
                $('#postimagediv h2').addClass(errClass);
            } else {
                $('#postimagediv h2').removeClass(errClass);
            }

            if (false === checkRelated()) {
                err.push('Marca al menos una opción de <strong>relacionados</strong>');
                $('#openweb-related-post h2').addClass(errClass);
            }
        }

        if ('post' === typenow && false === checkCategory()) {
            err.push('Selecciona al menos una <strong>categoría</strong>');
            $('#categorydiv h2').addClass(errClass);
        } else {
            $('#categorydiv h2').removeClass(errClass);
        }

        if ('post' === typenow && false === checkExcerpt()) {
            err.push('Escribe la <strong>entradilla</strong> del artículo');
            $('#excerpt').addClass(errClass);
        } else {
            $('#excerpt').removeClass(errClass);
        }


        if (err.length) {
            writeMessages(err);
            return false;
        }

        return true;
    };

    $(document).ready(function() {
        showMandatoryFields();

        $('#post').submit(function () {
            return validateContent();
        });
    });

})(jQuery);