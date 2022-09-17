<?php
/**
 * Help Panel.
 *
 * @package business_times
 */
?>
    <h4><?php esc_html_e( 'Recommended Plugins', 'business-times' ); ?></h4>

    <p><?php printf( esc_html__( 'Here is a list of recommended plugins you should install to get most out of the %1$s. Though every plugin is optional, we recommend you to at least install %2$s Woocommerce %3$s, %2$s One Click Demo Import %3$s & %2$s Newsletter %3$s to create a website similar to the %1$s demo and also to ensure every feature of the theme works correctly.', 'business-times' ), 'Business Times','<strong>','</strong>' ); ?></p>

    <hr/>

    <?php 
    $free_plugins = array(              
        'newsletter' => array(
            'slug'      => 'newsletter',
            'filename'  => 'plugin.php',
        ),   
        'one-click-demo-import' => array(
            'slug'      => 'one-click-demo-import',
            'filename'  => 'plugin.php',
        ),  
        'woocommerce' => array(
            'slug'      => 'woocommerce',
            'filename'  => 'plugin.php',
        ),              
    );

    if( $free_plugins ){ ?>
        <h4 class="recomplug-title"><?php esc_html_e( 'Free Plugins', 'business-times' ); ?></h4>
        <p><?php esc_html_e( 'These Free Plugins might be handy for you.', 'business-times' ); ?></p>
        <div class="recomended-plugin-wrap">
            <?php
            foreach( $free_plugins as $plugin ) {
                $info     = business_times_call_plugin_api( $plugin['slug'] );
                $icon_url = business_times_check_for_icon( $info->icons ); ?>    
                <div class="recom-plugin-wrap">
                    <div class="plugin-img-wrap">
                        <img src="<?php echo esc_url( $icon_url ); ?>" />
                        <div class="version-author-info">
                            <span class="version"><?php printf( esc_html__( 'Version %s', 'business-times' ), $info->version ); ?></span>
                            <span class="seperator">|</span>
                            <span class="author"><?php echo esc_html( strip_tags( $info->author ) ); ?></span>
                        </div>
                    </div>
                    <div class="plugin-title-install clearfix">
                        <span class="title" title="<?php echo esc_attr( $info->name ); ?>">
                            <?php echo esc_html( $info->name ); ?>  
                        </span>
                        <div class="button-wrap">
                           <?php echo business_times_Getting_Started_Page_Plugin_Helper::instance()->get_button_html( $plugin['slug'], $plugin['filename'] ); ?>
                        </div>
                    </div>
                </div>
                <?php
            } 
            ?>
        </div>
    <?php
    } 
?>