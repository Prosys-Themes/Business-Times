<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Business_Times
 * @since 1.0.0
 * @version 1.0.0
 */

$slider_enable       = get_theme_mod( 'business_times_ed_slider' );
$featured_enable     = get_theme_mod( 'business_times_ed_featured_section' );
$about_enable      = get_theme_mod( 'business_times_ed_about_section');
$blog_enable         = get_theme_mod( 'business_times_ed_blog_section');
$products_enable     = get_theme_mod( 'business_times_ed_product_section' );
$cta_enable          = get_theme_mod( 'business_times_ed_cta_section' );
$teams_enable        = get_theme_mod( 'business_times_ed_teams_section' );
$testimonials_enable = get_theme_mod( 'business_times_ed_testimonials_section' );

get_header(); 
           
    if ( 'posts' == get_option( 'show_on_front' ) ) {
        include( get_home_template() );
    }elseif( $slider_enable || $featured_enable || $about_enable || $products_enable || $blog_enable || $cta_enable || $teams_enable || $testimonials_enable ){ ?>
        
        <?php
        /**
         * Home Page Contents
         * 
         * @hooked business_times_featured    - 20
         * @hooked business_times_about     - 30
         * @hooked business_times_products    - 40 
         * @hooked business_times_cta         - 60
         * @hooked business_times_team        - 80
         * @hooked business_times_testimonial - 90
         * @hooked business_times_blog        - 95 
        */
        do_action( 'business_times_home_page' );
        ?>
   
    <?php        
    }else {
        include( get_page_template() );
    }


get_footer();