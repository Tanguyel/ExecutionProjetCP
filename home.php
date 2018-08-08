<?php
/**
 * The home template file
 *
 * useful if you use static page for posts page
 * if doesn't exists, index.php will be used in this case
 * even if you select the page template - it will be ignored
 *
 * @package CoursePress
 */
        
if (function_exists('camera_main_ss_add')) {
    camera_register_scripts();
    wp_enqueue_style('camera-css-front', $pix_plugindir.'css/camera_front.css', false, '1.0', 'all');
    $shortcode_found=true;
}


get_header();

?>
<div id="primary" class="content-area home-page">
	<main id="main" class="site-main-nospace" role="main">

    <!-- Hero Section -->
    <?php 

    if (function_exists('camera_main_ss_add')) {
    ?>
        <section class="top-section section-hero hero-display dynamic"> 
            <?php echo do_shortcode('[camera slideshow="homeheroslideshow"]'); 
        /* Pour reference
<div class="hero-display-warper">
    <div class="section-overlay hero-section-overlay"></div>
    <div class="section-title hero-section-title">
        <h1 class="hero-title">Développez vos connaissances en management de projet grâce à nos formations gratuites
        </h1>
    </div>
    <div class="section-button hero-section-button">
        <div class="calltoaction-buton cyan">
            <a href="https://www.executionprojet.fr/formation-general-projet/" class="">
                <span class="align-icon-right button-icon">
                    <i class="fa fa-arrow-right"></i>
                </span>
                <span class="button-text">En savoir plus</span>
            </a>
        </div>
    </div>
</div>
*/
    ?>
        </section> 
    <?php    
    } else {
        ?>
        <section class="top-section section-hero hero-display static">
            <div class="top-section-background">
                <div class="section-overlay hero-section-overlay"></div>
                <div class="section-title hero-section-title" >
                    <h1 class="hero-title">Développez vos connaissances en management de projet grâce à nos formations gratuites
                    </h1>
                </div>
                <div class="section-button hero-section-button">
                    <div class="calltoaction-buton cyan">
                        <a href="https://www.executionprojet.fr/formation-general-projet/" class="">
                            <span class="align-icon-right button-icon">
                                <i class="fa fa-arrow-right"></i>
                            </span>
                            <span class="button-text">En savoir plus</span>
                        </a>
                    </div>
                </div>
            </div>

        </section>
        <?php
    }
    ?>        
        <section class="main-section">
            <div class="blog-post-display main-content">
            <?php
            
            
            if ( have_posts() ) :

            $listData["@context"] = "http://schema.org/";
            $listData["@type"] = "ItemList";
            $position = 1;
            
            
                /* Start the Loop */
                while ( have_posts() && $position <= 4 ) :
                    the_post();
                    $listData["itemListElement"][$position-1]["@type"] = "ListItem";
                    $listData["itemListElement"][$position-1]["position"] = $position;
                    $listData["itemListElement"][$position-1]["url"] = get_the_permalink();
                    $position = $position + 1; 
                
                    /* Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php ( where ___ is the Post Format name ) and that will be used instead.
                     */
                    get_template_part( 'content', get_post_format() );

                endwhile;

                cp_numeric_posts_nav( 'navigation-pagination' );

            else :

                get_template_part( 'content', 'none' );

            endif;
            ?>
              <div class="more calltoaction-buton cyan" data-element_type="button.default">
                    <a href="<?php echo home_url("/articles"); ?>" class="">Voir tous les articles</a>
                </div>
            </div>
            
            <?php
            get_sidebar('home-sidebar');
            ?>            
            
        </section>
        
        <!-- Section Entreprise -->
        
        <section class="bottom-section section-entreprise" >
            <div class="section-overlay entreprise-section-overlay"></div>
            <div class="section-title entreprise-section-title" >
                <h1 class="elementor-heading-title elementor-size-default">Vous êtes une entreprise ? </h1>
            </div>
            <div class="section-text entreprise-section-text">
				<ul class="">
					<li class="">Formation à distance et presentiel&nbsp;</li>
                    <li class="" >Développement de formations internes</li>
                    <li class="" >Conseil</li>
				</ul>
            </div>
            <div class="section-button entreprise-section-button">
                <div class="calltoaction-buton orange">
                    <a href="http://www.executionprojet.fr/entreprise/" class="">
                        <span class="align-icon-right button-icon">
                            <i class="fa fa-arrow-right"></i>
                        </span>
                        <span class="button-text">Découvrez notre offre</span>
                    </a>
                </div>
            </div>
		</section>
        
        <!-- Section de bas de page (à transformer en widget area)-->
        <section class="footer-section section-home-footer widget-area home-footer-widget-area" role="footer">
    <?php 
        get_sidebar('home-footer');
    ?>
        </section>
        
	</main><!-- #main -->
</div><!-- #primary -->
<script type="application/ld+json">
    <?php echo json_encode($listData); ?>
</script>
<?php

get_footer();
