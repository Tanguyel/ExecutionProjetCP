<?php
/*
Template Name: Telechargement fichier
*/

/**
 * Le template pour afficher les pages ressources avec espace pour telecherger les fichiers proposés.
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
    //$ressource_file = get_post_meta(get_the_ID(), 'ressource_file', true);
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
            <script type="text/javascript">//Rediriger vers le telechargement quand le formulaire est soumis
                document.addEventListener( 'wpcf7mailsent', function( event ) {
                     location = ' <?php echo get_post_meta(get_the_ID(), 'ressource_file', true);  ?> '
                }, false ); 
            </script>
            <?php //get_sidebar( 'landing-sidebar' ); ?>
            
            <div id="secondary" class="widget-area landing-sidebar" role="complementary">
		      <aside id="text-3" class="widget widget_text">
                <h2 class="widget-title">Téléchargez Maintenant</h2>			
                <div class="textwidget">
                    <?php 
                    $modele_name = get_post_meta(get_the_ID(), 'ressource_name', true);
                    $code_form = do_shortcode('[contact-form-7 id="3230" title="Télécharger votre Modèle" modele_name=' .  $modele_name . ']');
                    echo $code_form;
                    ?>
                    
                </div>
                </aside>    
                <div class="clearfix"></div>
                <!-- Landing sidebar -->
            </div>

        </article><!-- #post-## -->


    <?php/*
    endwhile; // end of the loop.*/
    ?>

    </main><!-- #main -->
	



<?php
get_footer();