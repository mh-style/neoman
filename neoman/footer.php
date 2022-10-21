<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NeoMan
 */

?>
</div><!-- .container -->

</div>

      <footer id="colophon" class="site-footer">
         <div class="container">
            <?php
            dynamic_sidebar('footer-widgets');
            
            $copyright = get_theme_mod('neoman_footer_copyright');
            $credit = get_theme_mod('neoman_footer_credit');
               if ($copyright) :
            ?>
            <div id="footer-bottom" style="font-size: 14px;">
               <?php echo '<div id="copyright">' . wp_kses($copyright, array(
                  'a' => array(
                     'href' => array()
                  )
                  )).'</div>';
                  if( true != $credit ){
                     printf(
                        '<div id="credit"> %1$s <a href="%2$s" target="_blank"><strong>Monabbor Hossen</strong></a></div>',
                        esc_html__('Designed by', 'neoman'),
                        esc_url('https://mhstyle.net', 'neoman')
                     );
                  }           
                  ?>
            </div>
            <?php endif;?>
         </div>
      </footer>
   </div>
   <!--/ #page -->


   <?php wp_footer();?>
</body>

</html>