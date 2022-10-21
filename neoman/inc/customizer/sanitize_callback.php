<?php

if ( !function_exists( 'neoman_sanitize_checkbox' ) ):
    function neoman_sanitize_checkbox( $checked ) {
        return ( isset( $checked ) && true == $checked ) ? true : false;
    }
endif;

if ( !function_exists( 'neoman_sanitize_integer' ) ):
    function neoman_sanitize_integer( $input ) {
        return absint( $input );
    }
endif;

if( !function_exists('neoman_sanitize_choices')):
    function neoman_sanitize_choices( $input, $setting ){
        // Ensure input is a slug
        $input = sanitize_key($input);

        //Get list of the choices
        // Associated with the setting
        $choices = $setting->manager->get_control($setting->id)->choices;

        // If the input is a valid key, return it.
        // otherwise, return the default
        return(array_key_exists($input, $choices)) ? $input : $setting->default;
    }
endif;
if( !function_exists('neoman_sanitize_multi_choices')):
    function neoman_sanitize_multi_choices( $input, $setting ){
        
        //Get list of the choices
        // Associated with the setting
        $choices = $setting->manager->get_control($setting->id)->choices;

        $input_keys = $input;
        foreach($input_keys as $key => $value){
            if(! array_key_exists($value, $choices)){
                unset($input[$key]);
            }
        }
        // If the input is a valid key, return it.
        // otherwise, return the default
        return(is_array($input)) ? $input : $setting->default;
    }
endif;