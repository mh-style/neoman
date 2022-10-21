wp.customize.controlConstructor['neoman-range-slider'] = wp.customize.Control.extend({
    ready: function () {
        'use strict'

        var controlClass = '.customize-control-neoman-range-slider';
        // Set up the range sliders
        jQuery('.neoman-range-slider').each(function () {
            var _this = jQuery(this),
                _input = _this.next().find('input[type="number"]');
            _this.slider({
                range: "min",
                value: _input.val(),
                min: _this.data('min'),
                max: _this.data('max'),
                step: _this.data('step'),
                slide: function (event, ui) {
                    _input.val(ui.value).change();
                }
            });
        });
        // Update the range value based on input value
        jQuery(controlClass + ' .neoman-range-value input[type="number"]').on('input', function () {
            var value = jQuery(this).val();

            if ('' == value) {
                value = -1;
            }
            jQuery(this).closest('.neoman-range-value').prev().slider('value', parseInt(value)).change();
        });
        // Update the range value based on input value
        jQuery(controlClass + ' .neoman-reset').on('click', function () {
            var icon = jQuery(this),
                resetValue = icon.data('reset_value'),
                sliderArea = icon.closest('.range-title-area').next(),
                input = sliderArea.find('input[type="number"]');
            if ('' == resetValue) {
                resetValue = -1
            }
            input.val(parseInt(resetValue)).change();
            sliderArea.find('.neoman-range-slider').slider('value', parseInt(resetValue)).change();
        });
    }
});