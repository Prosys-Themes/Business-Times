<?php
/**
 * Help Panel.
 *
 * @package business_times
 */
?>
<div class="panel-aside">
    <h4><?php esc_html_e( 'Please follow the instruction checklist.', 'business-times' ); ?></h4>
    <ol>
        <li><?php esc_html_e('WordPress Need to be latest version.','business-times');?></li>
        <li><?php esc_html_e('Install all the recommeded Plugins required by this theme.','business-times');?></li>
        <li><?php esc_html_e('Please read the theme documentation','business-times');?></li>
        <li><?php esc_html_e('If you still having problem you can check and ask on our support forum.','business-times');?></li>
    </ol>
</div>

<div class="panel-aside">
    <h4><?php esc_html_e( 'Customize Now', 'business-times' ); ?></h4>
    <p><?php esc_html_e( 'Are you ready to customize your website? Please click the button below.', 'business-times' ); ?></p>
    <a class="button button-primary" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" title="<?php esc_attr_e( 'Customize', 'business-times' ); ?>" target="_blank">
        <?php esc_html_e( 'Customize', 'business-times' ); ?>
    </a>
</div>

<div class="panel-aside">
    <h4><?php esc_html_e( 'View Our Documentation Link', 'business-times' ); ?></h4>
    <p><?php esc_html_e( 'Are you new to the WordPress world? Our step by step easy documentation guide will help you create an attractive and engaging website without any prior coding knowledge or experience.', 'business-times' ); ?></p>
    <a class="button button-primary" href="<?php echo esc_url( 'https://docs.prosysthemes.com/business-times/' ); ?>" title="<?php esc_attr_e( 'Visit the Documentation', 'business-times' ); ?>" target="_blank">
        <?php esc_html_e( 'View Documentation', 'business-times' ); ?>
    </a>
</div>


<div class="panel-aside">
    <h4><?php printf( esc_html__( 'View Our %1$s Demo', 'business-times' ), 'Business Times' ); ?></h4>
    <p><?php esc_html_e( 'Visit the demo to get more idea about our theme design and its features.', 'business-times' ); ?></p>
    <a class="button button-primary" href="<?php echo esc_url( 'https://prosysthemes.com/theme-demos/?theme_demos=business-times' ); ?>" title="<?php esc_attr_e( 'Visit the Demo', 'business-times' ); ?>" target="_blank">
        <?php esc_html_e( 'View Demo', 'business-times' ); ?>
    </a>
</div>

