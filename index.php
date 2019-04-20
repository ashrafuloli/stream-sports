<?php if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package stream_sports
 */

get_header();

$stream_sports_col = 'col-xl-12';
if (function_exists('cs_framework_init')) {
	if (1 == cs_get_option('blog-sidebar')) {
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
						if (have_posts()) :

							if (is_home() && !is_front_page()) :
								?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>
							<?php
							endif;

							/* Start the Loop */
							while (have_posts()) :
								the_post();

								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								get_template_part('template-parts/content', get_post_type());

							endwhile;

							echo stream_sports_posts_pagination();

						else :

							get_template_part('template-parts/content', 'none');

						endif;
						?>

					</main><!-- #main -->
				</div>

				<?php
				if (function_exists('cs_framework_init')) {
					if (! is_active_sidebar( 'sidebar-1' )) {
						get_sidebar();
					}
				}
				?>
			</div>
		</div>
	</div><!-- #primary -->

<?php
get_footer();
