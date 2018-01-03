<label>
    <span class="customize-control-title"><?php echo esc_html($vars['label']); ?></span>
    <select <?php $vars['link']; ?> multiple="multiple" style="height: 100%;">
        <?php
        foreach ( $this->choices as $value => $label ) {
            $selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : '';
            echo '<option value="' . esc_attr( $value ) . '"' . $selected . '>' . $label . '</option>';
        }
        ?>
    </select>
</label>