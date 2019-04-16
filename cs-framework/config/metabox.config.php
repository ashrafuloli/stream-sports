<?php if (!defined('ABSPATH')) {
	die;
} // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options = array();

$options[] = array(
	'id' => 'sport_meta_options',
	'title' => 'Custom Options',
	'post_type' => 'sport', // or post or CPT or array( 'page', 'post' )
	'context' => 'normal',
	'priority' => 'high',
	'sections' => array(

		// begin section
		array(
			'name' => 'event_options',
			'title' => 'Event option',
			'icon' => 'fa fa-calendar',
			'fields' => array(

				array(
					'id' => 'event_date',
					'type' => 'text',
					'title' => __('Event Date', 'stream-sports'),
					'attributes' => array('type' => 'date'),
				),

				array(
					'id' => 'event_time',
					'type' => 'text',
					'title' => __('Event Time', 'stream-sports'),
					'attributes' => array('type' => 'time'),

				),

				array(
					'id' => 'stream_link',
					'type' => 'text',
					'title' => 'Streem Link',
				),

				// group
				array(
					'id' => 'channels_group',
					'type' => 'group',
					'title' => 'Add Channels',
					'desc' => 'Accordion title using the ID of the field.',
					'button_title' => 'Add New',
					'accordion_title' => 'Channel',
					'fields' => array(

						array(
							'id' => 'channel_name',
							'type' => 'text',
							'title' => 'Channel Name',
							'default' => '1',
						),

						array(
							'id' => 'channel_link',
							'type' => 'text',
							'title' => 'Channel Link',
						),

					)
				), //eng group

			),
		),

		// begin section

		array(
			'name' => 'sports_teams_a_option',
			'title' => 'Set Team "A"',
			'icon' => 'fa fa-hand-grab-o',
			'fields' => array(

				// a field
				array(
					'id' => 'sports_teams_a',
					'type' => 'text',
					'title' => 'Name',
					'desc' => 'Team "A" Name'
				),

				array(
					'id' => 'sports_teams_a_logo',
					'type' => 'image',
					//'default' => 'your-image-path',
					'title' => 'Upload Logo',
				),

				array(
					'id' => 'sports_teams_a_link',
					'type' => 'text',
					'title' => 'Link',
					'desc' => 'Team "A" Link'
				),

			),
		),

		array(
			'name' => 'sports_teams_b_option',
			'title' => 'Set Team "B"',
			'icon' => 'fa fa-hand-grab-o',
			'fields' => array(

				// a field
				array(
					'id' => 'sports_teams_b',
					'type' => 'text',
					'title' => 'Name',
					'desc' => 'Team "B" Name'
				),


				array(
					'id' => 'sports_teams_b_logo',
					'type' => 'image',
					//'default' => 'your-image-path',
					'title' => 'Upload Logo',
				),

				array(
					'id' => 'sports_teams_b_link',
					'type' => 'text',
					'title' => 'Link',
					'desc' => 'Team "B" Link'
				),
			),
		),

	),
);


$page_id = null;
if ( isset( $_REQUEST['post'] ) || isset( $_REQUEST['post_ID'] ) ) {
	$page_id = empty( $_REQUEST['post_ID'] ) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
}

$current_page_template = get_post_meta( $page_id, '_wp_page_template', true );
if ( in_array( $current_page_template, array( 'page-templates/category.php' ) ) ) {
	$options[] = array(
		'id' => 'sport_cat_meta_options',
		'title' => 'Custom Options',
		'post_type' => 'page', // or post or CPT or array( 'page', 'post' )
		'context' => 'normal',
		'priority' => 'high',
		'sections' => array(

			// begin section
			array(
				'name' => 'sports_category',
				'title' => 'Category Posts',
				'icon' => 'fa fa-calendar',
				'fields' => array(

					array(
						'id'          => 'sport_category',
						'type'        => 'select',
						'title'       => 'Select Sports category',
						'placeholder' => 'Select a category',
						'options'     => 'categories',
						'query_args'  => array(
							'type'      => 'sport',
							'taxonomy'  => 'sport_category',
						),
					),

				),
			),


		),
	);
}



CSFramework_Metabox::instance($options);
