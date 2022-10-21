(function ($) {

    /**
     * Run function when customizer is ready.
     */
    var api = wp.customize;
    api.bind('ready', function () {
        api.control('neoman_content_display', function (control) {
            /**
             * Run function on setting change of control.
             */
            control.setting.bind(function(value){
                if('excerpt' === value){
                    api.control('neoman_excerpt_length').toggle(true);
                }else{
                    api.control('neoman_excerpt_length').toggle(false);
                }
            })
        })

    });

})(jQuery)