<?php
/**
 * The Sidebar containing the widget areas to show with the course.
 *
 * @package Execution Projet Theme
 */
?>
<div id="secondary" class="widget-area woocommerce-sidebar" role="complementary">
	<?php do_action( 'before_sidebar' ); ?>
	<?php if ( ! dynamic_sidebar( 'woocommerce-sidebar' ) ) : 
        // No default content...
	endif; // end sidebar widget area ?>
    <div class="clearfix"></div>
</div><!-- home sidebar -->