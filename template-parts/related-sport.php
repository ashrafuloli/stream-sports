<div class="related-sports">

	<div class="related-title">
		<h4><?php _e('Upcoming Sports', 'stream-sports') ?></h4>
	</div>

	<?php
	$args = array(
		'post_type' => 'sport',
		'post_status' => 'publish',
		'posts_per_page' => 5,
	);
	// the query
	$the_query = new WP_Query($args);

	if ($the_query->have_posts()) : ?>

		<!-- the loop -->
		<?php while ($the_query->have_posts()) : $the_query->the_post();

			$sports_meta = get_post_meta(get_the_ID(), 'sport_meta_options', true);

			$event_time = $sports_meta['event_time'];
			$event_date = $sports_meta['event_date'];
			$event_link = $sports_meta['stream_link'];

			$new_Time = date("H:i ", strtotime($event_time));
			$new_Time_2 = date("h:i a", strtotime($event_time));
			$new_date = date("Y M d D", strtotime($event_date));
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('sports-wrapper'); ?>>
				<div class="match-info">
					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<time><?php echo esc_html($new_date); ?> - <?php echo esc_html($new_Time_2); ?></time>
					<a href="<?php the_permalink(); ?>" class="btn"><i class="fas fa-play"></i> stream hd</a>
				</div>
				<div class="match-time">
					<div class='countdown' data-date="<?php echo esc_attr($event_date) ?>"
					     data-time="<?php echo esc_attr($new_Time); ?>"></div>
					<div class="watch-now">
						<a href="<?php echo esc_url($event_link); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/watch-now.png">
						</a>
					</div>
				</div>
			</article>

		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>

	<?php else :
		get_template_part('template-parts/content', 'none');
	endif; ?>

</div>