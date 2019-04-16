<?php if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package stream_sports
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>
<div class="col-xl-3">
	<aside id="secondary" class="widget-area">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</aside><!-- #secondary -->
</div>