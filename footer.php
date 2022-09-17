<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business_Times
 */

business_times_content_end();

/**
 * Business Times Footer
 * 
 * @see business_times_footer_start  - 20
 * @see business_times_footer_widgets    - 30
 * @see business_times_footer_credit - 40
 * @see business_times_footer_end    - 50
*/
do_action( 'business_times_footer' );
?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
