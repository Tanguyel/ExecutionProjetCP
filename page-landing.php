<?php
/*
Template Name: Landing Page
*/

/**
 * Le template pour afficher les landing pages pour telecherger les fichiers proposés.
 *
 *
 * @package ExecutionProjet
 */
/*
get_header(); ?>

<div id="primary" class="content-area coursepress-page-no-widgets">
    <main id="main" class="site-main-nospace" role="main">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
                <?php
                the_content();
                ?>
            </div><!-- .entry-content -->
            <?php
            edit_post_link(
                __( 'Edit', 'cp' ),
                '<footer class="entry-meta"><span class="edit-link">',
                '</span></footer>'
            );
            ?>
        </article><!-- #post-## -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();

*/

get_header(); ?>

	
    <main id="main" class="site-main" role="main">

    <?php/*
    while ( have_posts() ) :
        the_post();*/
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
                edit_post_link(
                    __( 'Edit', 'cp' ),
                    '<footer class="entry-meta"><span class="edit-link">',
                    '</span></footer>'
                );
                ?>
            </div><!-- #primary -->

            <?php get_sidebar( 'landing-sidebar' ); ?>

        </article><!-- #post-## -->


    <?php/*
    endwhile; // end of the loop.*/
    ?>

    </main><!-- #main -->
	



<?php
get_footer();