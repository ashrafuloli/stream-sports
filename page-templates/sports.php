<?php
/**
 * Template Name: Sports Page
 */

if (!defined('ABSPATH')) :
	exit; // Exit if accessed directly
endif;

get_header();

$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$posts_per_page = 3;

$stream_sports_col = 'col-xl-12';

if (function_exists('cs_framework_init')) {

	if (1 == cs_get_option('sport-sidebar')) {
		$stream_sports_col = 'col-xl-9';
	}

	$posts_per_page = cs_get_option('post-par-page');
}

$sports = new WP_Query([
	'post_type' => 'sport',
	'posts_per_page' => $posts_per_page,
	'paged' => $paged,

]);
?>

<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr($stream_sports_col); ?>">
				<main id="main" class="site-main">

					<?php
					while ($sports->have_posts()) :
						$sports->the_post();

						get_template_part('template-parts/content', 'sport');

					endwhile; // End of the loop.
					?>
					<div class="custom-pagination">
						<?php
						echo paginate_links([
							'current' => $paged,
							'total' => $sports->max_num_pages,
							'prev_text' => '<i class="fas fa-angle-left"></i>',
							'next_text' => '<i class="fas fa-angle-right"></i>'
						]);
						?>
					</div>
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

<?php get_footer(); ?>

