<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package CoursePress
 */

$site_url = get_option(siteurl);

?>

</div><!-- #content -->

<div class="push"></div>
</div><!-- #page -->

<footer id="colophon" class="site-footer" role="contentinfo">
    <!--
<nav id="footer-navigation" class="footer-navigation wrap" role="navigation">
<?php
/*wp_nav_menu(
			array( 'theme_location' => 'secondary' )
		);*/
?>
</nav><!-- #site-navigation --> 

    <div class="ep-footer ep-credit">
        Copyright © 
        <span class="ep-footer-year">2017</span> 
        <span class="ep-footer-site-title"> ELM SAS</span>
    </div>
    <div class="ep-footer">
        <span class="tarteaucitronOpenPanel">Gestion des cookies</span>
        <span> - </span>
        <span><a href="<?php echo $site_url; ?>/CGV/">Condition general de Vente</a></span>
        <span> - </span>
        <span><a href="<?php echo $site_url; ?>/reglement-interieur/">Réglement interieur</a></span>
    </div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

<?php 
    if ( $site_url == 'http://www.executionprojet.fr') {
        $GA_UA = 'tarteaucitron.user.analyticsUa = \'UA-97710296-1\';
    tarteaucitron.user.analyticsMore = function () { /* add here your optionnal ga.push() */ };
    (tarteaucitron.job = tarteaucitron.job || []).push(\'analytics\');';
    } else {
        $GA_UA = '';
    }
?>
<script type="text/javascript">
    <?php echo $GA_UA; ?>;
    (tarteaucitron.job = tarteaucitron.job || []).push('youtube');
    (tarteaucitron.job = tarteaucitron.job || []).push('linkedin');
    (tarteaucitron.job = tarteaucitron.job || []).push('facebook');
    (tarteaucitron.job = tarteaucitron.job || []).push('facebookcomment');
    (tarteaucitron.job = tarteaucitron.job || []).push('twitter');
</script>

</body>
</html>