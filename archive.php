<?php if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package stream_sports
 */

get_header();

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

						<?php if ( have_posts() ) : ?>

							<header class="page-header">
								<?php
								the_archive_title( '<h1 class="page-title">', '</h1>' );
								the_archive_description( '<div class="archive-description">', '</div>' );
								?>
							</header><!-- .page-header -->

							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_type() );

							endwhile;

							echo stream_sports_posts_pagination();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>

					</main><!-- #main -->
				</div>
				<?php
				if (function_exists('cs_framework_init')) {
					if (1 == cs_get_option('blog-sidebar')) {
						get_sidebar();
					}
				}
				?>
			</div>
		</div>
	</div><!-- #primary -->

<?php
get_footer();
