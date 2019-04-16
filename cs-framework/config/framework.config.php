<?php if (!defined('ABSPATH')) {
	die;
} // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings = array(
	'menu_title' => __('Theme Options', 'stream-sports'),
	'menu_type' => 'menu',
	'menu_slug' => 'stream_sports_option',
	'framework_title' => __('Stream Sports Options', 'stream-sports'),
	'menu_icon' => 'dashicons-dashboard',
	'menu_position' => 20,
	'ajax_save' => false,
	'show_reset_all' => true,
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options = array();

// Blog Settings
$options[] = array(
	'name' => 'blog_settings',
	'title' => 'Blog Settings',
	'icon' => 'fa fa-file-word-o',
	'fields' => array(

		// Share Button Visibility
		array(
			'id' => 'blog-sidebar',
			'type' => 'switcher',
			'title' => __('Sidebar Visibility', 'rrf-commerce'),
			'subtitle' => __('Show or Hidden Blog sidebar', 'rrf-commerce'),
			'default' => true,
			'text_width' => 100,
		),

		// Post Meta
		array(
			'id' => 'post-meta',
			'type' => 'checkbox',
			'title' => __('Post Meta Setting', 'rrf-commerce'),
			'subtitle' => __('Check to show post meta', 'rrf-commerce'),
			'options' => array(
				'post-date' => __('Post Date', 'rrf-commerce'),
				'post-author' => __('Post Author', 'rrf-commerce'),
				'post-category' => __('Post Category', 'rrf-commerce'),
				'post-comment' => __('Post Comment', 'rrf-commerce'),
			),
			'default' => array('post-date', 'post-author', 'post-category', 'post-comment')
		),

		// Share Button
		array(
			'id' => 'share-button',
			'type' => 'checkbox',
			'title' => __('Post Share Button', 'rrf-commerce'),
			'subtitle' => __('Check to show share button', 'rrf-commerce'),
			'options' => array(
				'facebook' => __('Facebook', 'rrf-commerce'),
				'twitter' => __('Twitter', 'rrf-commerce'),
				'google' => __('Google+', 'rrf-commerce'),
				'linkedin' => __('Linkedin', 'rrf-commerce'),
				'pinterest' => __('Pinterest', 'rrf-commerce'),
			),
			'default' => array('facebook', 'twitter', 'google', 'linkedin', 'pinterest'),
		),

	)
);

// Sports Settings
$options[] = array(
	'name' => 'sport_settings',
	'title' => 'Sports Settings',
	'icon' => 'fa fa-futbol-o',
	'fields' => array(

		// Post Meta
		array(
			'id' => 'post-par-page',
			'type' => 'Select',
			'title' => __('Show Number Of Sports', 'rrf-commerce'),
			'subtitle' => __('select number to show post meta', 'rrf-commerce'),
			'options' => array(
				'1' => __('1 Sport', 'rrf-commerce'),
				'2' => __('2 Sports', 'rrf-commerce'),
				'3' => __('3 Sports', 'rrf-commerce'),
				'4' => __('4 Sports', 'rrf-commerce'),
				'5' => __('5 Sports', 'rrf-commerce'),
				'6' => __('6 Sports', 'rrf-commerce'),
				'7' => __('7 Sports', 'rrf-commerce'),
				'8' => __('8 Sports', 'rrf-commerce'),
				'9' => __('9 Sports', 'rrf-commerce'),
				'10' => __('10 Sports', 'rrf-commerce'),
				'11' => __('11 Sports', 'rrf-commerce'),
				'12' => __('12 Sports', 'rrf-commerce'),
				'13' => __('13 Sports', 'rrf-commerce'),
				'14' => __('14 Sports', 'rrf-commerce'),
				'15' => __('15 Sports', 'rrf-commerce'),
			),
			'default' => '10'
		),

		// Share Button Visibility
		array(
			'id' => 'sport-sidebar',
			'type' => 'switcher',
			'title' => __('Sidebar Visibility', 'rrf-commerce'),
			'subtitle' => __('Show or Hidden Sport sidebar', 'rrf-commerce'),
			'default' => true,
			'text_width' => 100,
		),

	)
);

