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
$course_home = CoursePress_Core::get_slug( 'course', true );
?>
<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<header class="page-header">
			<h1 class="page-title">
				<?php _e( 'Nos Formations', 'epcp' ); ?>
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
                        <a href="<?php echo $course_home; ?>" itemprop="item" itemscope itemtype="http://schema.org/Thing">
                            <span itemprop="name">Formation</span>
                        </a>
                        <meta itemprop="position" content="2" />
                    </li> 
                </ul>
            </div>
		</header><!-- .page-header -->
<?php         
    $a = array(
			'category' => CoursePress_Helper_Utility::the_course_category(),
			'posts_per_page' => 10,
			'show_pager' => true,
			'echo' => false,
			'courses_type' => 'current_and_upcoming',
		);
        
    $category = sanitize_text_field( $a['category'] );
    $per_page = (int) $a['posts_per_page'];
    $show_pager = cp_is_true( $a['show_pager'] );
    $echo = cp_is_true( $a['echo'] );

    $paged = isset( $wp->query_vars['paged'] ) ? absint( $wp->query_vars['paged'] ) : 1;

    $post_args = array(
        'post_type' => CoursePress_Data_Course::get_post_type_name(),
        'post_status' => 'publish',
        'posts_per_page' => $per_page,
        'paged' => $paged,
        'meta_key' => 'cp_course_start_date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'suppress_filters' => true,
    );

    // Add category filter
    if ( $category && 'all' !== $category ) {
        $post_args['tax_query'] = array(
            array(
                'taxonomy' => 'course_category',
                'field' => 'slug',
                'terms' => array( $category ),
            ),
        );
    }

    if ( ! empty( $a['courses_type'] ) && 'current_and_upcoming' == $a['courses_type'] ) {
        $query = CoursePress_Data_Course::current_and_upcoming_courses( $post_args );
    } else {
        $query = new WP_Query( $post_args );
    }

    $content = '';
    $template = trim( '[course_list_box]' );
    $template = apply_filters( 'coursepress_template_course_archive', $template, $a );
    
    $listData["@context"] = "http://schema.org/";
    $listData["@type"] = "ItemList";
    $position = 1;
        
    //Ajout d'une carte cours pour les formations sur mesures    
    
    $page = get_page_by_title( 'Formation sur mesure' );
    $pageid = $page->ID;
    $pageurl = home_url('/' . $page -> post_name );
    
?>
            <article id="post-<?php echo $pageid; ?>" class="course-card post-4165 course type-course status-publish wpautop" itemscope itemtype="http://schema.org/Course">
                <a href="<?php echo $pageurl/*$page -> guid home_url('/' . $page -> post_name )*/; ?>">

                    <div class="course-thumbnail course-featured-media course-featured-media-<?php echo $pageid; ?> ">
                        <figure style="">
                            
                            <?php 
                            if (has_post_thumbnail ( $pageid )) {
                                echo get_the_post_thumbnail( $pageid );
                            } else {?>
                                <img src="https://www.executionprojet.fr/wp-content/uploads/2018/08/workplace-1245776_1920.jpg" class="course-media-img" itemprop="image">
                    <?php
                            }
                             ?>
                        </figure>
                    </div>        
                    <div class="entry-meta">
                    </div>
                    <section class="article-content-right  course-archive">
                        <header class="entry-header">
                            <h2 class="entry-title" itemprop="name"><?php echo $page->post_title; ?></h2>
                        </header><!-- .entry-header -->
                        <div class="entry-content " itemprop="description">
                            <div class="course-summary course-summary-<?php echo $pageid; ?> ">Nous sommes en mesures de vous proposer des formations sur mesure répondant à vos contraintes et vos spécificités.</div>
                        </div><!-- .entry-content -->
                        <div itemprop="provider" itemscope="" itemtype="http://schema.org/Organization">
                            <meta itemprop="name" content="ExecutionProjet.fr">
                            <meta itemprop="logo" content="http://www.executionprojet.fr/wp-content/uploads/2018/06/Gravatar-ExecutionProjet.png">
                        </div>
                    </section>
                </a>
            </article>
<?php
    

   // Affichage de l'ensemble des cours
        
    if ($query->have_posts()) {
        foreach ( $query->posts as $post ) {
            CoursePress_Helper_Utility::set_the_course( $post );
            $content .= do_shortcode( $template );
            $course_id = CoursePress_Helper_Utility::the_course( true );
            $url = CoursePress_Data_Course::get_course_url( $course_id );
            $listData["itemListElement"][$position-1]["@type"] = "ListItem";
            $listData["itemListElement"][$position-1]["position"] = $position;
            $listData["itemListElement"][$position-1]["url"] = $url;
            $position = $position + 1; 
        }
    }
    
    $listData["itemListElement"][$position-1]["@type"] = "ListItem";
    $listData["itemListElement"][$position-1]["position"] = $position;
    $listData["itemListElement"][$position-1]["url"] = $pageurl;
    $position = $position + 1; 
    
    /*
    $post_args2 = array(
        'post_type' => 'page',
        'pagename' => 'formation-sur-mesure',
    );
    $query2 = new WP_Query( $post_args2 );
    if ($query2->have_posts()) {
        while ( $query2->have_posts() ) :
            $query2->the_post;
            
            $content .= get_template_part( 'content', 'course' );
        endwhile;
    }*/
        


    // Pager.
    if ( $show_pager ) {
        $big = 999999999; // need an unlikely integer.
        $content .= paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $paged,
            'total' => $query->max_num_pages,
        ) );
    }

    $content = apply_filters( 'coursepress_course_archive_content', $content, $a );

    ?>
	</main><!-- #main -->
</section><!-- #primary -->
<script type="application/ld+json">
    <?php echo json_encode($listData); ?>
</script>
<?php

get_footer();
