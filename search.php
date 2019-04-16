<?php if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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

	<section id="primary" class="content-area">
		<div class="container">
			<div class="row">

				<div class="<?php echo esc_attr($stream_sports_col); ?>">
					<main id="main" class="site-main">

						<?php if ( have_posts() ) : ?>

							<header class="page-header">
								<h1 class="page-title">
									<?php
									/* translators: %s: search query. */
									printf( esc_html__( 'Search Results for: %s', 'stream-sports' ), '<span>' . get_search_query() . '</span>' );
									?>
								</h1>
							</header><!-- .page-header -->

							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );

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

	</section><!-- #primary -->

<?php
get_footer();
