<?php
/**
 * The Sidebar containing the widget areas to show with the course.
 *
 * @package Execution Projet Theme
 */
?>
<div class="widget-area home-sidebar" role="complementary">
	<?php do_action( 'before_sidebar' ); ?>
	<?php if ( ! dynamic_sidebar( 'home-sidebar' ) ) : 
        // No default content...
	endif; // end sidebar widget area ?>
    <div class="clearfix"></div>
</div><!-- home sidebar -->