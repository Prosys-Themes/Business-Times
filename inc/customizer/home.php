<?php
/**
 * Home Page Options
 *
 * @package business_times
 */
 
function business_times_customize_register_home( $wp_customize ) {
    
    global $business_times_options_pages;
    global $business_times_options_posts;
    global $business_times_option_categories;

    if( business_times_is_woocommerce_activated() ){
        global $product;
        /* Option list of all post */ 
        $business_times_options_products = array();
        $business_times_options_products_obj = get_posts('posts_per_page=-1&post_type=product');
        $business_times_options_products[''] = __( 'Choose Product', 'business-times' );
        foreach ( $business_times_options_products_obj as $posts ) {
            $business_times_options_products[$posts->ID] = $posts->post_title;
        }

    }

    /** Home Page Settings */
    $wp_customize->add_panel( 
        'business_times_home_page_settings',
         array(
            'priority' => 30,
            'capability' => 'edit_theme_options',
            'title' => __( 'Home Page Settings', 'business-times' ),
            'description' => __( 'Customize Home Page Settings', 'business-times' ),
        ) 
    );
    
     /** Slider Settings */
    $wp_customize->add_section(
        'business_times_slider_section_settings',
        array(
            'title'     => __( 'Slider Settings', 'business-times' ),
            'priority'  => 10,
            'capability' => 'edit_theme_options',
            'panel' => 'business_times_home_page_settings'
        )
    );
   
    /** Enable/Disable Slider */
    $wp_customize->add_setting(
        'business_times_ed_slider',
        array(
            'default' => '',
            'sanitize_callback' => 'business_times_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_times_ed_slider',
        array(
            'label' => __( 'Enable Home Page Slider', 'business-times' ),
            'section' => 'business_times_slider_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Auto Transition */
    $wp_customize->add_setting(
        'business_times_slider_auto',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_times_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_times_slider_auto',
        array(
            'label' => __( 'Enable Slider Auto Transition', 'business-times' ),
            'section' => 'business_times_slider_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Loop */
    $wp_customize->add_setting(
        'business_times_slider_loop',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_times_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_times_slider_loop',
        array(
            'label' => __( 'Enable Slider Loop', 'business-times' ),
            'section' => 'business_times_slider_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Pager */
    $wp_customize->add_setting(
        'business_times_slider_pager',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_times_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_times_slider_pager',
        array(
            'label' => __( 'Enable Slider Pager', 'business-times' ),
            'section' => 'business_times_slider_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Enable/Disable Slider Caption */
    $wp_customize->add_setting(
        'business_times_slider_caption',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_times_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_times_slider_caption',
        array(
            'label' => __( 'Enable Slider Caption', 'business-times' ),
            'section' => 'business_times_slider_section_settings',
            'type' => 'checkbox',
        )
    );
        
    /** Slider Animation */
    $wp_customize->add_setting(
        'business_times_slider_animation',
        array(
            'default' => 'slide',
            'sanitize_callback' => 'business_times_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'business_times_slider_animation',
        array(
            'label' => __( 'Select Slider Animation', 'business-times' ),
            'section' => 'business_times_slider_section_settings',
            'type' => 'select',
            'choices' => array(
                'fade' => __( 'Fade', 'business-times' ),
                'slide' => __( 'Slide', 'business-times' ),
            )
        )
    );
    
    /** Slider Speed */
    $wp_customize->add_setting(
        'business_times_slider_speeds',
        array(
            'default' => 400,
            'sanitize_callback' => 'business_times_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
        'business_times_slider_speeds',
        array(
            'label' => __( 'Slider Speed', 'business-times' ),
            'section' => 'business_times_slider_section_settings',
            'type' => 'text',
        )
    );
    
    /** Slider Pause */
    $wp_customize->add_setting(
        'business_times_slider_pause',
        array(
            'default' => 6000,
            'sanitize_callback' => 'business_times_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
        'business_times_slider_pause',
        array(
            'label' => __( 'Slider Pause', 'business-times' ),
            'section' => 'business_times_slider_section_settings',
            'type' => 'text',
        )
    );
    
    for( $i=1; $i<=3; $i++){  
        /** Select Slider Post */
        $wp_customize->add_setting(
            'business_times_slider_post_'.$i,
            array(
                'default' => '',
                'sanitize_callback' => 'business_times_sanitize_select',
            )
        );
        
        $wp_customize->add_control(
            'business_times_slider_post_'.$i,
            array(
                'label' => __( 'Select Post ', 'business-times' ).$i,
                'section' => 'business_times_slider_section_settings',
                'type' => 'select',
                'choices' => $business_times_options_posts,
            )
        );
    }

     /** Slider Readmore */
    $wp_customize->add_setting(
        'business_times_slider_readmore',
        array(
            'default' => __( 'Learn More', 'business-times' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'business_times_slider_readmore',
        array(
            'label' => __( 'Readmore Text', 'business-times' ),
            'section' => 'business_times_slider_section_settings',
            'type' => 'text',
        )
    );
    
    /** Slider Settings Ends */
    
    /** Featured Section */
    $wp_customize->add_section(
        'business_times_feature_section_settings',
        array(
            'title' => __( 'Featured Section', 'business-times' ),
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'panel' => 'business_times_home_page_settings'
        )
    );
    
    /** Enable/Disable Featured Section */
    $wp_customize->add_setting(
        'business_times_ed_featured_section',
        array(
            'default' => '',
            'sanitize_callback' => 'business_times_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_times_ed_featured_section',
        array(
            'label' => __( 'Enable Featured Post Section', 'business-times' ),
            'section' => 'business_times_feature_section_settings',
            'type' => 'checkbox',
        )
    );
       
    /** Enable/Disable Featured Section Icon*/
    $wp_customize->add_setting(
        'business_times_ed_featured_icon',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_times_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_times_ed_featured_icon',
        array(
            'label' => __( 'Enable Featured Post Icon', 'business-times' ),
            'section' => 'business_times_feature_section_settings',
            'type' => 'checkbox',
        )
    );

    for( $i=1; $i<=4; $i++){  
    
        /** featured Post */
        $wp_customize->add_setting(
            'business_times_feature_post_'.$i,
            array(
                'default' => '',
                'sanitize_callback' => 'business_times_sanitize_select',
            ));
        
        $wp_customize->add_control(
            'business_times_feature_post_'.$i,
            array(
                'label' => __( 'Select Featured Post ', 'business-times' ) .$i ,
                'section' => 'business_times_feature_section_settings',
                'type' => 'select',
                'choices' => $business_times_options_posts
            ));

         $wp_customize->add_setting(
            'business_times_feature_icon_'.$i,
            array(
                'default'           => 'fa-bell',
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'postMessage'
            )
        );

        $wp_customize->add_control(
            'business_times_feature_icon_'.$i,
            array(
                'label'   => __( 'Font Awesome Icon', 'business-times' ) .$i ,
                'section' => 'business_times_feature_section_settings',
                'type'    => 'text',
            ));
        
    }

    /** About Section Settings */
    $wp_customize->add_section(
        'business_times_about_section_settings',
        array(
            'title' => __( 'About Section', 'business-times' ),
            'priority' => 30,
            'capability' => 'edit_theme_options',
            'panel' => 'business_times_home_page_settings'
        )
    );
    
    /** Enable about Section */   
    $wp_customize->add_setting(
        'business_times_ed_about_section',
        array(
            'default' => '',
            'sanitize_callback' => 'business_times_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_times_ed_about_section',
        array(
            'label' => __( 'Enable About Section', 'business-times' ),
            'section' => 'business_times_about_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** About Section Ends */

    /* Featured Product Section*/
     $wp_customize-> add_section(
        'business_times_featured_product_settings',
        array(
            'title'=> __('Featured Product Section','business-times'),
            'priority'=> 40,
            'panel'=> 'business_times_home_page_settings'
            )
        );

    /** Enable/Disable product Section */
    $wp_customize->add_setting(
        'business_times_ed_product_section',
        array(
            'default' => '',
            'sanitize_callback' => 'business_times_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_times_ed_product_section',
        array(
            'label' => __( 'Enable Featured Product Section', 'business-times' ),
            'section' => 'business_times_featured_product_settings',
            'type' => 'checkbox',
            'description' => __( 'Please Enable Woocommerce to display items in Featured Products.', 'business-times'),
        )
    );
    
    /*select page for Product section*/
    $wp_customize->add_setting(
        'business_times_featured_product_page',
        array(
            'default' => '',
            'sanitize_callback' => 'business_times_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'business_times_featured_product_page',
        array(
            'label' => __( 'Select Page', 'business-times' ),
            'section' => 'business_times_featured_product_settings',
            'type' => 'select',
            'choices' => $business_times_options_pages,
        )
    );

   if( business_times_is_woocommerce_activated() ){
    
        for( $i=1; $i<=10; $i++){  
            /** Select Slider Post */
            $wp_customize->add_setting(
                'business_times_product_post_'.$i,
                array(
                    'default' => '',
                    'sanitize_callback' => 'business_times_sanitize_select',
                )
            );
            
            $wp_customize->add_control(
                'business_times_product_post_'.$i,
                array(
                    'label' => __( 'Select Product ', 'business-times' ).$i,
                    'section' => 'business_times_featured_product_settings',
                    'type' => 'select',
                    'choices' => $business_times_options_products,
                )
            );
        }
    
    }
  
    /** cta Section Settings */
    $wp_customize->add_section(
        'business_times_cta_section_settings',
        array(
            'title' => __( 'CTA Section', 'business-times' ),
            'priority' => 50,
            'capability' => 'edit_theme_options',
            'panel' => 'business_times_home_page_settings'
        )
    );
    
    /** Enable cta Section */   
    $wp_customize->add_setting(
        'business_times_ed_cta_section',
        array(
            'default' => '',
            'sanitize_callback' => 'business_times_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_times_ed_cta_section',
        array(
            'label' => __( 'Enable cta Us Section', 'business-times' ),
            'section' => 'business_times_cta_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** CTA Section Title */
    $wp_customize->add_setting(
        'business_times_cta_section_page',
        array(
            'default'=> '',
            'sanitize_callback'=> 'sanitize_text_field'
            )
        );
    
    $wp_customize-> add_control(
        'business_times_cta_section_page',
        array(
              'label' => __('Select Page','business-times'),
              'description' => __( 'Featured Image of Selected Page will be set as Background Image of this section.', 'business-times' ),
              'type' => 'select',
              'choices' => $business_times_options_pages,
              'section' => 'business_times_cta_section_settings', 
              
        )
    );
    

    /** CTA First Button */
    $wp_customize->add_setting(
        'business_times_cta_section_button_one',
        array(
            'default'=> __( 'About Us', 'business-times' ),
            'sanitize_callback'=> 'sanitize_text_field'
            )
        );
    
    $wp_customize-> add_control(
        'business_times_cta_section_button_one',
        array(
              'label' => __('CTA Button','business-times'),
              'section' => 'business_times_cta_section_settings', 
              'type' => 'text',
            ));

    /** CTA First Button Link */
    $wp_customize->add_setting(
        'business_times_cta_button_one_url',
        array(
            'default'=> '#',
            'sanitize_callback'=> 'esc_url_raw'
            )
        );
    
    $wp_customize-> add_control(
        'business_times_cta_button_one_url',
        array(
              'label' => __('CTA Button Link','business-times'),
              'section' => 'business_times_cta_section_settings', 
              'type' => 'text',
            ));

    /* Portfolio Section*/
     $wp_customize-> add_section(
        'business_times_portfolio_settings',
        array(
            'title'=> __('Portfolio Section','business-times'),
            'priority'=> 60,
            'panel'=> 'business_times_home_page_settings'
            )
        );

    /** Enable/Disable portfolio Section */
    $wp_customize->add_setting(
        'business_times_ed_portfolio_section',
        array(
            'default' => '',
            'sanitize_callback' => 'business_times_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_times_ed_portfolio_section',
        array(
            'label' => __( 'Enable Portfolio Section', 'business-times' ),
            'section' => 'business_times_portfolio_settings',
            'type' => 'checkbox',
            'description' => __( 'Select posts for portfolio.', 'business-times'),
        )
    );
    
    /*select page for Portfolio section*/
    $wp_customize->add_setting(
        'business_times_portfolio_page',
        array(
            'default' => '',
            'sanitize_callback' => 'business_times_sanitize_select',
        )
    );
    
    $wp_customize->add_control(
        'business_times_portfolio_page',
        array(
            'label' => __( 'Select Page', 'business-times' ),
            'section' => 'business_times_portfolio_settings',
            'type' => 'select',
            'choices' => $business_times_options_pages,
        )
    );

    for( $i=1; $i<=6; $i++){  
        /** Select Post */
        $wp_customize->add_setting(
            'business_times_portfolio_'.$i,
            array(
                'default' => '',
                'sanitize_callback' => 'business_times_sanitize_select',
            )
        );
        
        $wp_customize->add_control(
            'business_times_portfolio_'.$i,
            array(
                'label' => __( 'Select Post', 'business-times' ).$i,
                'section' => 'business_times_portfolio_settings',
                'type' => 'select',
                'choices' => $business_times_options_posts,
            )
        );
    }
    

    /** Teams Section Settings */
    $wp_customize->add_section(
        'business_times_teams_section_settings',
        array(
            'title' => __( 'Teams Section', 'business-times' ),
            'priority' => 70,
            'capability' => 'edit_theme_options',
            'panel' => 'business_times_home_page_settings'
        )
    );

    /** Enable Teams Section */   
    $wp_customize->add_setting(
        'business_times_ed_teams_section',
        array(
            'default' => '',
            'sanitize_callback' => 'business_times_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_times_ed_teams_section',
        array(
            'label' => __( 'Enable Teams Section', 'business-times' ),
            'section' => 'business_times_teams_section_settings',
            'type' => 'checkbox',
        ));
    
    /** Section Title */
    $wp_customize->add_setting(
        'business_times_teams_section_title',
        array(
            'default'=> '',
            'sanitize_callback'=> 'sanitize_text_field'
            )
        );
    $wp_customize-> add_control(
        'business_times_teams_section_title',
        array(
              'label' => __('Select Page','business-times'),
              'type' => 'select',
              'choices' => $business_times_options_pages,
              'section' => 'business_times_teams_section_settings', 
         
        ));

    /** Select Teams Category */
    $wp_customize->add_setting(
        'business_times_team_category',
        array(
            'default' => '',
            'sanitize_callback' => 'business_times_sanitize_select',
        ));
    
    $wp_customize->add_control(
        'business_times_team_category',
        array(
            'label' => __( 'Select Teams Category', 'business-times' ),
            'section' => 'business_times_teams_section_settings',
            'type' => 'select',
            'choices' => $business_times_option_categories
        ));


    
    /** Testimonials Section Settings */
    $wp_customize->add_section(
        'business_times_testimonials_section_settings',
        array(
            'title' => __( 'Testimonials Section', 'business-times' ),
            'priority' => 80,
            'capability' => 'edit_theme_options',
            'panel' => 'business_times_home_page_settings'
        )
    );

    /** Enable Testimonials Section */   
    $wp_customize->add_setting(
        'business_times_ed_testimonials_section',
        array(
            'default' => '',
            'sanitize_callback' => 'business_times_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_times_ed_testimonials_section',
        array(
            'label' => __( 'Enable Testimonials Section', 'business-times' ),
            'section' => 'business_times_testimonials_section_settings',
            'type' => 'checkbox',
        ));
    
    /** Section Title */
    $wp_customize->add_setting(
        'business_times_testimonials_section_title',
        array(
            'default'=> '',
            'sanitize_callback'=> 'sanitize_text_field'
            )
        );
    $wp_customize-> add_control(
        'business_times_testimonials_section_title',
        array(
              'label' => __('Select Page','business-times'),
              'type' => 'select',
              'choices' => $business_times_options_pages,
              'section' => 'business_times_testimonials_section_settings', 
         
            ));

    /** Select Testimonials Category */
    $wp_customize->add_setting(
        'business_times_testimonial_category',
        array(
            'default' => '',
            'sanitize_callback' => 'business_times_sanitize_select',
        ));
    
    $wp_customize->add_control(
        'business_times_testimonial_category',
        array(
            'label' => __( 'Select Testimonial Category', 'business-times' ),
            'section' => 'business_times_testimonials_section_settings',
            'type' => 'select',
            'choices' => $business_times_option_categories
        ));


      

    /** Blog Section Settings */
    $wp_customize->add_section(
        'business_times_blog_section_settings',
        array(
            'title' => __( 'Blog Section', 'business-times' ),
            'priority' => 90,
            'capability' => 'edit_theme_options',
            'panel' => 'business_times_home_page_settings'
        )
    );
    
   /** Enable Blog Section */
    $wp_customize->add_setting(
        'business_times_ed_blog_section',
        array(
            'default' => '',
            'sanitize_callback' => 'business_times_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_times_ed_blog_section',
        array(
            'label' => __( 'Enable Blog Section', 'business-times' ),
            'section' => 'business_times_blog_section_settings',
            'type' => 'checkbox',
        )
    );
    
    /** Show/Hide Blog Date */
    $wp_customize->add_setting(
        'business_times_ed_blog_date',
        array(
            'default' => '1',
            'sanitize_callback' => 'business_times_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'business_times_ed_blog_date',
        array(
            'label' => __( 'Show Posts Date, Author, Comment, Category', 'business-times' ),
            'section' => 'business_times_blog_section_settings',
            'type' => 'checkbox',
        )
    );
     
    /** Blog Section Title */
    $wp_customize->add_setting(
        'business_times_blog_section_title',
        array(
            'default'=> '',
            'sanitize_callback'=> 'sanitize_text_field'
        ));
    
    $wp_customize-> add_control(
        'business_times_blog_section_title',
        array(
              'label' => __('Select Page','business-times'),
              'type' => 'select',
              'choices' => $business_times_options_pages,
              'section' => 'business_times_blog_section_settings', 
          
        ));

    /** Select Blog Category */
    $wp_customize->add_setting(
        'business_times_blog_section_category',
        array(
            'default' => '',
            'sanitize_callback' => 'business_times_sanitize_select',
        ));
    
    $wp_customize->add_control(
        'business_times_blog_section_category',
        array(
            'label' => __( 'Select Blogs Category', 'business-times' ),
            'section' => 'business_times_blog_section_settings',
            'type' => 'select',
            'choices' => $business_times_option_categories
        ));

    /** Blog Section Read More Text */
    $wp_customize->add_setting(
        'business_times_blog_section_readmore',
        array(
            'default' => __( 'Read More', 'business-times' ),
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    
    $wp_customize->add_control(
        'business_times_blog_section_readmore',
        array(
            'label' => __( 'Blog Section Read More Text', 'business-times' ),
            'section' => 'business_times_blog_section_settings',
            'type' => 'text',
        )
    );

    /** Blog Section Read More Url */
    $wp_customize->add_setting(
        'business_times_blog_section_url',
        array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'business_times_blog_section_url',
        array(
            'label' => __( 'Blog Page url', 'business-times' ),
            'section' => 'business_times_blog_section_settings',
            'type' => 'text',
        )
    );
    /** Blog Section Ends */
    
}
add_action( 'customize_register', 'business_times_customize_register_home' );
