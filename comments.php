<?php if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package stream_sports
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-wrapper">
	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
			printf( esc_html( _nx( 'One comment', '%s comments', get_comments_number(), 'comments title', 'stream-sports' ) ),
				number_format_i18n( get_comments_number() ) );
			?>
		</h3>
		<ul class="comment-list">
			<?php
			wp_list_comments( array(
				'style'       => 'li',
				'short_ping'  => true,
				'avatar_size' => 50,
				'callback'    => 'stream_sports_comments_list'
			));
			?>
		</ul><!-- .comment-list -->
	<?php endif; // have_comments()

	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav class="navigation comment-navigation" role="navigation">
			<h3 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'stream-sports' ); ?></h3>
			<ul class="pager comment-navigation">
				<li class="previous"><?php previous_comments_link( '<i class="fa fa-angle-double-left"></i> ' . esc_html__( 'Older Comments', 'stream-sports' ) ); ?></li>
				<li class="next"><?php next_comments_link( esc_html__( 'Newer Comments', 'stream-sports' ) . '<i class="fa fa-angle-double-right"></i>' ); ?></li>
			</ul>
		</nav><!-- .comment-navigation -->
	<?php endif;  // Check for comment navigation   ?>

	<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<div class="alert alert-warning no-comments"><?php esc_html_e( 'Comments are closed.' , 'stream-sports' ); ?></div>
	<?php else :
		if (function_exists('stream_sports_comment_form')) :
			stream_sports_comment_form();
		else :
			comment_form();
		endif;
	endif; ?>
</div><!-- /#comments -->
