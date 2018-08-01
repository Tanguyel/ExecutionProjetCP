<?php
/*
* Generated By Orbisius Child Theme Creator - your favorite plugin for Child Theme creation :)
* https://wordpress.org/plugins/orbisius-child-theme-creator/
*
* Unlike style.css, the functions.php of a child theme does not override its counterpart from the parent.
* Instead, it is loaded in addition to the parent’s functions.php. (Specifically, it is loaded right before the parent theme's functions.php).
* Source: http://codex.wordpress.org/Child_Themes#Using_functions.php
*
* Be sure not to define functions, that already exist in the parent theme!
* A common pattern is to prefix function names with the (child) theme name.
* Also if the parent theme supports pluggable functions you can use function_exists( 'put_the_function_name_here' ) checks.
*/

/**
 * Loads parent and child themes' style.css
 */
function orbisius_ctc_coursepress_child_theme_enqueue_styles() {
    $parent_style = 'orbisius_ctc_coursepress_parent_style';
    $parent_base_dir = 'coursepress';

    wp_enqueue_style( $parent_style,
        get_template_directory_uri() . '/style.css',
        array(),
        wp_get_theme( $parent_base_dir ) ? wp_get_theme( $parent_base_dir )->get('Version') : ''
    );
/*
    wp_enqueue_style( $parent_style . '_child_style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );*/
}

add_action( 'wp_enqueue_scripts', 'orbisius_ctc_coursepress_child_theme_enqueue_styles' );



/**
 * Register widgetized area and update sidebar with default widgets.
 */
add_action( 'widgets_init', 'executionprojet_widgets_init' );

