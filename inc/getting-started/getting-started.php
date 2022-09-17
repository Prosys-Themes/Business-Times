<?php
/**
 * Getting Started Page.
 *
 * @package business_times
 */

require get_template_directory() . '/inc/getting-started/class-getting-start-plugin-helper.php';

if( ! function_exists( 'business_times_getting_started_menu' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function business_times_getting_started_menu(){	
	add_theme_page(
		__( 'Getting Started', 'business-times' ),
		__( 'Getting Started', 'business-times' ),
		'manage_options',
		'business-times-getting-started',
		'business_times_getting_started_page'
	);
}
endif;
add_action( 'admin_menu', 'business_times_getting_started_menu' );

if( ! function_exists( 'business_times_getting_started_admin_scripts' ) ) :
/**
 * Load Getting Started styles in the admin
 */
function business_times_getting_started_admin_scripts( $hook ){
	// Load styles only on our page
	if( 'appearance_page_business-times-getting-started' != $hook ) return;

    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
    wp_enqueue_style( 'business-times-getting-started', get_template_directory_uri() . '/inc/getting-started/css/getting-started.css', false, BUSINESS_TIMES_THEME_VERSION );
    
    wp_enqueue_script( 'plugin-install' );
    wp_enqueue_script( 'updates' );
    wp_enqueue_script( 'business-times-getting-started', get_template_directory_uri() . '/inc/getting-started/js/getting-started.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-tabs' ), BUSINESS_TIMES_THEME_VERSION, true );
    wp_enqueue_script( 'business-times-recommended-plugin-install', get_template_directory_uri() . '/inc/getting-started/js/recommended-plugin-install.js', array( 'jquery' ), BUSINESS_TIMES_THEME_VERSION, true );    
    wp_localize_script( 'business-times-recommended-plugin-install', 'business_times_start_page', array( 'activating' => __( 'Activating ', 'business-times' ) ) );
}
endif;
add_action( 'admin_enqueue_scripts', 'business_times_getting_started_admin_scripts' );

if( ! function_exists( 'business_times_call_plugin_api' ) ) :
/**
 * Plugin API
**/
function business_times_call_plugin_api( $plugin ) {
    include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
    $call_api = plugins_api( 
        'plugin_information', 
            array(
            'slug'   => $plugin,
            'fields' => array(
                'downloaded'        => false,
                'rating'            => false,
                'description'       => false,
                'short_description' => true,
                'donate_link'       => false,
                'tags'              => false,
                'sections'          => true,
                'homepage'          => true,
                'added'             => false,
                'last_updated'      => false,
                'compatibility'     => false,
                'tested'            => false,
                'requires'          => false,
                'downloadlink'      => false,
                'icons'             => true
            )
        ) 
    );
    return $call_api;
}
endif;

if( ! function_exists( 'business_times_check_for_icon' ) ) :
/**
 * Check For Icon 
**/
function business_times_check_for_icon( $arr ) {
    if( ! empty( $arr['svg'] ) ){
        $plugin_icon_url = $arr['svg'];
    }elseif( ! empty( $arr['2x'] ) ){
        $plugin_icon_url = $arr['2x'];
    }elseif( ! empty( $arr['1x'] ) ){
        $plugin_icon_url = $arr['1x'];
    }else{
        $plugin_icon_url = $arr['default'];
    }                               
    return $plugin_icon_url;
}
endif;
if( ! function_exists( 'business_times_getting_started_page' ) ) :
/**
 * Callback function for admin page.
*/
function business_times_getting_started_page(){ ?>
	<div class="wrap getting-started">
		<h2 class="notices"></h2>
		<div class="intro-wrap">
			<div class="intro">
				<h3><?php printf( esc_html__( 'Getting started with %1$s v%2$s', 'business-times' ), BUSINESS_TIMES_THEME_NAME, BUSINESS_TIMES_THEME_VERSION ); ?></h3>
				<h4><?php printf( esc_html__( 'You will find everything you need to get started with %1$s below.', 'business-times' ), BUSINESS_TIMES_THEME_NAME ); ?></h4>
			</div>
		</div>

		<div class="panels">
			<div id="tabs">
            <ul>
                <li>
                    <a id="help" href="#tabs-1">
                        <span class="dashicons dashicons-admin-home"></span>
                        <?php esc_html_e( 'Getting Started', 'business-times' ); ?>
                    </a>
                </li>
				<li>
                    <a id="plugins" href="#tabs-2">
                        <span class="dashicons dashicons-admin-plugins"></span>
                        <?php esc_html_e( 'Recommended Plugins', 'business-times' ); ?>
                    </a>
                </li>
				
				<li>
                    <a id="support" href="#tabs-3">
                        <span class="dashicons dashicons-editor-help"></span>
                        <?php esc_html_e( "Support", "business-times" ); ?>
                    </a>
                </li>

                <li>
                    <a id="freevspro" href="#tabs-4">
                        <span class="dashicons dashicons-randomize"></span>
                        <?php esc_html_e( "Free VS Pro", "business-times" ); ?>
                    </a>
                </li>
			</ul>
            <div id="tabs-1" class="getting-started-body">
				<?php require get_template_directory() . '/inc/getting-started/tabs/general-panel.php';
                ?>
              
            </div>
            <div id="tabs-2" class="getting-started-body">
				<?php require get_template_directory() . '/inc/getting-started/tabs/plugins-panel.php'; ?>

          
			</div>
            <div id="tabs-3" class="getting-started-body">
            	<?php require get_template_directory() . '/inc/getting-started/tabs/support-panel.php'; ?>
                    
            </div>

            <div id="tabs-4" class="getting-started-body">
                <?php require get_template_directory() . '/inc/getting-started/tabs/free-vs-pro.php'; ?>
                    
            </div>
            
			<?php require get_template_directory() . '/inc/getting-started/tabs/link-panel.php'; ?>
                
            </div>
        </div>
		</div>
	</div>
	<?php
}
endif;