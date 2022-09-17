<?php

/** 
 * Footer Settings
 */
 
function business_times_customize_register_footer( $wp_customize ) {

    /** Footer Settings */
    
    $wp_customize->add_section(
        'business_times_footer_settings',
        array(
            'title' => __( 'Footer Settings', 'business-times' ),
            'priority' => 50,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable footer */
    $wp_customize->add_setting(
        'business_times_footer_copyright_text',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'business_times_footer_copyright_text',
        array(
            'label' => __( 'Copyright Text', 'business-times' ),
            'section' => 'business_times_footer_settings',
            'type' => 'text',
        )
    );
    
}

add_action( 'customize_register', 'business_times_customize_register_footer' );