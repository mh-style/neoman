<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NeoMan
 */
if(! is_active_sidebar( 'sidebar-1' )){
   return;
}
?>

<aside id="right-sidebar" class="widget-area sidebar right-sidebar">
   <?php dynamic_sidebar('sidebar-1');?>

</aside>