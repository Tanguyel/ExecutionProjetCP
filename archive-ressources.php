<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package CoursePress
 */

get_header();
$home = sprintf( __( "Acceuil","ep_cp")); // text for the 'Home' link
$ressources_home = get_post_type_archive_link('ressources');
?>
<div id="primary" class="content-area content-side-area">
	<main id="main" class="site-main" role="main">
        <section class="main-section archive-ressources">
		<header class="page-header">
			<h1 class="page-title">
				<?php _e( 'Ressources', 'epcp' ); ?>
			</h1>
            <div class="breadcrumb">
                <ul itemscope itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a itemprop="item" href="<?php echo home_url(); ?>">
                            <span itemprop="name"><?php echo $home; ?></span>
                            <meta itemprop="position" content="1" />
                        </a>
                    </li>
                    <span class="delimiter">&raquo;</span>
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a href="<?php echo $ressources_home; ?>" itemprop="item" itemscope itemtype="http://schema.org/Thing">
                            <span itemprop="name">Ressources</span>
                        </a>
                        <meta itemprop="position" content="2" />
                    </li> 
                </ul>
            </div>
		</header><!-- .page-header -->

<?php if ( have_posts() ) : 
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
			get_template_part( 'content', get_post_type() );
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