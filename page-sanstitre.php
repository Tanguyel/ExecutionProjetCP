<?php
/*
Template Name: Page sans Titre(pour page builder)
*/

/**
 * The template for displaying all full pages without showing their Title (mainly for Page builder).
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package CoursePress
 */

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