<?php

namespace OpenWeb\Admin\Customize\Control;

class MultipleCheckbox extends \WP_Customize_Control
{
    const DEFAULT_VALUES = ['post', 'page'];

    public $type = 'multi-checkbox';

    public function enqueue()
    {
        wp_enqueue_script('openweb-customize-multi-checkbox', trailingslashit(get_template_directory_uri()).'/src/Admin/js/customize-multi-checkbox.js', array('jquery'), null, true);
    }

    /**
     * Displays the multiple select on the customize screen.
     */
    public function render_content()
    {
        if (empty($this->choices)) {
            return;
        }

        $multi = empty($this->value())
            ? static::DEFAULT_VALUES
            : (! is_array($this->value()) ? explode(',', $this->value()) : $this->value());
?>
        <?php if (! empty( $this->label)): ?>
        <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
        <?php endif; ?>

        <?php if (! empty( $this->description)): ?>
        <span class="description customize-control-description"><?php echo $this->description; ?></span>
        <?php endif; ?>

        <ul>
            <?php foreach ($this->choices as $val => $name): ?>
            <li>
                <label>
                    <input type="checkbox" value="<?php echo esc_attr($val); ?>" <?php checked(in_array($val, $multi)); ?> />
                    <?php echo esc_html($name); ?>
                </label>
            </li>
            <?php endforeach; ?>
        </ul>

        <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr(implode(',', $multi)); ?>" />
<?php
    }
}