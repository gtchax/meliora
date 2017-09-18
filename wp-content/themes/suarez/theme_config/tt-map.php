<?php
$vc_is_wp_version_3_6_more = version_compare( preg_replace( '/^([\d\.]+)(\-.*$)/', '$1', get_bloginfo( 'version' ) ), '3.6' ) >= 0;

//  Add Parameters to row
vc_add_params('vc_row', array(
	array(
		'type' => 'checkbox',
		'heading' => esc_attr__( 'Show Title?', 'suarez' ),
		'param_name' => 'sc_title',
		'description' => esc_attr__( 'If checked Title will be shown at top', 'suarez' ),
		'value' => array( esc_attr__( 'Yes', 'suarez' ) => 'yes' )
	),
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Section title', 'suarez' ),
		'param_name' => 'section_title',
		'value' => '',
		'description' => esc_attr__( 'Set Section title', 'suarez' ),
		'dependency' => array(
			'element' => 'sc_title',
			'not_empty' => true,
		),
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_attr__( 'Choose section style', 'suarez' ),
		'param_name' => 'sc_title_style',
		'description' => esc_attr__( 'Select style type.', 'suarez' ),
		'value'         =>  array(
			esc_attr__('Light', 'suarez')    =>  'standard',
			esc_attr__('Dark', 'suarez')     =>  'inverted'
		),
		'std'   =>  'standard'
	),
));
/*TT Featured Page
----------------------------------------------------------- */
vc_map( array(
	'name' => esc_attr__( 'Featured Page', 'suarez' ),
	'base' => 'tt_featured_page',
	'icon' => 'icon-wpb',
	'category' => esc_attr__( 'TeslaThemes', 'suarez' ),
	'description' => esc_attr__( 'Tesla Team', 'suarez' ),
	"params" => array(
		array(
			'type' => 'textfield',
			'heading' => esc_attr__( 'Page slug', 'suarez' ),
			'param_name' => 'page_slug',
			'description' => esc_attr__( 'Example: about-me-page', 'suarez' ),
			'admin_label' => true,
		),
		array(
			'type' => 'css_editor',
			'heading' => esc_attr__( 'CSS box', 'suarez' ),
			'param_name' => 'css',
			'group' => esc_attr__( 'Design Options', 'suarez' )
		)
	)
) );

/* Contact Form 
-----------------------------------------------------------*/
vc_map( array(
	'name' => esc_attr__( 'Tesla Contact Form', 'suarez' ),
	'base' => 'tt_contact_form',
	'icon' => 'icon-wpb',
	'category' => esc_attr__( 'TeslaThemes', 'suarez' ),
	'description' => esc_attr__( 'By using this shortcode you have to go to theme options and create a contact form.', 'suarez' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => esc_attr__( 'Form Title', 'suarez' ),
			'param_name' => 'form_title',
			'description' => esc_attr__( 'Example: Say Hello !', 'suarez' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => esc_attr__( 'Form Description', 'suarez' ),
			'param_name' => 'form_description',
			'description' => esc_attr__( 'Example: Your Questions and Sp ...', 'suarez' ),
			'admin_label' => true,
		),
		 array(
			'type' => 'checkbox',
			'heading' => __( 'Hide contact Map?', 'suarez' ),
			'param_name' => 'hide_map',
			'description' => __( 'Please provide your map coordinates Dashboard -> Suarez -> Contact Info', 'suarez' ),
			'value' => array( __( 'Yes', 'suarez' ) => 'yes' )
		),
		  array(
			'type' => 'checkbox',
			'heading' => __( 'Hide socials ?', 'suarez' ),
			'param_name' => 'hide_socials',
			'value' => array( __( 'Yes', 'suarez' ) => 'yes' )
		),
		array(
			'type' => 'css_editor',
			'heading' => esc_attr__( 'CSS box', 'suarez' ),
			'param_name' => 'css',
			'group' => esc_attr__( 'Design Options', 'suarez' )
		),
	)
));

/* Blog Posts
-----------------------------------------------------------*/
vc_map( array(
	'name' => esc_attr__( 'Blog Posts', 'suarez' ),
	'base' => 'tt_blog_posts',
	'icon' => 'icon-wpb',
	'category' => esc_attr__( 'TeslaThemes', 'suarez' ),
	'description' => esc_attr__( 'It displays a list of posts from blog with set offset.', 'suarez' ),
	'params' => array(
		array(
			'type' => 'textfield',
			'heading' => esc_attr__( 'Number of posts.', 'suarez' ),
			'param_name' => 'posts_per_page',
			'description' => esc_attr__( 'Ex: 10.', 'suarez' ),
			'admin_label' => true,
		),
		array(
			'type' => 'textfield',
			'heading' => esc_attr__( 'Offset', 'suarez' ),
			'param_name' => 'offset',
			'description' => esc_attr__( 'Number of posts to skip. Ex: 2.', 'suarez' ),
			'admin_label' => true,
		),
		array(
			'type' => 'css_editor',
			'heading' => esc_attr__( 'CSS box', 'suarez' ),
			'param_name' => 'css',
			'group' => esc_attr__( 'Design Options', 'suarez' )
		),
	)
));