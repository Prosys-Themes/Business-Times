<?php
/**
 * Template Hooks
 *
 * @package business_times
 */

/**
 * Doctype
 * 
 * @see business_times_doctype_cb 
 */
add_action( 'business_times_doctype','business_times_doctype_cb' );

/**
 * Before wp_head
 * 
 * @see business_times_head
*/
add_action( 'business_times_before_wp_head', 'business_times_head' );

/**
 * Before Header
 * 
 * @see business_times_page_start - 20
*/
add_action( 'business_times_before_header', 'business_times_page_start', 20 );

/**
 * business_times Header
 * 
 * @see business_times_header_start  - 20 
 * @see business_times_header_top    - 40 
 * @see business_times_header_bottom - 50 
 * @see business_times_header_end 	  - 60 
*/

add_action( 'business_times_header', 'business_times_header_start', 20 );
add_action( 'business_times_header', 'business_times_header_top', 40 );
add_action( 'business_times_header', 'business_times_header_bottom', 50 );
add_action( 'business_times_header', 'business_times_header_end', 60 );

/**
 * Home Page Contents
 * 
 * @see business_times_featured    - 20
 * @see business_times_about     - 30
 * @see business_times_products    - 40 
 * @see business_times_cta  	    - 60
 * @see business_times_team  	    - 80
 * @see business_times_testimonial - 90
 * @see business_times_blog        - 95 
*/
add_action( 'business_times_home_page', 'business_times_featured', 20 );
add_action( 'business_times_home_page', 'business_times_about', 30 );
add_action( 'business_times_home_page', 'business_times_products', 40 );
add_action( 'business_times_home_page', 'business_times_cta', 60 );
add_action( 'business_times_home_page', 'business_times_portfolio', 70 );
add_action( 'business_times_home_page', 'business_times_team', 80 );
add_action( 'business_times_home_page', 'business_times_testimonial', 90 );
add_action( 'business_times_home_page', 'business_times_blog', 95 );



/**
 * Home Page Contents
 * 
 * @see business_times_slider_cb 	   - 10
*/
add_action( 'business_times_slider', 'business_times_slider_cb', 10 );


/**
 * business_times Content
 * 
 * @see business_times_content_start
*/
add_action( 'business_times_before_content', 'business_times_content_start' );

/**
 * Before Page entry content
 * 
 * @see business_times_page_content_image
*/
add_action( 'business_times_before_page_entry_content', 'business_times_page_content_image' );

/**
 * Before Post entry content
 * 
 * @see business_times_post_content_image - 10
 * @see business_times_post_entry_header  - 20
*/
add_action( 'business_times_before_post_entry_content', 'business_times_post_content_image', 10 );
add_action( 'business_times_before_post_entry_content', 'business_times_post_entry_header', 20 );

/**
 * After post content
 * 
 * @see business_times_post_author  - 20
*/
add_action( 'business_times_after_post_content', 'business_times_post_author', 20 );

/**
 * Comment
 * 
 * @see business_times_get_comment_section 
*/
add_action( 'business_times_comment', 'business_times_get_comment_section' );

/**
 * After Content
 * 
 * @see business_times_content_end - 20
*/
add_action( 'business_times_after_content', 'business_times_content_end', 20 );

/**
 * Numinous Footer
 * 
 * @see business_times_footer_start  - 20
 * @see business_times_footer_widgets    - 30
 * @see business_times_footer_credit - 40
 * @see business_times_footer_end    - 50
*/
add_action( 'business_times_footer', 'business_times_footer_start', 20 );
add_action( 'business_times_footer', 'business_times_footer_widgets', 30 );
add_action( 'business_times_footer', 'business_times_footer_credit', 40 );
add_action( 'business_times_footer', 'business_times_footer_end', 50 );

/**
 * After Footer
 * 
 * @see business_times_page_end - 20
*/
add_action( 'business_times_after_footer', 'business_times_back_to_top', 15 );
add_action( 'business_times_after_footer', 'business_times_page_end', 20 );