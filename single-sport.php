<?php if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package stream_sports
 */

get_header();
if (function_exists('cs_framework_init')) {
	if (1 == cs_get_option('sport-sidebar')) {
		$stream_sports_col = 'col-xl-9';
	}
}
?>
	<div id="primary" class="content-area">
		<div class="container">
			<div class="row">
				<div class="<?php echo esc_attr($stream_sports_col); ?>">
					<main id="main" class="site-main">

						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'sport' );

							stream_sports_post_navigation();

							get_template_part( 'template-parts/related', 'sport' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>

					</main><!-- #main -->
				</div>
				<?php
					if (function_exists('cs_framework_init')) {
						if (1 == cs_get_option('sport-sidebar')) {
							get_sidebar('sport');
						}
					}
				?>
			</div>
		</div>

	</div><!-- #primary -->

<?php
get_footer();
