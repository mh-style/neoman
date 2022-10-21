
<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package NeoMan
 */

?>
<article id="post-<?php the_ID();?>" <?php post_class();?>>
   <div class="entry-header">
      <?php
         if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
            
         else:
            the_title('<h2 class="entry-title"><a href="'. esc_url(get_permalink(),'neoman') .'" rel="bookmark">','</a></h2>');
         endif;
         if('post' === get_post_type()):
      ?>
      <div class="entry-meta">
      <?php
         neoman_posted_on();
         neoman_posted_by();
         
      ?>
      </div>
      <?php endif;?>
   </div><!-- .entry-header 11:56 -->
   <?php 
      neoman_post_thumbnail();
   ?>

   <div class="entry-content">
      <?php 
         if (is_singular()) {
            the_content(
               sprintf(
                  '<span aria-label="%1$s %2$s">%3$s &raquo;</span>',
                  esc_html__('Continue reading', 'neoman'),
                  esc_html(get_the_title()),
                  esc_html__('Read More', 'neoman')
               )
            );
            wp_link_pages(
               array(
                  'before' => '<div class="page-links">'. esc_html__('Pages:','neoman'),
                  'after' => '</div>'
               )
            );
         }else{
            the_excerpt();
         }
      ?>
   </div><!-- .entry-content -->
   <div class="entry-footer">
      <?php
         neoman_entry_footer();
      ?>
   </div><!-- .entry-footer -->
</article>