<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package CoursePress
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php
        wp_head();
        include get_template_directory() . '/inc/custom-colors.php';
        ?>
        <script type="text/javascript">
        tarteaucitron.init({
            "hashtag": "#tarteaucitron", /* Ouverture automatique du panel avec le hashtag */
            "highPrivacy": false, /* désactiver le consentement implicite (en naviguant) ? */
            "orientation": "top", /* le bandeau doit être en haut (top) ou en bas (bottom) ? */
            "adblocker": false, /* Afficher un message si un adblocker est détecté */
            "showAlertSmall": false, /* afficher le petit bandeau en bas à droite ? */
            "cookieslist": false, /* Afficher la liste des cookies installés ? */
            "removeCredit": false /* supprimer le lien vers la source ? */
        });
        </script>
    </head>

    <body <?php body_class( 'cp-wrap' ); ?>>
        <div id="page" class="hfeed site">
            <?php do_action( 'before' ); ?>
            <header id="masthead" class="site-header" role="banner">
                <div class='wrap'>
                    <div class="site-branding">
                        <div class="ep-logo-back">
                            <svg class="eplogo-back" xmlns="http://www.w3.org/2000/svg">
                                <title>Exeproj-logo-background</title>
                                <path d="M -40,-40 L 600,-40 L 70,90 L -40,15 Z" style="fill:#00AEED; stroke:none"></path>
                            </svg>
                        </div>
                        <div class="ep-logo-title">
                            <?php echo '<a href="' . esc_url( home_url( '/' ) ) . '" itemprop="url" rel="home">'; ?>

                            <svg class="eplogo" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 300 50">
                                <defs>
                                    <style>
                                        .cls-l,.cls-T{fill:#010101;font-family:Raleway-Bold, Raleway;font-weight:700;}
                                        .cls-T{font-size:23.76px;}
                                        .cls-l{font-size:16.72px;}
                                    </style>
                                </defs>
                                <title>Exeproj-logo</title>
                                <g id="ExecutionProjet" transform="scale(2)">
                                    <text class="cls-T" transform="translate(0 20.31)">E</text>
                                    <text class="cls-l" transform="translate(14.19 16.85)">xecution</text>
                                    <text class="cls-T" transform="translate(6.02 34.34)">P</text>
                                    <text class="cls-l" transform="translate(20 33.25)">rojet.fr
                                    </text>
                                </g>
                            </svg>
                            </a>
                    </div>
                </div>

                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <?php
                    $theme_location = 'primary';
                    if ( ! has_nav_menu( $theme_location ) ) {
                        $theme_locations = (array) get_nav_menu_locations();

                        foreach ( $theme_locations as $key => $location ) {
                            $theme_location = $key;
                            break;
                        }
                    }

                    if ( has_nav_menu( 'primary' ) ) {
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'menu_class' => 'mobile_menu',
                                'menu_id' => 'mobile_menu',
                                'walker' => new Walker_Nav_Menu_Dropdown(),
                            )
                        );
                    }
                    ?>

                    <a class="skip-link screen-reader-text" href="#content">
                        <?php _e( 'Skip to content', 'cp' ); ?>
                    </a>
                    <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                </nav><!-- #site-navigation -->
                </div>
            </header><!-- #masthead -->

        <div id="content" class="site-content">