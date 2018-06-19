<?php
/**
 * @package CoursePress
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title h1-underline-orange"><?php the_title(); ?></h1>
	<?php
	if ( has_post_thumbnail() ) {
		echo '<div class="featured-image">';
		the_post_thumbnail();
		echo '</div>';
	}
	?>
		<div class="entry-meta">
			<span class="date-links">
                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo get_the_date(); ?></a>
            </span>
            <?php  
            $category_list = get_the_category_list( '<span class="category-link">','</span><span class="category-link">','</span>' );
            if ( $category_list ) :
                echo $category_list;
			endif; 
            
            $tags_list = get_the_tag_list( '<span class="tag-link">','</span><span class="tag-link">','</span>' );
			if ( $tags_list ) :
                echo $tags_list;
			endif; // End if $tags_list
            
            edit_post_link(
                __( 'Edit', 'cp' ),
                '<span class="edit-link">',
                '</span>'
            );
            
?>
		</div><!-- .entry-meta -->
    <?php
    ep_socialshare();
    ?>
        
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'cp' ),
				'after' => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

    <?php
    ep_socialshare();
    ?>

</article><!-- #post-## -->
