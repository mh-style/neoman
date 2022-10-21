<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NeoMan
 */

?>
<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
   <meta charset="<?php bloginfo( 'charset' )?>">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="profile" href="https://gmpg.org/xfn/11">

   <?php wp_head();?>
</head>

<body <?php body_class();?>>
   <?php wp_body_open();?>

   <div id="page" class="site">
      <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'neoman');?></a>

      <header id="masthead" class="site-header">
         <div class="container">
            <div class="site-branding">
               <!-- <a href="#" class="custom-logo-link"><img src="" alt="Logo"></a> -->
               <?php
                   if ( has_custom_logo() ) {
                       # code...
                       the_custom_logo();
                   } else {
                       if ( is_front_page() || is_home() ) {
                           # code...
                           echo '<h1 class="site-title">' . esc_html(get_bloginfo( 'name' ),'neoman') . '</h1>';
                       } else {
                           echo '<h1 class="site-title"><a href="' . esc_url(home_url( '/' ),'neoman') . '">' . esc_html(get_bloginfo( 'name' ), 'neoman') . '</a></h1>';

                       }
                   }
                   // *** Display site title and tagline
                   // if(display_header_text()){
                   //    echo '<h1>' . get_bloginfo('name') . '</h1>';
                   //    echo '<p>' . get_bloginfo('description') . '</p>';
                   // }
               ?>
            </div>

            <button id="menu-toggle"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"/></svg></button>

         <?php
             wp_nav_menu(
               array(
                  'theme_location'  => 'header-menu',
                  'container'       => 'nav',
                  'container_id'    => 'site-navigation',
                  'container_class' => 'main-navigation',
                  'menu_class'      => 'menu',
                  // 'link_after' => '<span class="dropdown-menu-toggle"></span>',
               )
             );
         ?>

            <!-- #site-navigation -->
         </div>
      </header><!-- #masthead -->


      <div id="content" class="site-content">
      <div class="container">

