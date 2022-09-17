<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Business_Times
 */

get_header();
?>
<div id="primary" class="content-area">
		<main id="main" class="site-main">

			
		<main id="main" class="site-main">
			<section class="error-404 not-found">
				<h1><?php esc_html_e( '404!', 'business-times' ); ?></h1>
				<h2><?php esc_html_e( 'The requested page cannot be found', 'business-times' ); ?></h2>
				<p><?php esc_html_e( 'Sorry but the page you are looking for cannot be found. Take a moment and do a search below or start from our', 'business-times' ); ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'homepage.', 'business-times' ); ?></a></p>
				<?php
					get_search_form();
				?>
			</section><!-- .error-404 -->
		</main><!-- #main -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
