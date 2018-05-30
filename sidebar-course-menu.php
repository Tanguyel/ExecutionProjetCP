<?php
/**
 * The Sidebar containing the widget areas to show with the course.
 *
 * @package CoursePress
 */
?>
<div id="" class="widget-area course-widget-area course-side-menu" role="complementary">
	<?php do_action( 'before_sidebar' ); ?>
	<?php 
    if ( ! dynamic_sidebar( 'course-menu' ) ) : {
        if ( $post && 'course' == $post->post_type ) {
				$course_id = $post->ID;
			} else {
				$parent_id = do_shortcode( '[get_parent_course_id]' );
				$course_id = 0 != $parent_id ? $parent_id : $course_id;
			}
        echo do_shortcode( '[course_unit_archive_sidesubmenu course_id="' . $course_id . '"]' );
    }
	endif; // end sidebar widget area ?>
    <script>
 $(document).ready(function(){ // quand la page est lue par le navigateur
     $(".course-side-menu .course-structure-block li.unit").addClass("folded"); 
     $(".course-side-menu .course-structure-block li.unit > span").toggleClass("folded"); 
     $(".course-side-menu .course-structure-block li.unit.current-unit").addClass("unfolded").removeClass("folded");
     $(".course-side-menu .course-structure-block li.unit.current-unit > span").toggleClass("folded"); 
     $(".course-side-menu .course-structure-block li.unit.folded").find( '.unit-structure-modules' ).slideUp();
    
   });  
    </script>
</div>