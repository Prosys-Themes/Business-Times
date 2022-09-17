<?php
/**
 * Business Times functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Business_Times
 */

//define theme version
if ( !defined( 'BUSINESS_TIMES_THEME_VERSION' ) ) {
	$theme_data = wp_get_theme();
	
	define ( 'BUSINESS_TIMES_THEME_VERSION', $theme_data->get( 'Version' ) );

	define ( 'BUSINESS_TIMES_THEME_NAME', $theme_data->get( 'Name' ) );
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Font Awesome List
 */
require get_template_directory() . '/inc/fontawesome-list.php';

/**
 * Implement the Custom functions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Custom template function for this theme.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template hooks for this theme.
 */
require get_template_directory() . '/inc/template-hooks.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load plugin for right and no sidebar
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Load widgets.
 */
require get_template_directory() . '/inc/widgets/widgets.php';


/**
 * Custom template hooks for this theme.
 */
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';


/**
 * Getting Started.
 */
require get_template_directory() . '/inc/getting-started/getting-started.php';