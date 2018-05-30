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

get_header();

?>
<div id="primary" class="content-area home-page">
	<main id="main" class="site-main-nospace" role="main">

        <!-- Hero Section -->
        
        <section data-id="wewycxg" class="top-section section-hero hero-display ">
            <div class="section-overlay hero-section-overlay"></div>
            <div data-id="wlzbsxu" class="section-title hero-section-title" data-element_type="heading.default">
                <h1 class="hero-title">Développez vos connaissances en management de projet grâce à nos formations gratuites
                </h1>
            </div>
            <div data-id="uslpujc" class="section-button hero-section-button" data-element_type="button.default">
                <div class="calltoaction-buton cyan">
                    <a href="http://www.executionprojet.fr/formation-general-projet/" class="">
                        <span class="align-icon-right button-icon">
                            <i class="fa fa-arrow-right"></i>
                        </span>
                        <span class="button-text">En savoir plus</span>
                    </a>
                </div>
            </div>
        </section>
        
        <section class="main-section">
            <div class="blog-post-display main-content">
            <?php
            if ( have_posts() ) :

                /* Start the Loop */
                while ( have_posts() ) :
                    the_post();

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
              <div data-id="z00tisy" class="more calltoaction-buton cyan" data-element_type="button.default">
                    <a href="#" class="">Voir tous les articles</a>
                </div>
            </div>
            
            <?php
            get_sidebar('home-sidebar');
            ?>            
            
        </section>
        
        <!-- Section Entreprise -->
        
        <section data-id="ahrcvvn" class="bottom-section section-entreprise" data-element_type="section" >
            <div class="section-overlay entreprise-section-overlay"></div>
            <div data-id="lyqlamf" class="section-title entreprise-section-title" data-element_type="column">
                <h1 class="elementor-heading-title elementor-size-default">Vous êtes une entreprise ? </h1>
            </div>
            <div class="section-text entreprise-section-text">
				<ul data-id="usiwxsh" class="">
					<li class="">Formation à distance et presentiel&nbsp;</li>
                    <li class="" >Développement de formations internes</li>
                    <li class="" >Conseil</li>
				</ul>
            </div>
            <div data-id="ueqdiw6" class="section-button entreprise-section-button" data-element_type="button.default">
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
<?php

get_footer();
