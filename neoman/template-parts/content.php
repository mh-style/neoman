
<?php
/**
 * Template part for displaying posts
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package NeoMan
   */
$default_order = array( 'title', 'meta', 'featured_image', 'content', 'entry_footer' );
$item_orders = get_theme_mod( 'neoman_blog_post_elements', $default_order );
?>
<article id="post-<?php the_ID();?>"<?php post_class();?>>
<?php foreach ( $item_orders as $item_order ): ?>
<?php if ( 'title' === $item_order ): ?>
   <div class="entry-header">
      <?php
          if ( is_singular() ):
              the_title( '<h1 class="entry-title">', '</h1>' );

          else:
              the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink(), 'neoman' ) . '" rel="bookmark">', '</a></h2>' );
          endif;
      ?>

   </div><!-- .entry-header 11:56 -->
   <?php
       elseif ( 'meta' === $item_order && 'post' === get_post_type() ):
   ?>
      <div class="entry-meta">
      <?php
          neoman_posted_on();
          neoman_posted_by();

      ?>
      </div>
   <?php
       elseif ( 'featured_image' === $item_order ):
           neoman_post_thumbnail();

       elseif ( 'content' === $item_order ):
           if ( neoman_show_excerpt() ):
       ?>
	  <div class="entry-summary">
	   <?php the_excerpt();?>
	  </div>
	  <?php else: ?>
   <div class="entry-content">
      <?php
          // if (is_singular()) {
          the_content(
              sprintf(
                  '<span aria-label="%1$s %2$s">%3$s &raquo;</span>',
                  esc_html__( 'Continue reading', 'neoman' ),
                  esc_html( get_the_title() ),
                  esc_html__( 'Read More', 'neoman' )
              )
          );
          wp_link_pages(
              array(
                  'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'neoman' ),
                  'after'  => '</div>',
              )
          );
          // }else{
          //    the_excerpt();
          // }
      ?>
   </div><!-- .entry-content -->
   <?php
      endif;
      elseif ( 'entry_footer' === $item_order ):

   ?>
   <div class="entry-footer">
      <?php
          neoman_entry_footer();
      ?>
   </div><!-- .entry-footer -->
   <?php endif;
   endforeach;?>
</article>