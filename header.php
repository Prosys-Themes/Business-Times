<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business_Times
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 	
	if( function_exists('wp_body_open')){
		wp_body_open(); 
	}
?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'business-times' ); ?></a>

	<?php
		/**
		 * @hooked business_times_header_start  - 20 
		 * @hooked business_times_header_bottom - 40 
		 * @hooked business_times_header_menu 	 - 50 
		 * @hooked business_times_header_end 	 - 60 
		 * @hooked business_times_slider_cb
		 */

		do_action( 'business_times_header' );
		do_action( 'business_times_slider' ); 

		/**
		 * business_times Content
		 * 
		 * @see business_times_content_start
		*/
		do_action( 'business_times_before_content' );