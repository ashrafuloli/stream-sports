<?php if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package stream_sports
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="copyright">
				<?php
				if (function_exists('cs_framework_init')){
					echo cs_get_option('footer-copyright');
				}else{
					echo apply_filters('the_content', '<a href="https://wordpress.org/">Proudly powered by WordPress</a>');
				}
				?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
