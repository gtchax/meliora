<?php
return array(
		'metaboxes'=>array(
			array(
				'id'             => 'post_settings_',          // meta box id, unique per meta box
				'title'          => esc_attr_x('Post Settings','meta boxes','suarez'),         // meta box title,'meta boxes','suarez')e
				'post_type'      => array('post'),
				'priority'		 => 'low',
				'context'		=> 'normal',
				'input_fields'   => array(            // list of meta fields (can be added by field arrays)
					'sidebar_position'  =>  array(
						'name'  =>  esc_attr_x('Sidebar Position','meta boxes','suarez'),
						'type'  =>  'select',
						'values'    =>  array(
								'as_blog'   =>  esc_attr_x('Same as Blog Page','meta boxes','suarez'),
								'full_width'=>  esc_attr_x('No Sidebar/Full Width','meta boxes','suarez'),
								'right'     =>  esc_attr_x('Right','meta boxes','suarez'),
								'left'      =>  esc_attr_x('Left','meta boxes','suarez'),
							),
						'std'   =>  'as_blog'  //default value selected
					),
					'time_to_read'  =>  array(
						'name'  =>  esc_attr_x('Estimated reading time','meta boxes','suarez'),
						'type'  =>  'text',
						'desc'	=> esc_attr_x('example: 5 min to read','meta boxes', 'suarez')
					),
					'related_posts_on_off'  =>  array(
						'name'  =>  esc_attr_x('Related Posts visibility','meta boxes','suarez'),
						'type'  =>  'select',
						'values'    =>  array(
								'show_related_posts'	=>  esc_attr_x('Show Related Posts','meta boxes','suarez'),
								'hide_related_posts'	=>  esc_attr_x('Hide Related Posts','meta boxes','suarez')
							),
						'std'   =>  'show_related_posts',  //default value selected
						'desc'	=> esc_attr_x('Choose to show or hide the "related posts" section.','meta boxes', 'suarez')
					),
					'related_posts'  =>  array(
						'name'  =>  esc_attr_x('Number of Related Posts','meta boxes','suarez'),
						'type'  =>  'number',
						'desc'	=> esc_attr_x('Number of related posts under the comments field.','meta boxes', 'suarez')
					),
				)
			),
			
			array(
				'id'             => 'page_settings_',            // meta box id, unique per meta box
				'title'          => esc_attr_x('Page Settings','meta boxes','suarez'),   // meta box title
				'post_type'      => array('page'),		// post types, accept custom post types as well, default is array('post'); optional
				'taxonomy'       => array(),    // taxonomy name, accept categories, post_tag and custom taxonomies
				'context'		 => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
				'priority'		 => 'low',						// order of meta box: high (default), low; optional
				'input_fields'   => array(
					
					
					'sidebar_position'  =>  array(
						'name'  =>  esc_attr_x('Sidebar Position','meta boxes','suarez'),
						'type'  =>  'select',
						'values'    =>  array(
								'full_width'    =>  esc_attr_x('No Sidebar/Full Width','meta boxes','suarez'),
								'right'         =>  esc_attr_x('Right','meta boxes','suarez'),
								'left'          =>  esc_attr_x('Left','meta boxes','suarez'),
							),
						'std'   =>  'full_width'  //default value selected
					),
				)
			),
		)
	);