<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NeoMan
 */

?>

<article id="post-<?php the_ID();?>" <?php post_class();?>>
   <div class="entry-header">
      <?php the_title('<h1 class="entry-title">', '</h1>');?>
      
      <?php if('post' === get_post_type()):?>
      <div class="entry-meta">
      <?php
      
         neoman_posted_on();
         neoman_posted_by();
         
      ?>
      </div>
      <?php endif;?>
   </div><!-- .entry-header -->
   <?php 
      neoman_post_thumbnail();
   ?>
   <div class="entry-summary">
      <?php the_excerpt(); ?>
   </div><!-- .entry-content -->
   <div class="entry-footer">
      <?php
         neoman_entry_footer();
      ?>
   </div><!-- .entry-footer -->
</article>