<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package CoursePress
 */

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
        <span class="ep-footer-site-title"> ExecutionProjet.fr</span>
    </div>
    <div class="tarteaucitronOpenPanel ep-footer">Gestion des cookies</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>
<script type="text/javascript">
    tarteaucitron.user.analyticsUa = 'UA-97710296-1';
    tarteaucitron.user.analyticsMore = function () { /* add here your optionnal ga.push() */ };
    (tarteaucitron.job = tarteaucitron.job || []).push('analytics');
</script>
</body>
</html>