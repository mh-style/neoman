<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NeoMan
 */
if(! is_active_sidebar( 'sidebar-2' )){
   return;
}
?>

<aside id="left-sidebar" class="widget-area sidebar left-sidebar">
   <?php dynamic_sidebar('sidebar-2');?>

</aside>