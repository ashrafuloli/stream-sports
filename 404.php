<?php if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package stream_sports
 */

get_header();
?>
	<div id="primary" class="content-area">
		<div class="container">
			<div class="row align-items-center error-section">
				<div class="col-sm-5 col-sm-offset-1">
					<div class="not-found-icon text-center">
						<i class="fas fa-exclamation-triangle"></i>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="error-message">
						<h2><?php echo cs_get_option('error-text'); ?></h2>

						<h3><?php echo cs_get_option('error-sub-text'); ?></h3>

						<p><?php echo cs_get_option('error-desc'); ?></p>

						<a class="btn" href="<?php echo esc_url(home_url('/'));?>"><i class="fa fa-reply-all"></i><?php echo cs_get_option('error-btn');; ?></a>
					</div> <!-- /notfound-page -->
				</div> <!-- .col -->
			</div>
		</div>
	</div><!-- #primary -->

<?php
get_footer();
