<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package NeoMan
 */
get_header();?>
<div id="primary" class="content-area">
   <main id="main" class="site-main">
      <?php
      if(have_posts()): ?>
         <div class="page-header">
            <h1 class="page-title">
               <?php 
                  printf(
                     /* translators: %s: search query. */
                     esc_html__( 'Search Results for: %1$s' ),
                     '<span>' . get_search_query() . '</span>'
                  );
                  
               ?>
            </h1>

         </div>
      <?php
			/* Start the Loop */
         while ( have_posts() ): the_post();
         
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
            get_template_part('template-parts/content', 'search');
         endwhile;
         the_posts_pagination();
      else: 
         get_template_part('template-parts/content', 'none');
      endif;
      ?>
   </main><!-- #main -->
</div><!-- #primary -->

           <?php neoman_get_sidebars();?>
            <!-- #secondary -->
<?php get_footer();?>