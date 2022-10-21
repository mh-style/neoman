<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package NeoMan
 */
 get_header();?>
<div id="primary" class="content-area">
   <main id="main" class="site-main">
      <section class="error-404 not-found">
         <div class="page-header">
            <h1 class="page-title">
               <?php esc_html_e('Oops! That page can&rsuo;t be found.', 'neoman')?>
            </h1>
         </div>

         <div class="page-content">
            <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'neoman');?></p>

            <?php get_search_form();?>
         </div><!-- .entry-content -->
      </section>
   </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();?>