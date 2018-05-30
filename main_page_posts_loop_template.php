<?php
/**
 * Fonction Modificatrice du plugin Posts_in_Page
 *
 * @package Posts_in_Page
 * @author Tanguy El Mouahidine
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 */ 
?>


<!-- Post Wrap Start-->
<article itemtype="http://schema.org/CreativeWork" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class='elm-main-blog-layout'>
        <header class="entry-header">
            <!-- 	This outputs the post TITLE -->
            <h2 class="entry-title" itemprop="headline"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<div class="eptitle-back">
			</div>
        </header>
        <!-- 	This outputs the post EXCERPT.  To display full content including images and html, 
                replace the_excerpt(); with the_content();  below. -->
        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div>


        <footer class="entry-footer">

        </footer><!-- .entry-footer -->
</div>
</article><!-- #post-## -->    
<!-- // Post Wrap End -->