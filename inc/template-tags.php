<?php if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package stream_sports
 */

if ( ! function_exists( 'stream_sports_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function stream_sports_posted_on()
	{
		if (function_exists('cs_framework_init')):
		?>
		<ul class="entry-meta">
			<?php $post_meta_options = cs_get_option('post-meta');
				if(in_array("post-author", $post_meta_options)):
			?>
			<li>
                   <span class="author vcard">
                      By: <?php printf('<a class="url fn n" href="%1$s">%2$s</a>',
		                   esc_url(get_author_posts_url(get_the_author_meta('ID'))),
		                   esc_html(get_the_author())
	                   ) ?>
                  </span>
			</li>
			<?php endif;
				if(in_array("post-date", $post_meta_options)):
			?>
			<li>
				<a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_time( 'dS F y ' ); ?></a>
			</li>
			<?php endif;
				if(in_array("post-category", $post_meta_options)):
			?>
			<li>
				<?php echo get_the_category_list(esc_html_x(' , ', 'Used between list items, there is a space after the comma.', 'stream-sports'));
				?>
			</li>
			<?php endif;
				if(in_array("post-comment", $post_meta_options)):
					if (is_single()): ?>
				<li>
					<?php
					if (!post_password_required() && (comments_open() || get_comments_number())) {
						echo '<span class="comments-link">';
						comments_popup_link(
							sprintf(
								wp_kses(
								/* translators: %s: post title */
									__('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'stream-sports'),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								get_the_title()
							)
						);
						echo '</span>';
					}
					?>
				</li>
			<?php endif;endif; ?>
		</ul>
			<?php
		endif;
	}
endif;

if ( ! function_exists( 'stream_sports_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function stream_sports_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular('post') ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail('stream-sports-single-thumbnail', array('class' => 'img-fluid')); ?>
			</div><!-- .post-thumbnail -->

		<?php elseif( is_page() ) : ?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail('stream-sports-page-thumbnail', array('class' => 'img-fluid')); ?>
			</div><!-- .post-thumbnail -->
		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail('stream-sports-thumbnail', array(
					'alt' => the_title_attribute(array(
						'echo' => false,
					)),
					'class' => 'img-fluid'
				));
				?>
			</a>

		<?php
		endif; // End is_singular().
	}
endif;

/**
 * Single blog post navigation
 */

if (!function_exists('stream_sports_post_navigation')) :

	function stream_sports_post_navigation() {

		$prev_post = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
		$next_post = get_adjacent_post(false, '', false);

		if (!$next_post && !$prev_post) :
			return;
		endif;
		?>
		<nav class="single-post-navigation" role="navigation">
			<div class="row">
				<?php if ($prev_post): ?>
					<!-- Previous Post -->
					<div class="col-xl-6">
						<div class="previous-post-link">
							<?php previous_post_link('<div class="previous">%link</div>', '<i class="fas fa-long-arrow-alt-left"></i>' . esc_html__( 'Previous Post', 'stream-sports' )); ?>
						</div>
					</div>
				<?php endif ?>

				<?php if ($next_post): ?>
					<!-- Next Post -->
					<div class="col-xl-6">
						<div class="next-post-link">
							<?php next_post_link('<div class="next">%link</div>', esc_html__( 'Next Post', 'stream-sports' ) . '<i class="fas fa-long-arrow-alt-right"></i>'); ?>
						</div>
					</div>
				<?php endif ?>
			</div> <!-- .row -->
		</nav> <!-- .single-post-navigation -->
		<?php
	}
endif;

/**
 * Blog posts pagination for default blog layout
 */
if (!function_exists('stream_sports_posts_pagination')) :
	function stream_sports_posts_pagination() {
		global $wp_query;
		if ($wp_query->max_num_pages > 1) {
			$big = 999999999; // need an unlikely integer
			$items = paginate_links(array(
				'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
				'format'    => '?paged=%#%',
				'prev_next' => true,
				'current'   => max(1, get_query_var('paged')),
				'total'     => $wp_query->max_num_pages,
				'type'      => 'array',
				'prev_text' => '<i class="fas fa-angle-left"></i>',
				'next_text' => '<i class="fas fa-angle-right"></i>'
			));

			$pagination = "<div class='pagination-wrapper'><ul class=\"pagination\">\n\t<li>";
			$pagination .= join("</li>\n\t<li>", $items);
			$pagination .= "</li>\n</ul>\n</div>\n";

			return $pagination;
		}
	}
endif;


/**
 * Post Social Share
 */
if (!function_exists('stream_sports_social_sharing')):
	function stream_sports_social_sharing()
	{
		// Get current page URL
		$ShareURL = urlencode(get_permalink());

		// Get current page title
		$ShareTitle = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
		// $ShareTitle = str_replace( ' ', '%20', get_the_title());

		// Get Post Thumbnail for pinterest
		$ShareThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');

		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text=' . $ShareTitle . '&amp;url=' . $ShareURL . '&amp;via=Crunchify';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . $ShareURL;
		$googleURL = 'https://plus.google.com/share?url=' . $ShareURL;
		$bufferURL = 'https://bufferapp.com/add?url=' . $ShareURL . '&amp;text=' . $ShareTitle;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $ShareURL . '&amp;title=' . $ShareTitle;

		// Based on popular demand added Pinterest too
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url=' . $ShareURL . '&amp;media=' . $ShareThumbnail[0] . '&amp;description=' . $ShareTitle;

		// Add sharing button at the end of page/page content
		if (function_exists('cs_framework_init')):
		?>
		<div class="social-share">
			<?php $post_meta_options = cs_get_option('share-button');
			if(in_array("facebook", $post_meta_options)):
				?>
			<a class="facebook" href="<?php echo esc_url($facebookURL); ?>" target="_blank"><i class="fab fa-facebook-f"></i> <span><?php _e('facebook','stream-sports') ?></span></a>
			<?php endif;
			if(in_array("twitter", $post_meta_options)): ?>
			<a class="twitter" href="<?php echo esc_url($twitterURL); ?>" target="_blank"><i class="fab fa-twitter"></i> <span><?php _e('twitter','stream-sports') ?></span></a>
			<?php endif;
			if(in_array("google", $post_meta_options)): ?>
			<a class="google" href="<?php echo esc_url($googleURL); ?>" target="_blank"><i class="fab fa-google-plus-g"></i> <span><?php _e('google','stream-sports') ?></span></a>
			<?php endif;
			if(in_array("linkedin", $post_meta_options)): ?>
			<a class="linkedin" href="<?php echo esc_url($linkedInURL); ?>" target="_blank"><i class="fab fa-linkedin-in"></i> <span><?php _e('linkedin','stream-sports') ?></span></a>
			<?php endif;
			if(in_array("pinterest", $post_meta_options)): ?>
			<a class="pinterest" href="<?php echo esc_url($pinterestURL); ?>" target="_blank"><i class="fab fa-pinterest-p"></i> <span><?php _e('pinterest','stream-sports') ?></span></a>
			<?php endif; ?>
		</div>
			<?php
		endif;
	}
endif;

/**
 * Search form Widget
 */

if (!function_exists('stream_sports_blog_search_form')) :

	function stream_sports_blog_search_form($form)
	{
		$form = '<form role="search" method="get" id="searchform" class="search-form" action="' . esc_url(home_url('/')) . '">
			<input type="text" value="' . get_search_query() . '" name="s" placeholder="'.__('Search Keyword','stream-sports').'" />
			<button type="submit"><i class="fa fa-search"></i></button>
			<input type="hidden" value="post" name="post_type" id="post_type" />
		</form>';

		return $form;
	}

	add_filter('get_search_form', 'stream_sports_blog_search_form');

endif;


/**
 * Comment form
 */

if (!function_exists('stream_sports_comment_form')) :

	function stream_sports_comment_form($args = array(), $post_id = NULL) {
		if (NULL === $post_id) {
			$post_id = get_the_ID();
		} else {
			$id = $post_id;
		}

		$commenter = wp_get_current_commenter();
		$user = wp_get_current_user();
		$user_identity = $user->exists() ? $user->display_name : '';

		if (!isset($args[ 'format' ])) {
			$args[ 'format' ] = current_theme_supports('html5', 'comment-form') ? 'html5' : 'xhtml';
		}

		$req = get_option('require_name_email');
		$aria_req = ($req ? " aria-required='true'" : '');
		$html5 = 'html5' === $args[ 'format' ];
		$fields = array(
			'author' => '
            <div class="form-group form-row">
                <div class="col-sm-6 comment-form-author input-field">
                    <input id="author" name="author" type="text"
                    value="" ' . $aria_req . ' />
                    <label for="author">' . esc_html__('Your Name*','stream-sports') . '</label>
                </div>',
			'email'  => '<div class="col-sm-6 comment-form-email input-field">
                <input id="email" name="email" ' . ($html5 ? 'type="email"' : 'type="text"') . '
                value="" ' . $aria_req . ' />
                <label for="email">' . esc_html__('Your Email*','stream-sports') . '</label>
            </div>
        </div>',
			'url'    => '<div class="form-group form-row">
        <div class=" col-sm-12 comment-form-url input-field">' .
				'<input id="url" name="url" ' . ($html5 ? 'type="url"' : 'type="text"') . ' value=""  />
                <label for="url">' . esc_html__('Your Website','stream-sports') . '</label>
        </div></div>',

		);

		$required_text = sprintf(' ' . esc_html__('Required fields are marked %s', 'stream-sports'), '<span class="required">*</span>');
		$defaults = array(
			'fields'               => apply_filters('comment_form_default_fields', $fields),
			'comment_field'        => '
            <div class="form-group form-row comment-form-comment">
                <div class="col-sm-12">

                  <div class="input-field">
                    <textarea name="comment" id="comment" class="stream-sports-textarea"  rows="8" aria-required="true"></textarea>
                    <label for="comment">' . esc_html__('Your Comment','stream-sports') . '</label>
                  </div>

                </div>
            </div>
            ',
			'must_log_in'          => '
            
            <div class="alert alert-danger must-log-in">'
				. sprintf( wp_kses( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'stream-sports' ), array( 'a' => array( 'href' => array() ) ) ), wp_login_url( apply_filters( 'the_permalink', esc_url( get_permalink( $post_id ) ) ) ) ) . '</div>',
			'logged_in_as'         => '<div class="alert alert-info logged-in-as">' . sprintf( wp_kses( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'stream-sports' ), array( 'a' => array( 'href' => array() ) ) ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', esc_url( get_permalink( $post_id ) ) ) ) ) . '</div>',
			'comment_notes_before' => '<div class="alert alert-info comment-notes">' . esc_html__( 'Your email address will not be published.', 'stream-sports' ) . ( $req ? $required_text : '' ) . '</div>',
			'comment_notes_after'  => '<div class="form-allowed-tags">' . sprintf( wp_kses( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'stream-sports' ), array( 'abbr' => array( 'title' => array() ) ) ), ' <code>' . allowed_tags() . '</code>' ) . '</div>',
			'id_form'              => 'commentform',
			'id_submit'            => 'submit',
			'title_reply'          => esc_html__( 'Leave a Reply', 'stream-sports' ),
			'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'stream-sports' ),
			'cancel_reply_link'    => esc_html__( 'Cancel reply', 'stream-sports' ),
			'label_submit'         => esc_html__( 'Submit', 'stream-sports' ),
			'format'               => 'xhtml',
		);

		$args = wp_parse_args($args, apply_filters('comment_form_defaults', $defaults));

		if (comments_open($post_id)) {
			?>
			<?php do_action('comment_form_before'); ?>
			<div id="respond" class="comment-respond">
				<h3 id="reply-title" class="comment-reply-title">
					<?php comment_form_title($args[ 'title_reply' ], $args[ 'title_reply_to' ]); ?>
					<small><?php cancel_comment_reply_link($args[ 'cancel_reply_link' ]); ?></small>
				</h3>

				<?php if (get_option('comment_registration') && !is_user_logged_in()) { ?>
					<?php echo wp_kses_post($args[ 'must_log_in' ]); ?>
					<?php do_action('comment_form_must_log_in_after'); ?>
				<?php } else { ?>
					<form action="<?php echo site_url('/wp-comments-post.php'); ?>" method="post"
					      id="<?php echo esc_attr($args[ 'id_form' ]); ?>"
					      class="form-horizontal comment-form"<?php echo esc_attr($html5 ? ' novalidate' : ''); ?>
					      role="form">
						<?php do_action('comment_form_top'); ?>
						<?php if (is_user_logged_in()) { ?>
							<?php echo apply_filters('comment_form_logged_in', $args[ 'logged_in_as' ], $commenter, $user_identity); ?>
							<?php do_action('comment_form_logged_in_after', $commenter, $user_identity); ?>
						<?php } else { ?>
							<?php echo wp_kses_post($args[ 'comment_notes_before' ]); ?>
							<?php
							do_action('comment_form_before_fields');
							foreach ((array) $args[ 'fields' ] as $name => $field) {
								echo apply_filters("comment_form_field_{$name}", $field) . "\n";
							}
							do_action('comment_form_after_fields');
						}

						echo apply_filters('comment_form_field_comment', $args[ 'comment_field' ]);

						echo wp_kses_post($args[ 'comment_notes_after' ]); ?>

						<div class="form-submit">
							<input class="btn btn-primary" name="submit" type="submit"
							       id="<?php echo esc_attr($args[ 'id_submit' ]); ?>"
							       value="<?php echo esc_attr($args[ 'label_submit' ]); ?>"/>
							<?php comment_id_fields($post_id); ?>
						</div>
						<?php do_action('comment_form', $post_id); ?>
					</form>
				<?php } ?>
			</div><!-- #respond -->
			<?php do_action('comment_form_after'); ?>
		<?php } else { ?>
			<?php do_action('comment_form_comments_closed'); ?>
		<?php } ?>
		<?php
	}
endif;

/**
 * Comments list
 */

if (!function_exists("stream_sports_comments_list")) :

	function stream_sports_comments_list($comment, $args, $depth) {
		$GLOBALS[ 'comment' ] = $comment;
		switch ($comment->comment_type) {
			// Display trackbacks differently than normal comments.
			case 'pingback' :
			case 'trackback' :
				?>

				<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
				<p><?php esc_html_e('Pingback:', 'stream-sports'); ?> <?php comment_author_link(); ?> <?php edit_comment_link(esc_html__('(Edit)', 'stream-sports'), '<span class="edit-link">', '</span>'); ?></p>

				<?php
				break;

			default :
				// Proceed with normal comments.
				global $post;
				?>
			<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
				<div id="comment-<?php comment_ID(); ?>" class="comment media">
					<div class="comment-author clearfix">

						<div class="comment-meta media media-heading">

							<div class="media-left">
								<?php
								$get_avatar = get_avatar($comment, apply_filters('stream_sports_post_comment_avatar_size', 60));
								$avatar_img = stream_sports_get_avatar_url($get_avatar);
								//Comment author avatar
								?>

								<img class="avatar" src="<?php echo esc_url($avatar_img); ?>" alt="<?php echo get_comment_author(); ?>">
							</div>

							<div class="media-body">
								<div class="comment-info">
									<div class="comment-author">
										<?php echo get_comment_author(); ?>
									</div>

									<time datetime="<?php echo get_comment_date(); ?>">
										<?php echo get_comment_date(); ?> <?php echo get_comment_time(); ?>
									</time>


									<div class="comment-meta-wrapper">

										<?php edit_comment_link(esc_html__('Edit', 'stream-sports')); //edit link
										?>

										<?php comment_reply_link(array_merge($args, array(
											'reply_text' => esc_html__('Reply', 'stream-sports'),
											'depth'      => $depth,
											'max_depth'  => $args[ 'max_depth' ]
										))); ?>

									</div>

								</div>


								<?php if ('0' == $comment->comment_approved) { ?>
									<div class="alert alert-info">
										<?php esc_html_e('Your comment is awaiting moderation.', 'stream-sports'); ?>
									</div>
								<?php } ?>

								<div class="comment-content">
									<?php comment_text(); //Comment text ?>
								</div>

							</div>

						</div> <!-- .comment-meta -->
					</div> <!-- .comment-author -->
				</div> <!-- #comment-## -->
				<?php
				break;
		} // end comment_type check

	}

endif;


/**
 * Fetching Avatar URL
 */

if (!function_exists('stream_sports_get_avatar_url')) :

	function stream_sports_get_avatar_url($get_avatar) {
		preg_match("/src='(.*?)'/i", $get_avatar, $matches);

		return $matches[ 1 ];
	}

endif;