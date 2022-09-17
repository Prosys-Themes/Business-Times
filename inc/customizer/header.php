<?php
/**
 * Headers Options
 *
 * @package business_times
 */
 
function business_times_customize_register_header_contact( $wp_customize ) {

    /** Header Settings */
    
    $wp_customize->add_section(
        'business_times_header_settings',
        array(
            'title' => __( 'Header Settings', 'business-times' ),
            'priority' => 20,
            'capability' => 'edit_theme_options',
        )
    );
    
    
    /** Home Text */
    $wp_customize->add_setting(
        'business_times_phone',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'business_times_phone',
        array(
            'label' => __( 'Phone Number', 'business-times' ),
            'section' => 'business_times_header_settings',
            'type' => 'text',
        )
    );
    
    /** Header Separator */
    $wp_customize->add_setting(
        'business_times_email',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'business_times_email',
        array(
            'label' => __( 'Email Address', 'business-times' ),
            'section' => 'business_times_header_settings',
            'type' => 'text',
        )
    );
    /** Header Settings Ends */
    
    }
add_action( 'customize_register', 'business_times_customize_register_header_contact' );
