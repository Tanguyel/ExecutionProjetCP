<?php
/**
 * The Template for displaying single unit posts with modules
 *
 * @package CoursePress
 */
global $wp, $wp_query;

$course_id = do_shortcode( '[get_parent_course_id]' );

add_thickbox();

$paged = ! empty( $wp->query_vars['paged'] ) ? absint( $wp->query_vars['paged'] ) : 1;

// Redirect to the parent course page if not enrolled or not preview unit/page.
while ( have_posts() ) :
	the_post();
	CoursePress_Data_Course::previewability( $course_id );
endwhile;

get_header();

?>

<div id="primary" class="content-area content-side-area coursepress-single-unit">
    <h2 class="course-name">
        <?php
        echo do_shortcode( '[course_title course_id="' . $course_id . '" title_tag="span" ]' );
        ?>
    </h2>
	<?php get_sidebar( 'course-menu' ); ?>
    <main id="main" class="site-main course-display" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
                    <h1 class="main-course-title h1-underline-cyan">
                        <?php
                        echo do_shortcode( '[course_title course_id="' . get_the_ID() . '" title_tag="span" class="unit-title"]' );
                        /*?>
                        <span class="course-title"> - </span>
                        <?php
                        echo do_shortcode( '[course_title course_id="' . $course_id . '" title_tag="span" ]' );
                        ?>
                        <?php*/
                        $is_focus = CoursePress_Data_Course::get_setting( $course_id, 'course_view', 'normal' );
                        ?>
                    </h1>
				</header><!-- .entry-header -->
				<div class="clearfix"></div>
				<?php
				echo CoursePress_Template_Unit::unit_with_modules();
				?>
			</article>
        <?php endwhile; // end of the loop. ?>
	</main><!-- #main -->
    <div class="clearfix"></div>
</div><!-- #primary -->


<?php get_sidebar( 'course-sidebar' ); ?>

<?php
get_footer();
