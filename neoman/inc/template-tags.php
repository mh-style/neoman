<?php
    /**
     * Custom template tags for this theme
     *
     * Eventually, some of the functionality here could be replaced by core features.
     *
     * @package NeoMan
     */
    if ( !function_exists( 'neoman_posted_on' ) ):
        /**
         * Prints HTML with meta information for the current post-date/time.
         */
        function neoman_posted_on() {
            $tiem_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
            if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
                $tiem_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
            }
            $tiem_string = sprintf(
                $tiem_string,
                esc_attr( get_the_date( DATE_W3C ), 'neoman' ),
                esc_html( get_the_date(), 'neoman' ),
                esc_attr( get_the_modified_date( DATE_W3C ), 'neoman' ),
                esc_html( get_the_modified_date(), 'neoman' )
            );
            printf(
                /* translators: %s: post date. */
                '<span class="posted-on">%1$s <a href="%2$s" rel="bookmark">%3$s</a></span>',
                esc_html_x( 'Posted On', 'Post Date', 'neoman' ),
                esc_url( get_permalink(), 'neoman' ),
                $tiem_string
            );
        }
    endif;
    if ( !function_exists( 'neoman_posted_by' ) ):
        /**
         * Prints HTML with meta information for the current author.
         */
        function neoman_posted_by() {
            printf( '<span class="byline">%1$s <span class="author vcard"><a class="url fn n" href="%2$s">%3$s</a></span></span>',
                esc_html_x( 'By', 'Post Author', 'neoman' ),
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ), 'neoman' ),
                esc_html( get_the_author(), 'neoman' )
            );
        }
    endif;
    if ( !function_exists( 'neoman_post_thumbnail' ) ):
        /**
         * Displays an optional post thumbnail.
         *
         * Wraps the post thumbnail in an anchor element on index views.
         */
        function neoman_post_thumbnail() {
        if ( has_post_thumbnail() ): ?>
	            <div class="post-thumbnail">
	            <a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>
	            </div><!-- .post-thumbnail -->
	    <?php endif;
        }
    endif;
    if ( !function_exists( 'neoman_entry_footer' ) ):
        /**
         * Prints HTML with meta information for the categories, tags, comments and Edit.
         */
        function neoman_entry_footer() {
            // Hide category and tag text for pages.
            if ( 'post' === get_post_type() ) {
                /* translators: used between list items, there is a space after the comma */
                $category_list = get_the_category_list( ', ' );
                if ( $category_list ) {
                    /* translators: list of categories. */
                    printf(
                        '<span class="cat-links">%1$s %2$s</span>',
                        esc_html__( 'Posted in', 'neoman' ),
                        $category_list
                    );
                }
                /* translators: used between list items, there is a space after the comma */
                $tag_list = get_the_tag_list( '', ', ' );
                if ( $tag_list ) {
                    /* translators: 1: list of tags. */
                    printf(
                        '<span class="tags-links">%1$s %2$s</span>',
                        esc_html__( 'Tags', 'neoman' ),
                        $tag_list
                    );
                }
            }
            if ( !is_single() && !post_password_required() && ( comments_open() || get_comments_number() ) ) {
                echo '<span class="comments-link">';
                comments_popup_link(
                    sprintf(
                        wp_kses(
                            /* translators: post title */
                            __( 'Leave a Comment', 'neoman' ) . '<span class="screen-reader-text"> %1$s %2$s</span>',
                            array(
                                'span' => array(
                                    'class' => array(),
                                ),
                            )
                        ),
                        esc_html__( 'on', 'neoman' ),
                        wp_kses_post( get_the_title(), 'neoman' )
                    )
                );
                echo '</span>';
            }

            edit_post_link(
                sprintf(
                    wp_kses(
                        /* translators: : Name of current post. Only visible to screen readers */
                        __( 'Edit', 'neoman' ) . '<span class="screen-reader-text">%1$s</span>',
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    wp_kses_post( get_the_title(), 'neoman' )
                ),
                '<span class="edit-link">',
                '</span>'
            );
    }
endif;