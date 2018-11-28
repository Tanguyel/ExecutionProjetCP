<?php
/**
 * @package CoursePress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('ressource-card'); ?>itemscope itemtype="http://schema.org/Article">
	<a href="<?php the_permalink(); ?>" >
        <div class="featured-image">
            <?php
            if ( has_post_thumbnail() ) {
                the_post_thumbnail('home-thumbnail', array( 'itemprop' => 'image' ) );
            } ?>
        </div>
        <h2 class="">
            <?php echo get_post_meta(get_the_ID(), 'ressource_name', true); ?>
        </h2>
        </a>
    <footer class="entry-meta">
        <?php
        /*
            $categories_list = get_the_category_list();
            if ( $categories_list && coursepress_categorized_blog() ) :
                ?>
                <span class="cat-links">
                    <?php printf( __( 'Posted in %1$s', 'cp' ), $categories_list ); ?>
                </span>
                <?php
            endif; // End if categories

        // translators: Used between list items, there is a space after the comma.
        $tags_list = get_the_tag_list( '<span class="tag-link" itemprop="keywords">','</span><span class="tag-link" itemprop="keywords">','</span>' );
        if ( $tags_list ) :
            echo $tags_list;
        /*	?>
            <span class="tags-links">
                <?php printf( __( ' / ', 'cp' ), $tags_list ); ?>
            </span>
            <?php
        endif; // End if $tags_list */
        edit_post_link(
            __( 'Edit', 'cp' ),
            '<span class="edit-link">',
            '</span>'
        );
        ?>        
    </footer><!-- .entry-meta -->
    
</article><!-- #post-## -->