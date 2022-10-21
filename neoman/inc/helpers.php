<?php
if ( ! function_exists( 'neoman_parse_css' ) ):
    /**
     * Parse CSS from Array
     * @param Array $css_output array of css selector and properties.
     */
    function neoman_parse_css( $css_output ) {

        $parse_css = '';
        if ( is_array( $css_output ) && count( $css_output ) > 0 ) {
            foreach ( $css_output as $selector => $properties ) {
                if ( null == $properties ) {
                    break;
                }
                if ( !count( $properties ) ) {
                    continue;
                }
                $parse_css .= $selector . '{';
                foreach ( $properties as $proprety => $value ) {
                    if ( '' == $value && 0 !== $value ) {
                        continue;
                    }
                    $parse_css .= $proprety . ':' . $value . ';';
                }
                $parse_css .= '}';
            }
        }
        return $parse_css;
    }
endif;