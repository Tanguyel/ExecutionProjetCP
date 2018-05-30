<?php
/**
 * The Sidebar containing the widget areas to show with the course.
 *
 * @package CoursePress
 */
?>
<div id="secondary" class="widget-area course-widget-area" role="complementary">
	<?php do_action( 'before_sidebar' ); ?>
	<?php if ( ! dynamic_sidebar( 'course-sidebar' ) ) : 
        // No default content...
	endif; // end sidebar widget area ?>
</div><!-- #secondary -->