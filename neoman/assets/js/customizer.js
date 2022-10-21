/**
 * Theme Customizer enhancements for a better user experience.
 * 
 * Contains handlers to make Theme Customize preview reload changes asynchronously.
 */

(function ($) {

    // Footer Copyright Text
    wp.customize('neoman_footer_copyright', function (value) {
        value.bind(function (newValue) {
            $('#copyright').html(newValue)
        })
    });
    // Container Width
    wp.customize('neoman_container_width', function (value) {
        value.bind(function (newValue) {
            $('.container, :not(.container) .wp-block-group__inner-container').css('max-width', newValue + 'px')
        })
    });
    // Left Sidebar Width
    wp.customize('neoman_left_sidebar_width', function (value) {
        value.bind(function (newValue) {
            $('.left-sidebar').css('flex-basis', newValue + '%')
        })
    });
    // Right Sidebar Width
    wp.customize('neoman_right_sidebar_width', function (value) {
        value.bind(function (newValue) {
            $('.right-sidebar').css('flex-basis', newValue + '%')
        })
    });
})(jQuery);