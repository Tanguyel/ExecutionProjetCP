<?php
/**
 * @package CoursePress
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<section id="course-summary">
		<?php
		$course_media = do_shortcode( '[course_media]' );
		if ( $course_media ) :
			?>
			<div class="course-video">
				<?php
				// Show course media
				echo $course_media;
				?>
			</div>
		<?php endif; ?>

		<div class="entry-content-excerpt <?php echo ($course_media ? '' : 'entry-content-excerpt-right' ); ?>">
			<div class="course-excerpt">
                <?php echo get_the_excerpt(); ?>
            </div>
            <div class="course-box">
				<?php
				// Change to yes for 'Open-ended'.
                $open_ended = cp_is_true( CoursePress_Data_Course::get_setting( get_the_ID(), 'course_open_ended', false ) );
                if ((!$open_ended)) {
                    echo do_shortcode( '[course_dates show_alt_display="yes"]' ) ;
                } else {
                    $start_date = CoursePress_Data_Course::get_setting( get_the_ID(), 'course_start_date' );
                    if ( CoursePress_Data_Course::strtotime( $start_date ) > CoursePress_Data_Course::time_now() ) {
                        echo do_shortcode( '[course_dates show_alt_display="yes"]' ) ;
                    }
                }
                    
				// Change to yes for 'Open-ended'.
                if (!(cp_is_true( CoursePress_Data_Course::get_setting( get_the_ID(), 'enrollment_open_ended', false )))): 
                    echo do_shortcode( '[course_enrollment_dates show_alt_display="no"]' );
                endif;
				//echo do_shortcode( '[course_language]' );
				echo do_shortcode( '[course_cost]' );
				?>
			</div><!--course-box-->
			<div class="quick-course-info">
				<?php echo do_shortcode( '[course_join_button]' ); ?>
			</div>
		</div>
        <div class="course-social-share">
            <?php 
            ep_socialshare( 'course' );
            ?>
        </div>
	</section>

	<br clear="all" />

	<div class="entry-content left-content">
        <?php 
        $pdf_description = do_shortcode('[course_pdf_description course_id="' . get_the_ID() . '"]');
        if ( $pdf_description ) :
			?>
        <div class="calltoaction-button violet full">
            <?php /*
            <a href='<?php echo $pdf_description; ?>' ><i class="fa fa-download"></i>Télecharger le programme</a>
            */?>
            <button onclick="document.getElementById('DLPopUp').style.display='block'"><i class="fa fa-download"></i>Télecharger le programme</button>
        </div>
        <div id="DLPopUp" class="modalDLPopUp">
            <div class="modal-content animate">
            <div class="imgcontainer">
              <span onclick="document.getElementById('DLPopUp').style.display='none'" class="close" title="Close Modal">&times;</span>
                <span class="image"><i class="fa fa-download"></i></span>
            </div>
                <?php echo do_shortcode( '[contact-form-7 id="81" title="Télécharger le Programme"]' ); ?>
              <div class="altDL">Vous pouvez aussi telecharger le programe de la formation <a href="<?php echo $pdf_description; ?>">ici</a></div>
            </div>
        </div>
        <script>
        // Get the modal
        var modal = document.getElementById('DLPopUp');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        //Rediriger vers le telechargement quand le formulaire est soumis
        document.addEventListener( 'wpcf7mailsent', function( event ) {
            location = '<?php echo $pdf_description; ?>';
        }, false );
        </script>
            
        
        <?php endif; ?>
        <?php
		$course_description = do_shortcode( get_post(get_the_ID())->post_content );
		if ( $course_description ) :
			?>
		<h1 class="h1-underline-cyan"><?php _e( 'About the Course', 'cp' ); ?></h1>
		<div class="content">
            <?php echo do_shortcode( '[course_description course_id="' . get_the_ID() . '"]' ); ?>
        </div>
        <?php endif; ?>
        <h1 class="h1-underline-cyan"><?php _e( 'Objectives', 'cp' ); ?></h1>
		<?php echo do_shortcode( '[course_objectives course_id="' . get_the_ID() . '" label=""]' ); ?>
        
        <h1 class="h1-underline-cyan"><?php _e( 'Educational Resources', 'cp' ); ?></h1>
		<?php echo do_shortcode( '[course_resources course_id="' . get_the_ID() . '" label=""]' ); ?>

        
        
<?php
if ( CoursePress_Data_Course::get_setting( get_the_ID(), 'structure_visible', true ) ) : ?>
        <h1 class = "h1-underline-orange"><?php
			_e( 'Course Structure', 'cp' );
            ?></h1>
        <?php echo do_shortcode( '[course_structure label="" full_structure="true"]' );
endif;
/*
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'cp' ),
				'after' => '</div>',
			)
		);
*/
		?>
	</div><!-- .entry-content -->

    
        <div class="course_prerequisites right-content">
            <div class="calltoaction-button orange full"><a href="#footercontact" ><i class="fa fa-refresh"></i>Etre recontacté</a></div>
            <div class="calltoaction-button orange full"><a href="tel:+33644663500" ><i class="fa fa-mobile-phone fa-lg"></i>06 44 66 35 00</a></div>
            
            <h1 class="h1-underline-violet"><?php _e( 'Public', 'cp' ); ?></h1>
            <?php echo do_shortcode( '[course_public course_id="' . get_the_ID() . '" label=""]' ); ?>
            <h1 class="h1-underline-violet"><?php _e( 'Prerequisites', 'cp' ); ?></h1>
            <?php echo do_shortcode( '[course_prerequisites course_id="' . get_the_ID() . '" label=""]' ); ?>
        </div>
    <?php $instructors = CoursePress_Data_Shortcode_Instructor::course_instructors( array( 'style' => 'block' , 'avatar_size' => '180' , 'link_all' => 'yes' , 'link_text' => '') ); ?>
	<?php if ( ! empty( $instructors ) ) : ?>
		<div class="course-instructors right-content">
			<h1 class="h1-underline-violet"><?php _e( 'Instructors', 'cp' ); ?></h1>
			<?php echo $instructors; ?>
		</div><!--course-instructors right-content-->
	<?php endif; ?>


    
	<br clear="all" />

	<footer class="entry-meta">
		<?php  
            $category_list = get_the_category_list( '<span class="category-link">','</span><span class="category-link">','</span>' );
            if ( $category_list ) :
                echo $category_list;
			endif; 
            
            $tags_list = get_the_tag_list( '<span class="tag-link">','</span><span class="tag-link">','</span>' );
			if ( $tags_list ) :
                echo $tags_list;
			endif; // End if $tags_list
		?>

		<?php
		edit_post_link(
			__( 'Edit', 'cp' ),
			'<span class="edit-link">',
			'</span>'
		);
		?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->