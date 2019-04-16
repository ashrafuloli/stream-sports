<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package stream_sports
 */
$post_class = 'sports-wrapper';
if (is_single()) {
	$post_class = 'single-sports-wrapper';
}

$sports_meta = get_post_meta( get_the_ID(), 'sport_meta_options', true );

$event_time = $sports_meta['event_time'];
$event_date = $sports_meta['event_date'];
$event_link = $sports_meta['stream_link'];

$channels_group = $sports_meta['channels_group'];

$team_one = $sports_meta['sports_teams_a'];
$team_one_link = $sports_meta['sports_teams_a_link'];
$team_one_img_id = $sports_meta['sports_teams_a_logo'];

$team_two = $sports_meta['sports_teams_b'];
$team_two_link = $sports_meta['sports_teams_b_link'];
$team_two_img_id = $sports_meta['sports_teams_b_logo'];

$new_Time   = date( "H:i ", strtotime( $event_time ) );
$new_Time_2   = date( "h:i a", strtotime( $event_time ) );
$new_date   = date( "Y M d D", strtotime( $event_date ) );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $post_class ); ?>>
	<?php if(!is_single()): ?>
		<div class="match-info">
			<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<time><?php echo esc_html($new_date); ?> - <?php echo esc_html($new_Time_2); ?></time>
			<a href="<?php the_permalink(); ?>" class="btn"><i class="fas fa-play"></i> <?php _e('stream hd','stream-sports') ?></a>
		</div>
		<div class="match-time">
			<div class='countdown' data-date="<?php echo esc_attr($event_date); ?>"
			     data-time="<?php echo esc_attr($new_Time); ?>"></div>
			<div class="watch-now">
				<a href="<?php echo esc_url($event_link); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/watch-now.png" >
				</a>
			</div>
		</div>
	<?php endif; ?>

	<?php if(is_single()): ?>
		<div class="match-header">
			<h2> <?php _e('Watch ','stream-sports'); the_title(); _e(' Live Stream','stream-sports');?> </h2>
			<time><?php echo esc_html($new_date); ?> - <?php echo esc_html($new_Time_2); ?></time>
		</div>
		<div class="match-countdown">
			<div class='countdown' data-date="<?php echo esc_attr($event_date) ?>"
			     data-time="<?php echo esc_attr($new_Time); ?>"></div>
			<div class="watch-now">
				<a href="<?php echo esc_url($event_link); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/watch-now.png">
				</a>
			</div>
		</div>
		<div class="match-content">
			<div class="team-one">
				<h3><a href="<?php echo esc_url($team_one_link); ?>"><?php echo esc_html($team_one);?></a></h3>
				<?php echo wp_get_attachment_image($team_one_img_id,'thumbnail'); ?>
			</div>
			<div class="team-vs">
				<h3><?php _e('VS','stream-sports'); ?></h3>
			</div>
			<div class="team-tow">
				<?php echo wp_get_attachment_image($team_two_img_id,'thumbnail'); ?>
				<h3><a href="<?php echo esc_url($team_two_link); ?>"><?php echo esc_html($team_two);?></a></h3>
			</div>
		</div>
		<div class="tab-link-wrapper">
			<nav>
				<div class="nav links-nav" id="nav-tab" role="tablist">
					<?php

					foreach ($channels_group as $channels_key => $channels_value){
						$channels_active_class = '';
						if (1 == $channels_key){
							$channels_active_class = 'active';
						}
						?>
						<a class="nav-item nav-link <?php echo esc_attr($channels_active_class); ?>" id="tabs-<?php echo esc_attr($channels_key); ?>" data-toggle="tab" href="#nav-tabs-<?php echo esc_attr($channels_key); ?>" role="tab" aria-controls="nav-tabs-<?php echo esc_attr($channels_key); ?>" aria-selected="<?php (1 == esc_attr($channels_key)) ? 'true' : 'flase'; ?>">
							<?php echo esc_html($channels_value['channel_name']); ?>
						</a>
						<?php
					}
					?>
				</div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
				<?php
				//var_dump($channels_group);

				foreach ($channels_group as $channels_key => $channels_value){
					$channels_active_class = '';
					if (1 == $channels_key){
						$channels_active_class = 'show active';
					}
					?>
					<div class="tab-pane fade <?php echo esc_attr($channels_active_class); ?>" id="nav-tabs-<?php echo esc_attr($channels_key); ?>" role="tabpanel" aria-labelledby="tabs-<?php echo esc_attr($channels_key); ?>">
						<div class="links-content">
							<div class="video-wrapper">
								<div class="play-screen">
									<a href="<?php echo esc_url($channels_value['channel_link'])?>" class="screen-btn" target="_blank">
										<i class="fas fa-play"></i>
										<i class="fas fa-spinner fa-spin"></i>
									</a>
								</div>
								<div class="play-controls align-items-center justify-content-center">
									<div class="play-btn col-xl-1">
										<a href="<?php echo esc_url($channels_value['channel_link'])?>" class="plying-btn" target="_blank">
											<i class="fas fa-play"></i>
											<i class="fas fa-pause"></i>
										</a>
									</div>
									<div class="play-bar col-xl-10">
										<input type="range" value="0" class="range" min="1" max="100">
									</div>
									<div class="play-zoom col-xl-1">
										<a href="<?php echo esc_url($channels_value['channel_link'])?>" target="_blank">
											<i class="fas fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
		<div class="match-details">
			<div class="details-title">
				<h4><?php _e('Description', 'stream-sports') ?></h4>
			</div>
			<?php the_content(); ?>
		</div>
	<?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->