jQuery(document).ready(function ($) {

   // Show/Hide Menu on Mobile
   $("#menu-toggle").on('click', function () {

      $(this).toggleClass("toggled");

      if( $(this).hasClass('toggled') ) {
         $(".main-navigation").slideDown(function() {
            $(this).addClass('showing');
            $(this).removeAttr("style");
         });
      } else {
         $(".main-navigation").slideUp(function() {
            $(this).removeClass('showing');
            $(this).removeAttr("style");
         });
      }

   });

   // Show/Hide Sub Menu on Mobile
   $(".main-navigation .dropdown-menu-toggle").on('click', function (e) {
      e.preventDefault();

      // Hide all opened sub-menu and remove styles
      $(this).parents("li").siblings().children('.sub-menu').slideUp(function() {
         $(this).removeClass('showing');
         $(this).removeAttr("style");
      });
      
      // Toggle Sub menu and add/remove class and remove styles
      $(this).parent().next().slideToggle(function() {
         if( $(this).hasClass('showing') ) {
            $(this).removeClass('showing');
         } else {
            $(this).addClass('showing');
         }
         
         $(this).removeAttr("style");
      });      
   });
});