<?php
/**
 * Business Times functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Business_Times
 */

if ( ! function_exists( 'business_times_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function business_times_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Business Times, use a find and replace
		 * to change 'business-times' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'business-times', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'business-times' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'business_times_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Custom Image Size
		
	    add_image_size( 'business-times-slider', 1400, 550, true );
	    add_image_size( 'business-times-with-sidebar', 833, 474, true );
	    add_image_size( 'business-times-without-sidebar', 1110, 474, true );
	    add_image_size( 'business-times-about', 560, 360, true );

	    add_image_size( 'business-times-recent-post', 78, 78, true );
	    add_image_size( 'business-times-portfolio', 230, 230, true ); 
	    add_image_size( 'business-times-three-col', 360 , 240, true );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'header-text' => array( 'site-title', 'site-description' ),
		) );
	}
endif;
add_action( 'after_setup_theme', 'business_times_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function business_times_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'business_times_content_width', 750 );
}
add_action( 'after_setup_theme', 'business_times_content_width', 0 );

/**
* Adjust content_width value according to template.
*
* @return void
*/
function business_times_template_redirect_content_width() {
	// Full Width in the absence of sidebar.
	if( is_page() ){
	   $sidebar_layout = business_times_sidebar_layout();
       if( ( $sidebar_layout == 'no-sidebar' ) || ! ( is_active_sidebar( 'right-sidebar' ) ) ) $GLOBALS['content_width'] = 1140;
        
	}elseif ( ! ( is_active_sidebar( 'right-sidebar' ) ) ) {
		$GLOBALS['content_width'] = 1170;
	}
}

/**
 * Enqueue scripts and styles.
 */
function business_times_scripts() {
	$business_times_query_args = array(
		'family' => 'Oxygen:400,700|Lato:400,700,400italic',
		);

	wp_enqueue_style( 'business-times-google-fonts', add_query_arg( $business_times_query_args, "//fonts.googleapis.com/css" ) );

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css' );
    wp_enqueue_style( 'owl-theme-default', get_template_directory_uri() . '/css/owl.theme.default.css' );
    wp_enqueue_style( 'jquery-sidr-light', get_template_directory_uri() . '/css/jquery.sidr.light.css' );
    
    if( business_times_is_woocommerce_activated() ){
	    wp_enqueue_style( 'business-times-woocommerce', get_template_directory_uri(). '/css/woocommerce.css', BUSINESS_TIMES_THEME_VERSION );
	}

    wp_enqueue_style( 'business-times-style', get_stylesheet_uri(), BUSINESS_TIMES_THEME_VERSION  );   
    

    wp_enqueue_script( 'jquery-sidr', get_template_directory_uri() . '/js/jquery.sidr.js', array('jquery'), '2.2.1', true );
	wp_enqueue_script( 'jquery-owl-carousel', get_template_directory_uri() . '/js/jquery.owl.carousel.js', array('jquery'), '2.2.1', true );
	wp_enqueue_script( 'business-times-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

    wp_register_script( 'business-times-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), BUSINESS_TIMES_THEME_VERSION , true );
    
    $slider_auto      = get_theme_mod( 'business_times_slider_auto', '1' );
    $slider_loop      = get_theme_mod( 'business_times_slider_loop', '1' );
    $slider_pager     = get_theme_mod( 'business_times_slider_pager', '1' );    
    $slider_animation = get_theme_mod( 'business_times_slider_animation', 'slide' );
    $slider_speed     = get_theme_mod( 'business_times_slider_speeds', 400 );
    $slider_pause     = get_theme_mod( 'business_times_slider_pause', 6000 );
    
    $array = array(
        'auto'      => esc_attr( $slider_auto ),
        'loop'      => esc_attr( $slider_loop ),
        'pager'     => esc_attr( $slider_pager ),
        'animation' => esc_attr( $slider_animation ),
        'speed'     => absint( $slider_speed ),
        'pause'     => absint( $slider_pause ),
    );
    
    wp_localize_script( 'business-times-custom', 'business_times_data', $array );
    wp_enqueue_script( 'business-times-custom' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'business_times_scripts' );

if ( is_admin() ) : // Load only if we are viewing an admin page

function business_times_admin_scripts() {
	
	wp_enqueue_style( 'business-times-admin-style',get_template_directory_uri().'/inc/css/admin.css', BUSINESS_TIMES_THEME_VERSION, 'screen' );
    
}

add_action( 'admin_enqueue_scripts', 'business_times_admin_scripts' );

endif;

if( ! function_exists( 'business_times_customizer_js' ) ) :
/** 
 * Registering and enqueuing scripts/stylesheets for Customizer controls.
 */ 
function business_times_customizer_js() {
    wp_enqueue_script( 'business-times-customizer-js', get_template_directory_uri() . '/inc/js/admin.js', array('jquery'), BUSINESS_TIMES_THEME_VERSION , true  );
}
endif;
add_action( 'customize_controls_enqueue_scripts', 'business_times_customizer_js' );


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function business_times_body_classes( $classes ) {
	global $post;
    $ed_slider = get_theme_mod( 'business_times_ed_slider','1' );

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if( $ed_slider && is_front_page() && !is_home() ) {
        $classes[] = 'has-slider';
    }

	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
	$classes[] = 'custom-background-image';
	}

	// Adds a class of custom-background-color to sites with a custom background color.
	if ( get_background_color() != 'ffffff' ) {
	$classes[] = 'custom-background-color';
	}

	if(is_page()){
	$business_times_post_class = business_times_sidebar_layout(); 
	if( $business_times_post_class == 'no-sidebar' )
	$classes[] = 'full-width';
	}

	if( !( is_active_sidebar( 'right-sidebar' )) || is_404() ) {
	  $classes[] = 'full-width'; 
	}

	return $classes;
}
add_filter( 'body_class', 'business_times_body_classes' );

/** 
 * Hook to move comment text field to the bottom in WP 4.4 
 *
 * @link http://www.wpbeginner.com/wp-tutorials/how-to-move-comment-text-field-to-bottom-in-wordpress-4-4/  
 */
function business_times_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}


/* Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function business_times_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'business_times_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'business_times_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so business_times_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so business_times_categorized_blog should return false.
		return false;
	}
}


/**
 * Flush out the transients used in business_times_categorized_blog.
 */
function business_times_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'business_times_categories' );
}


if ( ! function_exists( 'business_times_excerpt_more' )  ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
function business_times_excerpt_more( $more ) {
	if ( ! is_admin() ){
		return ' &hellip; ';
	}else{
		return $more;
	}

}
endif;
add_filter( 'excerpt_more', 'business_times_excerpt_more' );

if ( ! function_exists( 'business_times_excerpt_length' ) ) :
/**
 * Changes the default 55 character in excerpt 
*/
function business_times_excerpt_length( $length ) {
	if ( ! is_admin() ){
    	return 20;
	}else{
		return $length;
	}
}
endif;
add_filter( 'excerpt_length', 'business_times_excerpt_length', 999 );

/**
 * Query WooCommerce activation
 */
if ( ! function_exists( 'business_times_is_woocommerce_activated' ) ) {
	
	function business_times_is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}