// Preloader Settings
$options[] = array(
	'name' => 'preloader_settings',
	'title' => 'Preloader Settings',
	'icon' => 'fa fa-repeat',
	'fields' => array(

		// Preloader Visibility
		array(
			'id' => 'preloader-visibility',
			'type' => 'switcher',
			'title' => __('Page Preloader', 'rrf-commerce'),
			'subtitle' => __('You can enable or disable page preloader from here.', 'rrf-commerce'),
			'text_on' => __('Enable', 'rrf-commerce'),
			'text_off' => __('Disable', 'rrf-commerce'),
			'default' => true,
			'text_width' => 100,
		),

		// Preloader Background
		array(
			'id' => 'preloader-background',
			'type' => 'color_picker',
			'title' => __('Preloader Background Color', 'rrf-commerce'),
			'subtitle' => __('Pick color for preloader background (default: #ffffff).', 'rrf-commerce'),
			'default' => '#ffffff',
			'dependency' => array('preloader-visibility', '==', 'true'),
		),

		// Preloader Animation
		array(
			'id' => 'preloader-animation',
			'type' => 'upload',
			'title' => __('Animation file', 'rrf-commerce'),
			'subtitle' => __('Upload loader gif animation file', 'rrf-commerce'),
			'dependency' => array('preloader-visibility', '==', 'true'),
		),

	)
);

// 404 Page
$options[] = array(
	'name' => '404_settings',
	'title' => '404 Page',
	'icon' => 'fa fa-inbox',
	'fields' => array(

		// 404 text
		array(
			'id' => 'error-text',
			'type' => 'text',
			'title' => __('404 Text', 'rrf-commerce'),
			'desc' => __('Change 404 text', 'rrf-commerce'),
			'default' => '404',
		),

		// 404 SubText
		array(
			'id' => 'error-sub-text',
			'type' => 'text',
			'title' => __('404 Subtext', 'rrf-commerce'),
			'desc' => __('Change 404 subtext', 'rrf-commerce'),
			'default' => 'OOPS! PAGE NOT FOUND',
		),

		// 404 Description
		array(
			'id' => 'error-desc',
			'type' => 'textarea',
			'title' => __('404 Description', 'rrf-commerce'),
			'desc' => __('Change 404 description', 'rrf-commerce'),
			'default' => 'Sorry, we couldn\'t find the content you were looking for.',
		),

		// Button Text
		array(
			'id' => 'error-btn',
			'type' => 'text',
			'title' => __('Button Text', 'rrf-commerce'),
			'desc' => __('Change button text, leave blank to hide button', 'rrf-commerce'),
			'default' => 'Go Back Home',
		),

	)
);

// Social Icon
$options[] = array(
	'name' => 'social_settings',
	'title' => 'Social Icon',
	'icon' => 'fa fa-share-alt-square',
	'fields' => array(

		// Facebook
		array(
			'id' => 'social-facebook',
			'type' => 'text',
			'title' => __('Facebook Link', 'rrf-commerce'),
			'subtitle' => __('Enter facebook page or profile link. Leave blank to hide icon.', 'rrf-commerce'),
			'default' => '#',
		),

		// Twitter
		array(
			'id' => 'social-twitter',
			'type' => 'text',
			'title' => __('Twitter Link', 'rrf-commerce'),
			'subtitle' => __('Enter twitter page or profile link. Leave blank to hide icon.', 'rrf-commerce'),
			'default' => '#',
		),

		// Google Plus
		array(
			'id' => 'social-google-plus',
			'type' => 'text',
			'title' => __('Google Plus Link', 'rrf-commerce'),
			'subtitle' => __('Enter google plus page or profile link. Leave blank to hide icon.', 'rrf-commerce'),
			'default' => '#',
		),

		// Pinterest
		array(
			'id' => 'social-pinterest',
			'type' => 'text',
			'title' => __('Pinterest Link', 'rrf-commerce'),
			'subtitle' => __('Enter Pinterest page or profile link. Leave blank to hide icon.', 'rrf-commerce'),
		),

		// Instagram
		array(
			'id' => 'social-instagram',
			'type' => 'text',
			'title' => __('Instagram Link', 'rrf-commerce'),
			'subtitle' => __('Enter Instagram page or profile link. Leave blank to hide icon.', 'rrf-commerce'),
		),


	)
);

// Footer  Settings
$options[] = array(
	'name' => 'footer_settings',
	'title' => 'Footer Settings',
	'icon' => 'fa fa-cube',
	'fields' => array(
		// Footer Copyright
		array(
			'id' => 'footer-copyright',
			'type' => 'wysiwyg',
			'title' => __('Footer Copyright Text', 'rrf-commerce'),
			'subtitle' => __('Write footer copyright text here.', 'rrf-commerce'),
			'default' => '<a href="https://wordpress.org/">Proudly powered by WordPress</a><span class="sep">|</span> Theme: stream-sports by <a href="http://ashrafuloli.com/">Ashraful Islam Oli</a>.',
		),

	)
);

// Backup  Settings
$options[] = array(
	'name' => 'backup_settings',
	'title' => 'Backup Settings',
	'icon' => 'fa fa-shield',
	'fields' => array(

		// Backup
		array(
			'type' => 'backup',
		),

	)
);

CSFramework::instance($settings, $options);
