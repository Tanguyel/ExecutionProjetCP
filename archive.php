<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package CoursePress
 */

get_header();

?>
<div id="primary" class="content-area content-side-area">
	<main id="main" class="site-main" role="main">
        <section class="main-section archive-article">
	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title">
				<?php
				if ( is_category() ) :
					single_cat_title();

				elseif ( is_tag() ) :
					single_tag_title();

				elseif ( is_author() ) :
					/* Queue the first post, that way we know
					 * what author we're dealing with ( if that is the case ).
					*/
					the_post();
					printf( __( 'Author: %s', 'coursepress' ), '<span class="vcard">' . get_the_author() . '</span>' );
					/* Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();

				elseif ( is_day() ) :
					printf( __( 'Day: %s', 'coursepress' ), '<span>' . get_the_date() . '</span>' );

				elseif ( is_month() ) :
					printf( __( 'Month: %s', 'coursepress' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'coursepress' ) ) . '</span>' );

				elseif ( is_year() ) :
					printf( __( 'Year: %s', 'coursepress' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'coursepress' ) ) . '</span>' );

				elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
					_e( 'Asides', 'coursepress' );

				elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
					_e( 'Images', 'coursepress' );

				elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
					_e( 'Videos', 'coursepress' );

				elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
					_e( 'Quotes', 'coursepress' );

				elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
					_e( 'Links', 'coursepress' );

				else :
					_e( 'Archives', 'coursepress' );

				endif;
				?>
			</h1>
			<?php
            if ( function_exists('ep_breadcrumb') ) {
                echo '<div class="breadcrumb">';
                ep_breadcrumb();
                echo '</div>';
            }
			// Show an optional term description.
			$term_description = term_description();
			if ( ! empty( $term_description ) ) :
				printf( '<div class="taxonomy-description">%s</div>', $term_description );
			endif;
			?>
		</header><!-- .page-header -->
        <?php
            if ( is_category() ) {
               ?>
                <nav class="category-navigation" role="navigation">
                    <?php
                    $args = array(
                            'orderby' => 'name',
                            'exclude' => '1',
                            'include' => '',
                            'parent' => 0
                            );
                    $categories = get_categories( $args );

                    foreach ( $categories as $category ) {
                        $curentcat= (is_category($category->term_id))?'curent-cat':'';
                    ?>
                        <span class="tag-link <?php echo $curentcat;?>">
                            <a href=<?php echo get_category_link( $category->term_id );?>> 
                                <?php echo $category->name; ?>
                            </a>
                        </span>
                    <?php
                    }
                    ?>  
                </nav>
            <?php     
            }
            ?>
        
            
		<?php
        $listData["@context"] = "http://schema.org/";
        $listData["@type"] = "ItemList";
        $position = 1;
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/* Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php ( where ___ is the Post Format name ) and that will be used instead.
			 */
			get_template_part( 'content', get_post_format() );
            
            $listData["itemListElement"][$position-1]["@type"] = "ListItem";
            $listData["itemListElement"][$position-1]["position"] = $position;
            $listData["itemListElement"][$position-1]["url"] = get_the_permalink();
            $position = $position + 1; 

		endwhile;

		cp_numeric_posts_nav( 'navigation-pagination' );

	else :

		get_template_part( 'content', 'none' );

	endif;
	?>
        </section>
	</main><!-- #main -->
</div><!-- #primary -->
<script type="application/ld+json">
    <?php echo json_encode($listData); ?>
</script>
<?php

get_sidebar('archive-sidebar');
get_footer();
