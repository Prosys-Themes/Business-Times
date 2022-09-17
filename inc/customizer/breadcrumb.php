<?php
/**
 * Breadcrumbs Options
 *
 * @package business_times
 */
 
function business_times_customize_register_breadcrumbs( $wp_customize ) {

    /** BreadCrumb Settings */
    
    $wp_customize->add_section(
        'business_times_breadcrumb_settings',
        array(
            'title' => __( 'Breadcrumb Settings', 'business-times' ),
            'priority' => 50,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Enable/Disable BreadCrumb */
    $wp_customize->add_setting(
        'business_times_ed_breadcrumb',
        array(
            'default' => '',
            'sanitize_callback' => 'business_times_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_times_ed_breadcrumb',
        array(
            'label' => __( 'Enable Breadcrumb', 'business-times' ),
            'section' => 'business_times_breadcrumb_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Show/Hide Current */
    $wp_customize->add_setting(
        'business_times_ed_current',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_times_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_times_ed_current',
        array(
            'label' => __( 'Show current', 'business-times' ),
            'section' => 'business_times_breadcrumb_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Home Text */
    $wp_customize->add_setting(
        'business_times_breadcrumb_home_text',
        array(
            'default' => __( 'Home', 'business-times' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'business_times_breadcrumb_home_text',
        array(
            'label' => __( 'Breadcrumb Home Text', 'business-times' ),
            'section' => 'business_times_breadcrumb_settings',
            'type' => 'text',
        )
    );
    
    /** Breadcrumb Separator */
    $wp_customize->add_setting(
        'business_times_breadcrumb_separator',
        array(
            'default' => __( '>', 'business-times' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'business_times_breadcrumb_separator',
        array(
            'label' => __( 'Breadcrumb Separator', 'business-times' ),
            'section' => 'business_times_breadcrumb_settings',
            'type' => 'text',
        )
    );
    /** BreadCrumb Settings Ends */
    
    }
add_action( 'customize_register', 'business_times_customize_register_breadcrumbs' );
