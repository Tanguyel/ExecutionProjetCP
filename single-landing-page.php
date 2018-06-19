<?php
/**
 * The Template for displaying all single posts.
 *
 * @package CoursePress
 */

get_header(); ?>

	
    <main id="main" class="site-main" role="main">

    <?php
    while ( have_posts() ) :
        the_post();
    ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title h1-underline-orange"><?php the_title(); ?></h1>
            </header><!-- .entry-header -->
            <div id="primary" class="content-area content-side-area">  
                <div class="entry-content">
                    <?php
                    the_content();
                    ?>
                </div><!-- .entry-content -->
                <?php
                ep_socialshare();
                ?>
            </div><!-- #primary -->

            <div id="secondary" class="widget-area landing-sidebar" role="complementary">
                <?php lp_conversion_area(); ?>

                <div class="clearfix"></div>
            </div><!-- Landing sidebar -->
        </article><!-- #post-## -->


    <?php
    endwhile; // end of the loop.
    ?>

    </main><!-- #main -->
	



<?php
get_footer();
/*
get_header(); ?>

	<div id="primary" class="content-area content-side-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'content', 'single' );



		endwhile; // end of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<div id="secondary" class="widget-area landing-sidebar" role="complementary">
	<?php lp_conversion_area(); ?>
	
    <div class="clearfix"></div>
</div><!-- home sidebar -->

<?php
get_footer();
*/