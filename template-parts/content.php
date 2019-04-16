<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package stream_sports
 */
$post_class = 'post-wrapper';
if (is_single()) {
	$post_class = 'single-post-wrapper';
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
	<?php if (has_post_thumbnail()): ?>
		<header class="entry-header">
			<?php stream_sports_post_thumbnail(); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>


	<div class="entry-content">

		<?php
		// post title
		if (is_singular()) :
			the_title('<h2 class="entry-title">', '</h1>');
		else :
			the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;

		// post meta
		if ('post' === get_post_type()) {
			stream_sports_posted_on();
		}

		?>
		<div class="content-wrapper">
			<?php
			// post content
			if (!is_single()) :
				the_excerpt();
			else :
				the_content(sprintf(
					wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
						__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'stream-sports'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				));
			endif;
			?>
		</div>
		<?php

		wp_link_pages(array(
			'before' => '<div class="page-links">' . esc_html__('Pages:', 'stream-sports'),
			'after' => '</div>',
		));
		?>
	</div><!-- .entry-content -->

	<?php if (is_single()): ?>
		<footer class="entry-footer">
			<?php stream_sports_social_sharing(); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
