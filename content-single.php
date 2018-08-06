<?php
/**
 * @package CoursePress
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">
	<header class="entry-header">
		<h1 class="entry-title h1-underline-orange" itemprop="headline"><?php the_title(); ?></h1>
        <meta itemprop="url" content="<?php the_permalink(); ?>">
        <meta itemprop="mainEntityOfPage" content="<?php the_permalink(); ?>">
<?php
    if ( function_exists('ep_breadcrumb') ) {
        echo '<div class="breadcrumb">';
        ep_breadcrumb();
        echo '</div>';
    }
	if ( has_post_thumbnail() ) {
		echo '<div class="featured-image">';
		the_post_thumbnail('post-thumbnail', array( 'itemprop' => 'image' ) );
		echo '</div>';
	}
	?>
		<div class="entry-meta">
			<span class="date-links" itemprop="datePublished" content="<?php echo get_the_date('Y-m-d'); ?>">
                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php echo get_the_date(); ?></a>
            </span>
            <?php  
            $category_list = get_the_category_list( '<span class="category-link" itemprop="articleSection">','</span><span class="category-link" itemprop="articleSection">','</span>' );
            if ( $category_list ) :
                echo $category_list;
			endif; 
            
            $tags_list = get_the_tag_list( '<span class="tag-link" itemprop="keywords">','</span><span class="tag-link" itemprop="keywords">','</span>' );
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

	<div class="entry-content" itemprop="articleBody">
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
    <span itemprop="author" itemscope itemtype="http://schema.org/Person">
        <meta itemprop="name" content="Tanguy El Mouahidine">
        <meta itemprop="jobTitle" content="Consultant et Formateur en management de projet">
    </span>
    <span itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
        <meta itemprop="name" content="ExecutionProjet.fr">
        <meta itemprop="logo" content="http://www.executionprojet.fr/wp-content/uploads/2018/06/Gravatar-ExecutionProjet.png">
    </span>
    <div class="date-modified date-links">Mis à jour le : <span itemprop="dateModified" content="<?php the_modified_date('Y-m-d'); ?>"><?php the_modified_date(); ?></span></div>
    <?php
    ep_socialshare();
    ?>

</article><!-- #post-## -->