if ( ! function_exists( 'executionprojet_widgets_init' ) ) :

	function executionprojet_widgets_init() {
        register_sidebar(
            array(
				'name' => __( 'Home Footer', 'cp' ),
				'id' => 'home-footer',
                'description' => __( 'Footer section de la page d\'acceuil avec trois emplacement pour des widgets' ),
				'before_widget' => '<div id="%1$s" class="widget home-footer-widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h3 class="widget-title">',
				'after_title' => '</h3>',
			)
        );
        register_sidebar(
            array(
				'name' => __( 'Home Sidebar', 'cp' ),
				'id' => 'home-sidebar',
                'description' => __( 'Side bar of the home page' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h1 class="widget-title">',
				'after_title' => '</h1>',
			)
        );
        register_sidebar(
			array(
				'name' => __( 'Course Sidebar', 'cp' ),
				'id' => 'course-sidebar',
                'description' => __( 'Side bar affiché lors du déroulement du cours' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h1 class="widget-title">',
				'after_title' => '</h1>',
			)
		);
        register_sidebar(
            array(
				'name' => __( 'Course menu', 'cp' ),
				'id' => 'course-menu',
                'description' => __( 'Side bar retractable avec menu et programe du cours' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h1 class="widget-title">',
				'after_title' => '</h1>',
			)
        );
        register_sidebar(
            array(
				'name' => __( 'WooCommerce Sidebar', 'cp' ),
				'id' => 'woocommerce-sidebar',
                'description' => __( 'Side bar for the WooCommerce pages' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h2 class="widget-title">',
				'after_title' => '</h2>',
			)
        );
        register_sidebar(
            array(
				'name' => __( 'Landing Page Sidebar', 'cp' ),
				'id' => 'landing-sidebar',
                'description' => __( 'Side bar for the Landing Pages' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget' => '</aside>',
				'before_title' => '<h2 class="widget-title">',
				'after_title' => '</h2>',
			)
        );
	}
endif;

function EP_scripts() {
    wp_enqueue_script( 'tarteaucitron', '/tarteaucitron/tarteaucitron.js' );
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/font-awesome/css/font-awesome.min.css' );
    wp_enqueue_style( 'google_fonts_Raleway', 'https://fonts.googleapis.com/css?family=Raleway' );
    wp_enqueue_style( 'google_fonts_SourceSansPro', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro' );
    wp_dequeue_style( 'google_fonts_lato' );
    wp_dequeue_style( 'google_fonts_dosis' );
}



add_action( 'wp_enqueue_scripts', 'EP_scripts', 100 );

add_shortcode( 'course_unit_archive_sidesubmenu', 'course_unit_archive_sidesubmenu');

/*
//empêcher l'éditeur wysiwyg d'ajouter des balises <p> et <br> :
//sur les fichiers 'content'
remove_filter( 'the_content', 'wpautop' );
//sur les fichiers 'exerpt'
remove_filter( 'the_excerpt', 'wpautop' );

*/


//enleve la colorisation des titres par CoursePress
//remove_filter( 'widget_title', 'coursepress_colorize_title' ); 
//ne marche pas surement car l'ajout dans le theme parent se fait apres
// --> 
if ( ! function_exists( 'coursepress_colorize_title' ) ) :

	function coursepress_colorize_title( $old_title ) {
		return $old_title;
	}
endif;


if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    // additional image sizes
    // delete the next line if you do not need additional image sizes
    
}
add_image_size( 'home-thumbnail', 180, 180, true ); 

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

function course_unit_archive_sidesubmenu( $atts ) {
    extract( shortcode_atts(
        array(
            'course_id' => CoursePress_Helper_Utility::the_course( true ),
        ),
        $atts,
        'course_unit_archive_submenu'
    ) );

    $course_id = (int) $course_id;

    if ( empty( $course_id ) ) { return ''; }

    $subpage = CoursePress_Helper_Utility::the_course_subpage();
    $course_status = get_post_status( $course_id );
    $course_base_url = CoursePress_Data_Course::get_course_url( $course_id );
    $course_structure = do_shortcode( '[course_structure course_id="' . $course_id . '" free_show="false" label="" ]' );

    $content = '
    <div class="submenu-main-container cp-submenu">
        <ul id="submenu-main" class="submenu nav-submenu">
            <li class="submenu-item submenu-units ' . ( 'units' == $subpage ? 'submenu-active' : '' ) . '">
                <input type="checkbox"/><span class="icon"></span>
                    <a href="' . esc_url_raw( $course_base_url . CoursePress_Core::get_slug( 'unit/' ) ) . '" class="course-units-link">' . esc_html__( 'Units', 'cp' ) . '</a>
                    ' . $course_structure . '
                    </li>
    ';

    $student_id = is_user_logged_in() ? get_current_user_id() : false;
    $enrolled = ! empty( $student_id ) ? CoursePress_Data_Course::student_enrolled( $student_id, $course_id ) : false;
    $instructors = CoursePress_Data_Course::get_instructors( $course_id );
    $is_instructor = in_array( $student_id, $instructors );


    if ( $enrolled || $is_instructor ) {
        $content .= '
            <li class="submenu-item submenu-notifications ' . ( 'notifications' == $subpage ? 'submenu-active' : '' ) . '"><span class="icon"></span><a href="' . esc_url_raw( $course_base_url . CoursePress_Core::get_slug( 'notification' ) ) . '">' . esc_html__( 'Notifications', 'cp' ) . '</a></li>
        ';
    }

    $pages = CoursePress_Data_Course::allow_pages( $course_id );

    if ( $pages['course_discussion'] && ( $enrolled || $is_instructor ) ) {
        $content .= '<li class="submenu-item submenu-discussions ' . ( 'discussions' == $subpage ? 'submenu-active' : '' ) . '"><span class="icon"></span><a href="' . esc_url_raw( $course_base_url . CoursePress_Core::get_slug( 'discussion' ) ) . '">' . esc_html__( 'Discussions', 'cp' ) . '</a></li>';
    }

    if ( $pages['workbook'] && $enrolled ) {
        $content .= '<li class="submenu-item submenu-workbook ' . ( 'workbook' == $subpage ? 'submenu-active' : '' ) . '"><span class="icon"></span><a href="' . esc_url_raw( $course_base_url . CoursePress_Core::get_slug( 'workbook' ) ) . '">' . esc_html__( 'Workbook', 'cp' ) . '</a></li>';
    }

    if ( $pages['grades'] && $enrolled ) {
        $content .= '<li class="submenu-item submenu-grades ' . ( 'grades' == $subpage ? 'submenu-active' : '' ) . '"><span class="icon"></span><a href="' . esc_url_raw( $course_base_url . CoursePress_Core::get_slug( 'grades' ) ) . '">' . esc_html__( 'Grades', 'cp' ) . '</a></li>';
    }

    $content .= '<li class="submenu-item submenu-info"><span class="icon"></span><a href="' . esc_url_raw( $course_base_url ) . '">' . esc_html__( 'Course Details', 'cp' ) . '</a></li>';

    $show_link = false;

    $show_link = CoursePress_Data_Certificate::is_enabled() && CoursePress_Data_Student::is_enrolled_in_course( $student_id, $course_id );

    if ( is_user_logged_in() && $show_link ) {
        // COMPLETION LOGIC.
        if ( CoursePress_Data_Student::is_course_complete( get_current_user_id(), $course_id ) ) {
            $certificate = CoursePress_Data_Certificate::get_certificate_link( get_current_user_id(), $course_id, __( 'Certificate', 'cp' ) );

            $content .= '<li class="submenu-item submenu-certificate ' . ( 'certificate' == $subpage ? 'submenu-active' : '') . '"><span class="icon"></span>' . $certificate . '</li>';
        }
    }

    $content .= '
        </ul>
    </div>
    ';

    return $content;
}



if ( ! function_exists( 'coursepress_comment' ) ) :

	/**
	 * Template for comments and pingbacks.
	 *
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 */
	function coursepress_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;

		if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

			<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
				<div class="comment-body">
					<?php
					esc_html_e( 'Pingback:', 'cp' );
					comment_author_link();
					edit_comment_link(
						__( 'Edit', 'cp' ),
						'<span class="edit-link">',
						'</span>'
					);
					?>
				</div>
			</li>

		<?php else : ?>

			<?php $class = empty( $args['has_children'] ) ? '' : 'parent'; ?>
			<li id="comment-<?php comment_ID(); ?>" <?php comment_class( $class ); ?>>
				<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
					<header class="comment-meta">
                        <div class="comment-title">
				            <span class="comment-author"><?php echo get_comment_author_link() ?></span>
                            <span><?php echo __( ' le ' ) ?></span>
                            <span class="comment-date">
                                <time datetime="<?php comment_time( 'c' ); ?>">
                                    <?php
                                    printf(
                                        get_comment_date()
                                    );
                                    ?>
                                </time>
                            </span><!-- .comment-date -->
                            <span><?php echo ' : ' ?></span>
                        </div>
                        <?php
                        edit_comment_link(
                            esc_html__( 'Edit', 'cp' ),
                            '<div class="edit-link">',
                            '</div>'
                        );
                        ?>

                        <?php if ( '0' == $comment->comment_approved ) : ?>
                            <p class="comment-awaiting-moderation">
                                <?php esc_html_e( 'Your comment is awaiting moderation.', 'cp' ); ?>
                            </p>
                        <?php endif; ?>
					</header><!-- .comment-meta -->
                    <?php
							if ( 0 != $args['avatar_size'] ) {
								echo get_avatar( $comment, $args['avatar_size'] );
							}
                    ?>
					<div class="comment-content">
						<?php comment_text(); ?>
					</div><!-- .comment-content -->

					<?php
					comment_reply_link(
						array_merge(
							$args,
							array(
								'add_below' => 'div-comment',
								'depth' => $depth,
								'max_depth' => $args['max_depth'],
								'before' => '<div class="reply calltoaction-buton cyan">',
								'after' => '</div>',
							)
						)
					);
					?>
				</article><!-- .comment-body -->
			</li>
		<?php
		endif;
	}
endif; // ends check for coursepress_comment()


if ( ! function_exists( 'ep_socialshare' ) ) :
    
    function ep_socialshare( $type='clasic' ) {
        
        
        if ( $type == 'course') {
            $mail_content = __( 'Regarde la formation que j\'ai trouvé, je pense que cela peut t\'interesé. %0D%0A %0D%0A / %0D%0A %0D%0A' , 'cp') ;
            $mail_content .= __( 'J\'ai trouvé cette formation en ligne en management de projet, je souhaitrerais m\'y inscrire. %0D%0A Pouvons nous en discuter ? ');
            $mail_content .= '%0D%0A %0D%0A' ;
            $mail_content .= __( 'Voici le lien : ') ; 
            $mail_content .= get_the_permalink();
            
            $mail_title = __( 'J\'ai trouvé cette formation : ' , 'cp' );
            $mail_title .= get_the_title();
            
        } else {
            $mail_content = __( 'Regarde ce que j\'ai trouvé, je pense que cela peut t\'interesé. ' , 'cp' );
            $mail_content .= '%0D%0A %0D%0A' ;
            $mail_content .= __( 'Voici le lien : ') ; 
            $mail_content .= get_the_permalink();
            
            $mail_title = __( 'J\'ai trouvé ca : ' , 'cp' );
            $mail_title .= get_the_title();
        }

        
            
        ?>
        <div class="social">
			<span class="social-intro">
				<?php _e( 'Share the love : ', 'cp' ); ?>
			</span>
            <div class="fb-like" data-layout="button_count" data-action="like" data-share="true"></div>
            <span class="tacLinkedin"></span><script type="IN/Share" data-counter="right"></script>
            <span class="tacTwitter"></span>
                <a href="https://twitter.com/share" class="twitter-share-button" data-via="twitter_username" data-count="horizontal" data-dnt="true"></a>
            <span class="email-share"><a href="mailto:?subject=<?php echo $mail_title; ?>&body=<?php echo $mail_content; ?>" target="_top" class="email-share"><i class="fa fa-envelope-o" aria-hidden="true"></i><span><?php _e( 'Mail', 'cp' ); ?></span></a></span>
        </div>
        <?php
        return;
    }
endif;


if ( ! function_exists( 'ep_disable_cta' ) ) :
    function ep_disable_cta($exclude) {
        $exclude[] = 'page';
        $exclude[] = 'course';
        return $exclude;
    }
endif;

add_filter( 'cta_excluded_post_types', 'ep_disable_cta');


/*-----------------------------------------------------------------------------------*/
/*  Breadcrumbs with Google Frienldy Rich Snippet Tools
/*-----------------------------------------------------------------------------------*/
if (!function_exists('ep_breadcrumb')) {
    function ep_breadcrumb() {

        $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
        $delimiter = '<span class="delimiter">&raquo;</span>'; // delimiter between crumbs
        $home = sprintf( __( "Acceuil","ep_cp")); // text for the 'Home' link
        $before = '<span class="current">'; // tag before the current crumb
        $after = '</span>'; // tag after the current crumb
        $position = 1;

        global $post;
        
        ?>
        <ul itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="' <?php echo home_url(); ?>">
                    <span itemprop="name"><?php echo $home; ?></span>
                    <meta itemprop="position" content="<?php echo $position; ?>" />
                </a>
            </li>
        <?php
        $position = $position + 1; 
        
        if (is_category() || is_single()) {
            $categories = get_the_category();
            $output = '';
            
            if (get_post_type() == 'course') {
                echo $delimiter; 
                $course_home = CoursePress_Core::get_slug( 'course', true );
                ?>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="<?php echo $course_home; ?>" itemscope itemtype="http://schema.org/Thing" itemprop="item">
                    <span itemprop="name">Formation </span>
                </a>
                <meta itemprop="position" content="<?php echo $position; ?>" />
            </li> 
                <?php
                $position = $position + 1; 
            }
            if (get_post_type() == 'post') {
                echo $delimiter; 
                ?>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="" itemscope itemtype="http://schema.org/Thing" itemprop="item">
                    <span itemprop="name">Articles</span>
                </a>
                <meta itemprop="position" content="<?php echo $position; ?>" />
            </li> 
                <?php
                $position = $position + 1; 
            }
            
            if($categories){
                if (get_post_type() != 'course') { 
                    echo $delimiter; 
                    ?>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a href="<?php echo get_category_link( $categories[0]->term_id ); ?>" itemscope itemtype="http://schema.org/Thing" itemprop="item">
                    <span itemprop="name"><?php echo $categories[0]->cat_name; ?></span>
                </a>
                <meta itemprop="position" content="<?php echo $position; ?>" />
            </li>';
                    <?php
                    $position = $position + 1; 
                }
            }
            if (is_single()) {
                echo $delimiter; 
                    ?>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <span itemprop="name"><?php echo the_title(); ?></span>
                <meta itemprop="position" content="<?php echo $position; ?>" />
            </li>
                    <?php
            } elseif (is_page()) {
                echo $delimiter; 
                    ?>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <span itemprop="name"><?php echo the_title(); ?></span>
                <meta itemprop="position" content="<?php echo $position; ?>" />
            </li>
                    <?php
            }
        }
        echo '</ul>';
    }
}


if (function_exists(‘camera_main_ss_add’)) {
add_action(‘admin_init’,’camera_main_ss_add’);
}

/*
function register_cp_widget_help() {
		register_widget( 'CoursePress_Widget_Help' );
	}
add_action( 'widgets_init', 'register_cp_widget_help' );



class CoursePress_Widget_Help extends WP_Widget {
/*	public static function init() {
		add_action( 'widgets_init', array( 'CoursePress_Widget_Help', 'register' ) );
	}

	public static function register() {
		register_widget( 'CoursePress_Widget_Help' );
	}
*/ /*
	public function __construct() {
		$widget_ops = array(
			'classname' => 'cp_course_help',
			'description' => __( 'A small space giving instruction to get help', 'cp' ),
		);

		parent::__construct( 'CP_Widget_Help', __( 'Course Help', 'cp' ), $widget_ops );

	}

	public function form( $instance ) {
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = esc_attr( $instance['title'] );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'cp' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>"/>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	public function widget( $args, $instance ) {
		extract( $args, EXTR_SKIP );

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? __( 'Course Help', 'cp' ) : $instance['title'], $instance, $this->id_base );
        $course_id = CoursePress_Helper_Utility::the_course( true );
        $course_id = (int) $course_id;
        $course_base_url = CoursePress_Data_Course::get_course_url( $course_id );

		echo $before_widget;

		if ( $title && ! empty( $title ) ) {
			echo $before_title . $title . $after_title;
		}
		?>
		<ul>
            <li>N'hesitez pas à poser une question sur le <a href="<?php echo esc_url_raw( $course_base_url . CoursePress_Core::get_slug( 'discussion' ) ); ?>"><?php echo esc_html__( 'Discussions', 'cp' ); ?></a></li>
            <li>Vous pouvez aussi <a href="http://www.executionprojet.fr/contact/">contacter le formateur</a></li>
		</ul>
		<?php
		echo $after_widget;
	}
}

*/