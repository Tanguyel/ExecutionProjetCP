<?php
/**
 * @package CoursePress
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('course-card'); ?> itemscope itemtype="http://schema.org/Course">
    <a href="<?php the_permalink(); ?>" >
        <?php
        $course_media = do_shortcode( '[course_media wrapper="figure" list_page="yes" width="" height=""]' );

        if ( $course_media ) {
            $extended_class = '';
        } else {
            $extended_class = 'quick-course-info-extended';
        }
        ?>

        <?php
        // Course thumbnail
        echo $course_media;
        ?>
        <div class="entry-meta">
        <?php
        $course_id = get_the_ID();
        $taxonomy = CoursePress_Data_Course::get_post_category_name();
		$terms = wp_get_object_terms( (int) $course_id, array( $taxonomy ) );

		if ( ! empty( $terms ) ) {
            $links = array();

			foreach ( $terms as $term ) {
				$link = get_term_link( $term->term_id, $taxonomy );
				$links[] = sprintf( '<span class="category-link" href="%s">%s</span>', esc_url( $link ), $term->name );
			}
            $links = implode( ' ', $links );

			echo $links;
            /*$link = get_term_link( $terms[0]->term_id, $taxonomy );
            $category = sprintf( '<span class="category-link" itemprop="articleSection" href="%s">%s</span>', esc_url( $link ), $terms[0]->name );
            echo $category;*/
		}
        ?>
        </div>
        <section class="article-content-right <?php echo $extended_class; ?> course-archive">
            <header class="entry-header">
                <h2 class="entry-title" itemprop="name">
                    <?php the_title(); ?>
                </h2>
            </header><!-- .entry-header -->

            <?php if ( is_search() ) : // Only display Excerpts for Search   ?>
                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                </div><!-- .entry-summary -->
            <?php else : ?>
                <div class="entry-content <?php echo $extended_class; ?>" itemprop="description">
                    <?php
                    // Course summary/excerpt
                    echo do_shortcode( '[course_summary length="200" class="' . $extended_class . '"]' );
                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links">' . __( 'Pages:', 'coursepress' ),
                            'after' => '</div>',
                        )
                    );
                    ?>
                </div><!-- .entry-content -->

            <?php endif; ?>
            <div itemprop="provider" itemscope itemtype="http://schema.org/Organization">
                <meta itemprop="name" content="ExecutionProjet.fr">
                <meta itemprop="logo" content="https://www.executionprojet.fr/wp-content/uploads/2018/06/Gravatar-ExecutionProjet.png">
            </div>
        </section>
    </a>
</article><!-- #post-## -->

