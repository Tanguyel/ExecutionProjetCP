<?php
/*
Template Name: Default (footer widgets)
*/

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package CoursePress
 */

global $post;

get_header();

?>
<div id="primary" class="content-area content-side-area woocommerce">
	<main id="main" class="site-main" role="main">

		<?php woocommerce_content(); ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar( 'woocommerce-sidebar' );
get_footer();
