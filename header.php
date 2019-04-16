<?php if ( ! defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package stream_sports
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<?php

	if(function_exists('cs_framework_init')):
	$stream_sports_preloader_gif = get_template_directory_uri(). '/assets/images/preloader.gif';
	$stream_sports_preloader_bg = '#fff';

	if(!empty(cs_get_option('preloader-background'))){
		$stream_sports_preloader_bg = cs_get_option('preloader-background');
	}

	if(!empty(cs_get_option('preloader-animation'))){
		$stream_sports_preloader_gif = cs_get_option('preloader-animation');
	}
	if (1 == cs_get_option('preloader-visibility')):
	?>
	<div class="preloader" style="background-color: <?php echo $stream_sports_preloader_bg ?>">
		<div class="status">

			<div class="status-mes" style="background-image: url(<?php echo $stream_sports_preloader_gif ?>);">
			</div>
		</div>
	</div>
	<?php endif; endif; ?>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'stream-sports'); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="row align-items-center primary-header">
				<div class="col-xl-6">
					<div class="site-branding">
						<?php
						if (has_custom_logo()) :
							the_custom_logo();
						else :
							?>
							<h2 class="site-title">
								<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
							</h2>
						<?php endif; ?>
					</div><!-- .site-branding -->
				</div>
				<?php if(function_exists('cs_framework_init')): ?>
				<div class="col-xl-6">
					<div class="social-link">
						<?php if(!empty(cs_get_option('social-facebook'))): ?>
						<a href="<?php echo esc_url(cs_get_option('social-facebook')) ?>"><i class="fab fa-facebook-f"></i></a>
						<?php endif;
						if(!empty(cs_get_option('social-twitter'))): ?>
						<a href="<?php echo esc_url(cs_get_option('social-twitter')) ?>"><i class="fab fa-twitter"></i></a>
						<?php endif;
						if(!empty(cs_get_option('social-google-plus'))): ?>
						<a href="<?php echo esc_url(cs_get_option('social-google-plus')) ?>"><i class="fab fa-google-plus"></i></a>
						<?php endif;
						if(!empty(cs_get_option('social-pinterest'))): ?>
						<a href="<?php echo esc_url(cs_get_option('social-pinterest')) ?>"><i class="fab fa-instagram"></i></a>
						<?php endif;
						if(!empty(cs_get_option('social-instagram'))): ?>
						<a href="<?php echo esc_url(cs_get_option('social-instagram')) ?>"><i class="fab fa-pinterest"></i></a>
						<?php endif; ?>
					</div>
				</div>
				<?php endif; ?>
			</div>

			<nav id="site-navigation" class="site-navigation">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'primary',
					'menu_id' => 'primary-menu',
					'container' => '',
				));
				?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
