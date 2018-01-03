<h3><?php echo __('Openweb campos Autor', 'openweb'); ?></h3>

<?php $image = get_the_author_meta('image-page-author', $vars['user']->ID); ?>

<table class="form-table">
    <tr>
        <th>
            <label for="image-page-author"><?php echo __('Imagen página Autor', 'openweb'); ?></label>
        </th>
        <td>
            <div>
                <img id="image-page-author-preview" src="<?php echo esc_attr($image); ?>">
            </div>
            <input type="hidden" name="image-page-author" id="image-page-author" value="<?php echo esc_attr($image); ?>" />
            <button type="button" class="button upload-image"><?php echo __('Selecionar imagen', 'openweb'); ?></button>
            <p class="description"><?php echo __('Por favor selecciona una imagen para la página del autor.', 'openweb'); ?></p>
        </td>
    </tr>
    <tr>
        <th>
            <label for="quote-page-author"><?php echo __('Cita', 'openweb'); ?></label>
        </th>
        <td>
            <textarea name="quote-page-author" id="quote-page-author" rows="5" cols="30"><?php echo get_the_author_meta('quote-page-author', $vars['user']->ID); ?></textarea>
            <p class="description"><?php echo __('Escribe una frase descriptiva del autor.', 'openweb'); ?></p>
        </td>
    </tr>
</table>