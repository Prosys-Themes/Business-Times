<?php
/**
 * Support Panel.
 *
 * @package Business_Times
 */
?>
<div class="panel-aside">
    <h4><?php esc_html_e( 'Support Ticket', 'business-times' ); ?></h4>
    <p><?php printf( __( "It's always better to visit our %1s Documentation Guide %2s before you send us a support query.", "business-times" ), '<a href="'. esc_url( 'https://docs.prosysthemes.com/business-times/' ) .'" target="_blank">', '</a>' ); ?></p>
    <p><?php printf( __( "If the Documentation Guide didn't help you, contact us via our %1s Support Ticket %2s. We reply to all the support queries within one business day, except on the weekends.", "business-times" ), '<a href="'. esc_url( 'https://prosysthemes.com/forums/' ) .'" target="_blank">', '</a>' ); ?></p>
    <a class="button button-primary" href="<?php echo esc_url( 'https://prosysthemes.com/forums/' ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'business-times' ); ?>" target="_blank">
        <?php esc_html_e( 'Contact Support', 'business-times' ); ?>
    </a>
</div>