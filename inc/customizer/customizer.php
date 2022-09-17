<?php
/**
 * Business Times Theme Customizer.
 *
 * @package business_times
 */

    $business_times_settings = array( 'info', 'default', 'header', 'home', 'breadcrumb', 'footer'  );

    /* Option list of all post */	
    $business_times_options_posts = array();
    $business_times_options_posts_obj = get_posts('posts_per_page=-1');
    $business_times_options_posts[''] = __( 'Choose Post', 'business-times' );
    foreach ( $business_times_options_posts_obj as $business_times_posts ) {
    	$business_times_options_posts[$business_times_posts->ID] = $business_times_posts->post_title;
    }
    
 	/* Option list of all page */   
    $business_times_options_pages = array();
    $business_times_options_pages_obj = get_pages('posts_per_page=-1');
    $business_times_options_pages[''] = __( 'Choose Page', 'business-times' );
    foreach ( $business_times_options_pages_obj as $business_times_pages ) {
        $business_times_options_pages[$business_times_pages->ID] = $business_times_pages->post_title;
    }

    /* Option list of all categories */
    $business_times_args = array(
	   'type'                     => 'post',
	   'orderby'                  => 'name',
	   'order'                    => 'ASC',
	   'hide_empty'               => 1,
	   'hierarchical'             => 1,
	   'taxonomy'                 => 'category'
    ); 
    $business_times_option_categories = array();
    $business_times_category_lists = get_categories( $business_times_args );
    $business_times_option_categories[''] = __( 'Choose Category', 'business-times' );
    foreach( $business_times_category_lists as $business_times_category ){
        $business_times_option_categories[$business_times_category->term_id] = $business_times_category->name;
    }

	foreach( $business_times_settings as $setting ){
		require get_template_directory() . '/inc/customizer/' . $setting . '.php';
	}

/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function business_times_customize_preview_js() {
    wp_enqueue_script( 'business_times_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'business_times_customize_preview_js' );
