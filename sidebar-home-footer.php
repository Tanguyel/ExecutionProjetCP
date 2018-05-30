<?php
/**
 * The Sidebar containing the widget areas to show on the bottom of the home page.
 *
 * @package Execution Projet Theme
 */
?>
<!-- Debut des Widget pour le footer de la page d'acceuil -->
	<?php do_action( 'before_sidebar' ); ?>
	<?php if ( ! dynamic_sidebar( 'home-footer' ) ) : 
        // No default content...
	endif; // end sidebar widget area ?>
    <div class="clearfix"></div>
<!-- Debut des Widget pour le footer de la page d'acceuil -->