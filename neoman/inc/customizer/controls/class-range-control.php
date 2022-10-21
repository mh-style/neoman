<?php
if (class_exists('WP_Customize_Control') && !class_exists('Neoman_Range_Slider_Control')) {
    # code...
    class Neoman_Range_Slider_Control extends WP_Customize_Control
    {
        public $type = 'neoman-range-slider';
        public $reset_title = 'Reset';
        public $min = 600;
        public $max = 2000;
        public $step = 5;
        public $unit = 'px';

        public function enqueue()
        {
            wp_enqueue_script(
                'neoman-range-slider',
                get_template_directory_uri() . '/inc/customizer/controls/js/range-slider.js',
                array('jquery', 'customize-base', 'jquery-ui-slider'),
                false,
                true
            );
            wp_enqueue_style(
                'neoman-range-slider',
                get_template_directory_uri() . '/inc/customizer/controls/css/range-slider.css',

            );
        }

        protected function render_content()
        {
            $input_id   = '_customize-input-' . $this->id;
?>
            <div class="neoman-range-slider-control">
                <div class="range-title-area">
                    <div class="range-title-info">
                        <?php if (!empty($this->label)) : ?>
                            <label for="<?php echo esc_attr($input_id); ?>" class="customize-control-title"><?php echo esc_html($this->label); ?></label>
                        <?php endif; ?>
                        <?php if (!empty($this->description)) : ?>
                            <span class="description customize-control-description"><?php echo $this->description; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="range-value-controls">
                        <span data-reset_value="<?php echo esc_attr($this->setting->default); ?>" title="<?php echo esc_attr($this->reset_title); ?>" class="dashicons dashicons-image-rotate neoman-reset"></span>
                    </div>
                </div>
                <div class="range-slider-area">
                    <div class="range-slider-wrapper<?php if (!empty($this->unit)) { echo ' has-unit';}?>">
                        <div class="neoman-range-slider" data-min="<?php echo esc_attr($this->min); ?>" data-max="<?php echo esc_attr($this->max); ?>" data-step="<?php echo esc_attr($this->step); ?>"></div>
                        <div class="neoman-range-value">
                            <input <?php $this->link(); ?> type="number" value="<?php echo esc_attr($this->setting->default); ?>" min="<?php echo esc_attr($this->min); ?>" max="<?php echo esc_attr($this->max); ?>" step="<?php echo esc_attr($this->step); ?>">

                            <?php if (!empty($this->unit)) : ?>
                                <span class="unit"><?php echo esc_html($this->unit); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
<?php }
    }
}
