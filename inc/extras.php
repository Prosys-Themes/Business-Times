<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package business_times
 */

if( ! function_exists( 'business_times_categories' ) ) :
/**
 * Function that list categories
*/
function business_times_categories( $blog = false ){
    
    $categories_list = get_the_category_list( esc_html( ', ' ) ); 
    if ( $categories_list && business_times_categorized_blog() ) {
        printf( '<span class="category">' . esc_html( '%1$s' ) . '</span>', $categories_list ); // WPCS: XSS OK.
    }
}
endif;

if( ! function_exists( 'business_times_comments' ) ) :
/**
 * Function that list categories
*/
function business_times_comments( $blog = false ){

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'business-times' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}
}
endif;


if ( ! function_exists( 'business_times_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function business_times_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);

		echo '<span class="posted-on"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></span><span class="byline"><span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span></span>'; // WPCS: XSS OK.

	}
endif;



if ( ! function_exists( 'business_times_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function business_times_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'business-times' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'business-times' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'business-times' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;


if( ! function_exists( 'business_times_sidebar_layout' ) ) :
/**
 * Return sidebar layouts for pages
 */
function business_times_sidebar_layout(){
    global $post;
    
    if( get_post_meta( $post->ID, 'business_times_sidebar_layout', true ) ){
        return get_post_meta( $post->ID, 'business_times_sidebar_layout', true );    
    }else{
        return 'right-sidebar';
    }
    
}
endif;

if( ! function_exists( 'business_times_social_link_cb' ) ) :
/**
 * Header Top
 * 
 * @since 1.0.1
*/
function business_times_social_link_cb(){	       
    $business_times_button_url_fb   = get_theme_mod( 'business_times_facebook', '#' );
    $business_times_button_url_tw   = get_theme_mod( 'business_times_twitter', '#' );
    $business_times_button_url_ln   = get_theme_mod( 'business_times_linkedin', '#' );
    $business_times_button_url_ins  = get_theme_mod( 'business_times_instagram', '#' );
    $business_times_button_url_gp   = get_theme_mod( 'business_times_google', '#' );
    $business_times_button_url_pin  = get_theme_mod( 'business_times_pinterest', '#' );
    $business_times_button_url_yt   = get_theme_mod( 'business_times_youtube', '#' );
  ?>

	<ul class="header-contact">
		 <?php if( $business_times_button_url_fb ){?>
		<li><a href="<?php echo esc_url( $business_times_button_url_fb ) ?>"><i class="fa fa-facebook"></i></a></li>
		<?php } if( $business_times_button_url_tw ){?>
		<li><a href="<?php echo esc_url( $business_times_button_url_tw ) ?>"><i class="fa fa-twitter"></i></a></li>
		<?php } if( $business_times_button_url_ln ){?>
		<li><a href="<?php echo esc_url( $business_times_button_url_ln ) ?>"><i class="fa fa-linkedin"></i></a></li>
		<?php } if( $business_times_button_url_ins ){?>
		<li><a href="<?php echo esc_url( $business_times_button_url_ins ) ?>"><i class="fa fa-instagram"></i></a></li>
		<?php } if( $business_times_button_url_gp ){?>
		<li><a href="<?php echo esc_url( $business_times_button_url_gp ) ?>"><i class="fa fa-google-plus"></i></a></li>
		<?php } if( $business_times_button_url_pin ){?>
		<li><a href="<?php echo esc_url( $business_times_button_url_pin ) ?>"><i class="fa fa-pinterest"></i></a></li>
		<?php } if( $business_times_button_url_pin ){?>
        <li><a href="<?php echo esc_url( $business_times_button_url_yt ) ?>"><i class="fa fa-youtube"></i></a></li>
        <?php } ?>
	</ul>
<?php } 
endif; 
add_action( 'business_times_social_link', 'business_times_social_link_cb' );

if( ! function_exists( ' business_times_get_the_archive_title' ) ) :
/**
 * Change Comment form default fields i.e. author, email & url.
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function  business_times_get_the_archive_title( $title ){

    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = get_the_author() ;
    }	else {
    	$title = ( single_month_title(' ',false) ); 
    }
return $title;
}
endif;
add_filter( 'get_the_archive_title', 'business_times_get_the_archive_title' );

if( ! function_exists( 'business_times_change_comment_form_default_fields' ) ) :
/**
 * Change Comment form default fields i.e. author, email & url.
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function business_times_change_comment_form_default_fields( $fields ){
    
    // get the current commenter if available
    $commenter = wp_get_current_commenter();
 
    // core functionality
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );    
 
    // Change just the author field
    $fields['author'] = '<p class="comment-form-author"><input id="author" name="author" placeholder="' . esc_attr__( 'Name*', 'business-times' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['email'] = '<p class="comment-form-email"><input id="email" name="email" placeholder="' . esc_attr__( 'Email*', 'business-times' ) . '" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url"><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'business-times' ) . '" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'; 
    
    return $fields;
    
}
endif;
add_filter( 'comment_form_default_fields', 'business_times_change_comment_form_default_fields' );

if( ! function_exists( 'business_times_change_comment_form_defaults' ) ) :
/**
 * Change Comment Form defaults
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function business_times_change_comment_form_defaults( $defaults ){
    
    // Change the "cancel" to "I would rather not comment" and use a span instead
    $defaults['comment_field'] = '<p class="comment-form-comment"><label for="comment"></label><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment', 'business-times' ) . '" cols="45" rows="8" aria-required="true"></textarea></p>';
    
    $defaults['label_submit'] = esc_attr__( 'Submit', 'business-times' );
    
    return $defaults;
    
}
endif;
add_filter( 'comment_form_defaults', 'business_times_change_comment_form_defaults' );



/* Homepage Section End*/

if( ! function_exists( 'business_timese_breadcrumbs_cb' ) ) :
/**
 * App Landing Page Breadcrumb
 * 
 * @since 1.0.1
*/

function business_times_breadcrumbs_cb() {
  
    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = get_theme_mod( 'business_times_breadcrumb_separator', '>' ); // delimiter between crumbs
    $home = get_theme_mod( 'business_times_breadcrumb_home_text', __( 'Home', 'business-times' ) ); // text for the 'Home' link
    $showCurrent = get_theme_mod( 'business_times_ed_current', '1' ); // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb
    
    global $post;
    $homeLink = esc_url( home_url( ) );
    
    if( get_theme_mod( 'business_times_ed_breadcrumb' ) ){
        if ( is_front_page() ) {
        
            if ( $showOnHome == 1 ) echo '<div id="crumbs"><div class="container"><a href="' . esc_url( $homeLink ) . '">' . esc_html( $home ) . '</a></div></div>';
        
        } else {
        
            echo '<div id="crumbs"><div class="container"><a href="' . esc_url( $homeLink ) . '">' . esc_html( $home ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
        
            if ( is_category() ) {
                $thisCat = get_category( get_query_var( 'cat' ), false );
                if ( $thisCat->parent != 0 ) echo get_category_parents( $thisCat->parent, TRUE, ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' );
                echo $before .  esc_html( single_cat_title( '', false ) ) . $after;
            
            } elseif ( is_search() ) {
                echo $before . esc_html__( 'Search Results for "', 'business-times' ) . esc_html( get_search_query() ) . '"' . $after;
            
            } elseif ( is_day() ) {
                echo '<a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'business-times' ) ) ) ) . '">' . esc_html( get_the_time( __( 'Y', 'business-times' ) ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                echo '<a href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'business-times' ) ), get_the_time( __( 'm', 'business-times' ) ) ) ) . '">' . esc_html( get_the_time( __( 'F', 'business-times' ) ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                echo $before . esc_html( get_the_time( __( 'd', 'business-times' ) ) ) . $after;
            
            } elseif ( is_month() ) {
                echo '<a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'business-times' ) ) ) ) . '">' . esc_html( get_the_time( __( 'Y', 'business-times' ) ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                echo $before . esc_html( get_the_time( __( 'F', 'business-times' ) ) ) . $after;
            
            } elseif ( is_year() ) {
                echo $before . esc_html( get_the_time( __( 'Y', 'business-times' ) ) ) . $after;
        
            } elseif ( is_single() && !is_attachment() ) {
                
                if ( get_post_type() != 'post' ) {
                    
                    $post_type = get_post_type_object( get_post_type() );
                    
                    if( $post_type->has_archive == true ){
                       
                        // Add support for a non-standard label of 'archive_title' (special use case).
                       $label = !empty( $post_type->labels->archive_title ) ? $post_type->labels->archive_title : $post_type->labels->name;
                       // Core filter hook.
                       $label = apply_filters( 'post_type_archive_title', $label, $post_type->name );
                       printf( '<a href="%s">%s</a>', esc_url( get_post_type_archive_link( $post_type ) ), $label );
                       echo '<span class="separator">' . esc_html( $delimiter ) . '</span> ';
        
                    }
                    if ( $showCurrent == 1 ){ 
                       
                        echo $before . esc_html( get_the_title() ) . $after;
                    }

                } else {
                    $cat = get_the_category(); 
                    if( $cat ){
                        $cat = $cat[0];
                        $cats = get_category_parents( $cat, TRUE, ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' );
                        if ( $showCurrent == 0 ) $cats = preg_replace( "#^(.+)\s$delimiter\s$#", "$1", $cats );
                        echo $cats;
                    }
                    if ( $showCurrent == 1 ) echo $before . esc_html( get_the_title() ) . $after;
                }
            
            } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
                $post_type = get_post_type_object(get_post_type());
                if ( get_query_var('paged') ) {
                    echo '<a href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '">' . esc_html( $post_type->label ) . '</a>';
                    if( $showCurrent == 1 ) echo ' <spa n class="separator">' . esc_html( $delimiter ) . '</span> ' . $before . sprintf( __('Page %s','business-times'), get_query_var('paged') ) . $after;
                } else {
                    if ( $showCurrent == 1 ) echo $before . esc_html( $post_type->label ) . $after;
                }

            } elseif ( is_attachment() ) {
                $parent = get_post( $post->post_parent );
                $cat = get_the_category( $parent->ID ); 
                if( $cat ){
                    $cat = $cat[0];
                    echo get_category_parents( $cat, TRUE, ' <span class="separator">' . esc_html( $delimiter ) . '</span> ');
                    echo '<a href="' . esc_url( get_permalink( $parent ) ) . '">' . esc_html( $parent->post_title ) . '</a>' . ' <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                }
                if ( $showCurrent == 1 ) echo  $before . esc_html( get_the_title() ) . $after;
            
            } elseif ( is_page() && !$post->post_parent ) {
                if ( $showCurrent == 1 ) echo $before . esc_html( get_the_title() ) . $after;
        
            } elseif ( is_page() && $post->post_parent ) {
                $parent_id  = $post->post_parent;
                $breadcrumbs = array();
                while( $parent_id ){
                    $page = get_post( $parent_id );
                    $breadcrumbs[] = '<a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . esc_html( get_the_title( $page->ID ) ) . '</a>';
                    $parent_id  = $page->post_parent;
                }
                $breadcrumbs = array_reverse( $breadcrumbs );
                for ( $i = 0; $i < count( $breadcrumbs) ; $i++ ){
                    echo $breadcrumbs[$i];
                    if ( $i != count( $breadcrumbs ) - 1 ) echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                }
                if ( $showCurrent == 1 ) echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' . $before . esc_html( get_the_title() ) . $after;
            
            } elseif ( is_tag() ) {
                echo $before . esc_html( single_tag_title( '', false ) ) . $after;
            
            } elseif ( is_author() ) {
                global $author;
                $userdata = get_userdata( $author );
                echo $before . esc_html( $userdata->display_name ) . $after;
            
            } elseif ( is_404() ) {
                echo $before . esc_html__( '404 Error - Page not Found', 'business-times' ) . $after;
            } elseif( is_home() ){
                echo $before;
                single_post_title();
                echo $after;
            }
        
            echo '</div></div>';
        
        }
    }
}
endif;

add_action( 'business_times_breadcrumbs', 'business_times_breadcrumbs_cb');


if( ! function_exists( 'business_times_admin_notice' ) ) :
/**
 * Addmin notice for getting started page
*/
function business_times_admin_notice(){
    global $pagenow;
    $theme_args      = wp_get_theme();
    $meta            = get_option( 'business_times_admin_notice' );
    $name            = $theme_args->__get( 'Name' );
    $current_screen  = get_current_screen();
    
    if( 'themes.php' == $pagenow && !$meta ){
        
        if( $current_screen->id !== 'dashboard' && $current_screen->id !== 'themes' ){
            return;
        }

        if( is_network_admin() ){
            return;
        }

        if( ! current_user_can( 'manage_options' ) ){
            return;
        } ?>

        <div class="welcome-message notice notice-info">
            <div class="notice-wrapper">
                <div class="notice-text">
                    <h3><?php esc_html_e( 'Congratulations!', 'business-times' ); ?></h3>
                    <p><?php printf( __( '%1$s is now installed and ready to use. Click below to see theme documentation, plugins to install and other details to get started.', 'business-times' ), esc_html( $name ) ) ; ?></p>
                    <p><a href="<?php echo esc_url( admin_url( 'themes.php?page=business-times-getting-started' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Go to the getting started.', 'business-times' ); ?></a></p>
                    <p class="dismiss-link"><strong><a href="?business_times_admin_notice=1"><?php esc_html_e( 'Dismiss', 'business-times' ); ?></a></strong></p>
                </div>
            </div>
        </div>
    <?php }
}
endif;
add_action( 'admin_notices', 'business_times_admin_notice' );



if( ! function_exists( 'business_times_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
*/
function business_times_update_admin_notice(){
    if ( isset( $_GET['business_times_admin_notice'] ) && $_GET['business_times_admin_notice'] == '1' ) {
        update_option( 'business_times_admin_notice', true );
    }
}
endif;

add_action( 'admin_init', 'business_times_update_admin_notice' );