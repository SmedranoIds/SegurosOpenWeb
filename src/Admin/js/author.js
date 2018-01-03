(function($) {
    $(document).on('click', '.upload-image', function() {
        tb_show('Image Author Page', 'media-upload.php?type=image&TB_iframe=1');

        window.send_to_editor = function(html) {
            var src = $(html).attr( 'src' );
            $('#image-page-author').val(src);
            $('#image-page-author-preview').attr('src', src);
            tb_remove();
        };

        return false;
    });
})(jQuery);