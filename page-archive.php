<?php
/*
Template Name: Archive
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
<div id="primary" class="content-area coursepress-page content-side-area">
	<main id="main" class="site-main" role="main">


		<?php
		while ( have_posts() ) :
			the_post(); 
            ?>
        <section class="main-section archive-article">
            <div class="blog-post-display main-content">        
                <header class="page-header">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    <div class="breadcrumb">
                        <ul itemscope itemtype="http://schema.org/BreadcrumbList">
                            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <a itemprop="item" href="<?php echo home_url(); ?>">
                                    <span itemprop="name"><?php echo sprintf( __( "Acceuil","ep_cp")); ?></span>
                                    <meta itemprop="position" content="1" />
                                </a>
                            </li>
                            <span class="delimiter">&raquo;</span>
                            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <a href="<?php echo home_url('/articles'); ?>" itemscope itemtype="http://schema.org/Thing" itemprop="item">
                                    <span itemprop="name">Articles</span>
                                </a>
                                <meta itemprop="position" content="2" />
                            </li>
                        </ul>
                    </div>
                </header><!-- .entry-header -->
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
                ?>
                    <span class="tag-link">
                        <a href=<?php echo get_category_link( $category->term_id );?>> 
                            <?php echo $category->name; ?>
                        </a>
                    </span>
                <?php
                }
                ?>  
                </nav>
            <?php    
            $my_query = new WP_Query('post_type=post');
            if($my_query->have_posts()) {
                
                $listData["@context"] = "http://schema.org/";
                $listData["@type"] = "ItemList";
                $position = 1;

                
                while($my_query->have_posts() /*&& $position <= $how_many_last_posts*/) {
                    $my_query->the_post();
                    
                    $listData["itemListElement"][$position-1]["@type"] = "ListItem";
                    $listData["itemListElement"][$position-1]["position"] = $position;
                    $listData["itemListElement"][$position-1]["url"] = get_the_permalink();
                    $position = $position + 1; 
                    
                    get_template_part( 'content', get_post_format() );

                    
                }
                
                cp_numeric_posts_nav( 'navigation-pagination' );
                
                wp_reset_postdata();
            }
			
		endwhile; // end of the loop.
		?>
            </div>
        </section>
	</main><!-- #main -->
    
    
</div><!-- #primary -->
<script type="application/ld+json">
    <?php echo json_encode($listData); ?>
</script>
<?php
get_sidebar('archive-sidebar');
get_footer();
