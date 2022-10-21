<?php
if (class_exists('WP_Customize_Control') && !class_exists('Neoman_Sortable_Control')) {
    # code...
    class Neoman_Sortable_Control extends WP_Customize_Control
    {
        public $type = 'neoman-sortable';

        public function enqueue()
        {
            wp_enqueue_script(
                'neoman-sortable',
                get_template_directory_uri() . '/inc/customizer/controls/js/sortable.js',
                array('jquery', 'customize-base', 'jquery-ui-core', 'jquery-ui-sortable'),
                false,
                true
            );
            wp_enqueue_style(
                'neoman-sortable',
                get_template_directory_uri() . '/inc/customizer/controls/css/sortable.css',

            );
        }
        /**
         * Refresh the parameters passed to the JavaScript via JSON.
         */
        public function to_json()
        {
            parent::to_json();
            $this->json['choices'] = $this->choices;
            $this->json['value'] = maybe_unserialize($this->value());
        }

        protected function content_template(){
?>
            <label class="neoman-shortable">
                <# if(data.label) { #>
                    <span for="" class="customize-control-title">{{{data.label}}}</span>
                    <# } #>
                        <# if(data.description) { #>
                            <span class="description customize-control-description">{{{data.description}}}</span>
                            <# } #>
                                <ul class="sortable">
                                    <# _.each( data.value, function(choiceKey){ #>
                                        <# if(data.choices[choiceKey]) { #>
                                            <li class="sortable-item" data-value="{{{ choiceKey }}}">
                                                {{{ data.choices[choiceKey] }}}
                                                <i class="dashicons dashicons-visibility visibility"></i>
                                            </li>
                                            <# } #>
                                                <# }); #>
                                                    <# _.each( data.choices, function(choiceLabel, choiceKey){ #>
                                                        <# if( Array.isArray(data.value) && -1===data.value.indexOf(choiceKey) ) {#>
                                <li class="sortable-item invisible" data-value="{{{ choiceKey }}}">
                                    {{{ choiceLabel }}}
                                    <i class="dashicons dashicons-visibility visibility"></i>
                                </li>
                            <# } #>
                        <# }); #>
                    </ul>
            </label>
<?php }
    }
}
