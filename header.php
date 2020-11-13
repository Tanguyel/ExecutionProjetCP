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
    	  "privacyUrl": "", /* Privacy policy url */

    	  "hashtag": "#tarteaucitron", /* Open the panel with this hashtag */
    	  "cookieName": "tarteaucitron", /* Cookie name */
    
    	  "orientation": "bottom", /* Banner position (top - bottom) */
                           
    	  "showAlertSmall": true, /* Show the small banner on bottom right */
    	  "cookieslist": false, /* Show the cookie list */
                           
          "showIcon": false, /* Show cookie icon to manage cookies */
          "iconPosition": "BottomRight", /* BottomRight, BottomLeft, TopRight and TopLeft */

    	  "adblocker": false, /* Show a Warning if an adblocker is detected */
                           
          "DenyAllCta" : false, /* Show the deny all button */
          "AcceptAllCta" : true, /* Show the accept all button when highPrivacy on */
          "highPrivacy": false, /* HIGHLY RECOMMANDED Disable auto consent */
                           
    	  "handleBrowserDNTRequest": false, /* If Do Not Track == 1, disallow all */

    	  "removeCredit": false, /* Remove credit link */
    	  "moreInfoLink": true, /* Show more info link */

          "useExternalCss": false, /* If false, the tarteaucitron.css file will be loaded */
          "useExternalJs": false, /* If false, the tarteaucitron.js file will be loaded */

    	  //"cookieDomain": ".my-multisite-domaine.fr", /* Shared cookie for multisite */
                          
          "readmoreLink": "", /* Change the default readmore link */

          "mandatory": true, /* Show a message about mandatory cookies */
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
                            <svg class="eplogo-back" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 500 30">
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
                    if ( ! is_page_template( 'page-landing.php' )) {
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
                    }
                    ?>

                    <a class="skip-link screen-reader-text" href="#content">
                        <?php _e( 'Skip to content', 'cp' ); ?>
                    </a>
                    <?php 
                    if ( ! is_page_template( 'page-landing.php' )) {
                        wp_nav_menu( array( 'theme_location' => 'primary' ) ); 
                    }
                    ?>
                </nav><!-- #site-navigation -->
                </div>
            </header><!-- #masthead -->

<?php   $class = '';
        if ( is_front_page() ) {
            $class = 'home-page';
        }  ?>
        <div id="content" class="site-content <?php echo $class ; ?>">