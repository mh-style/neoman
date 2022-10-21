wp.customize.controlConstructor['neoman-sortable'] = wp.customize.Control.extend({
    ready: function () {
        'use strict';

        var control = this;
        control.sortableContainer = control.container.find('ul.sortable').first();
        control.sortableContainer.sortable({
            //Update value when stop sorting
            stop: function () {
                control.updateValue();
            }
        }).disableSelection().find('li').each(function () {
            jQuery(this).on('click', function () {
                var $i = jQuery(this).find('i.visibility');
                $i.closest('li').toggleClass('invisible');
            })
        }).click(function () {
            control.updateValue()
        })

    },
    updateValue: function () {
        'use strict';
        var control = this,
            newValue = [];
        this.sortableContainer.find('li').each(function () {
            if (!jQuery(this).is('.invisible')) {
                newValue.push(jQuery(this).data('value'));

            }

        });
        control.setting.set(newValue);
    }
});