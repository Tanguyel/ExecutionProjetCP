<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package CoursePress
 */

$site_url = get_option('siteurl');

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

    <div class="ep-footer ep-credit" itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
        Copyright © 
        <span class="ep-footer-year">2017</span> 
        <span class="ep-footer-site-title" itemprop="name"> ELM SAS</span>
        <meta itemprop="logo" content="">
    </div>
    <div class="ep-footer">
        <span class="tarteaucitronOpenPanel">Gestion des cookies</span>
        <span> - </span>
        <span><a href="<?php echo $site_url; ?>/CGV/">Condition generales de Vente</a></span>
        <span> - </span>
        <span><a href="<?php echo $site_url; ?>/reglement-interieur/">Réglement interieur</a></span>
    </div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

<?php 
    if ( $site_url == 'https://www.executionprojet.fr' || $site_url == 'http://www.executionprojet.fr' ) {
        $GA_UA = 'tarteaucitron.user.analyticsUa = \'UA-97710296-1\';
    tarteaucitron.user.analyticsMore = function () { /* add here your optionnal ga.push() */ };
    (tarteaucitron.job = tarteaucitron.job || []).push(\'analytics\');';
        $Insight = '<script type="text/javascript"> _linkedin_data_partner_id = "338324"; </script><script type="text/javascript"> (function(){var s = document.getElementsByTagName("script")[0]; var b = document.createElement("script"); b.type = "text/javascript";b.async = true; b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js"; s.parentNode.insertBefore(b, s);})(); </script> <noscript> <img height="1" width="1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=338324&fmt=gif" /> </noscript>';
        $hubspot_id = 'tarteaucitron.user.hubspotId = \'4491035\';';
        $pixelFB = 'tarteaucitron.user.facebookpixelId = \'1665633716893017\'; tarteaucitron.user.facebookpixelMore = function () {};
        (tarteaucitron.job = tarteaucitron.job || []).push(\'facebookpixel\');';
    } else {
        $GA_UA = '';
        $Insight = '';
        $hubspot_id = '';
    }
?>
<script type="text/javascript">
    <?php echo $GA_UA; ?>
    (tarteaucitron.job = tarteaucitron.job || []).push('youtube');
    (tarteaucitron.job = tarteaucitron.job || []).push('linkedin');
    (tarteaucitron.job = tarteaucitron.job || []).push('facebook');
    (tarteaucitron.job = tarteaucitron.job || []).push('facebookcomment');
    <?php echo $pixelFB; ?>
    (tarteaucitron.job = tarteaucitron.job || []).push('twitter');
    <?php echo $hubspot_id; ?>
    (tarteaucitron.job = tarteaucitron.job || []).push('hubspot');
    //(tarteaucitron.job = tarteaucitron.job || []).push('hubspotform');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1665633716893017&ev=PageView&noscript=1"
/></noscript>
<?php echo $Insight; ?>

</body>
</html>