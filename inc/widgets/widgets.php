<?php
/**
 * App Landing Page Widgets
 *
 * @package business_times
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function business_times_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'business-times' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'business-times' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	 register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar One', 'business-times' ),
		'id'            => 'footer-one',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	  register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar Two', 'business-times' ),
		'id'            => 'footer-two',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	   register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar Three', 'business-times' ),
		'id'            => 'footer-three',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
 
}
add_action( 'widgets_init', 'business_times_widgets_init' );

/**
 * Load widget featured post.
 */
require get_template_directory() . '/inc/widgets/widget-featured-post.php';

/**
 * Load widget featured post.
 */
require get_template_directory() . '/inc/widgets/widget-listed-post.php';

/**
 * Load widget social link.
 */
require get_template_directory() . '/inc/widgets/widget-social-links.php';
