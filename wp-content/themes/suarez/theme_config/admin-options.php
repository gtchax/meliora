<?php

return array(
	'favico' => array(
		'dir' => '/theme_config/icons/16x16.png'
	),
	'option_saved_text' => 'Options successfully saved',
	'tabs' => array(
		array(
			'title'=>'General Options',
			'icon'=>1,
			'boxes' => array(
				'Logo Customization' => array(
					'icon'=>'customization',
					'size'=>'2_3',
					'columns'=>true,
					'description'=>'Here you upload a image as logo or you can write it as text and select the logo color, size, font.',
					'input_fields' => array(
						'Home Logo As Image'=>array(
							'size'=>'half',
							'id'=>'home_logo_image',
							'type'=>'image_upload',
							'note'=>'Here you can insert your link to a image logo or upload a new logo image for homepage'
						),
						'Logo As Text'=>array(
							'size'=>'half_last',
							'id'=>'logo_text',
							'type'=>'text',
							'note' => "Type the logo text here, then select a color, set a size and font",
							'color_changer'=>true,
							'font_changer'=>true,
							'font_size_changer'=>array(8,50, 'px'),
							'font_preview'=>array(true, true)
						)	
					)
				),
				'Favicon' => array(
					'icon'=>'customization',
					'size'=>'1_3_last',
					'input_fields' => array(
						array(
							'id'=>'favicon',
							'type'=>'image_upload',
							'note'=>'Here you can upload the favicon icon.<br><br><br><br><br><br>'
						)
					)
				),
				'Custom CSS' => array(
					'icon'=>'css',
					'size'=>'half',
					'description'=>'Here you can write your personal CSS for customizing the classes you want. Or use our <b>Custom Styler</b>, from the Site Colors tab, for an easier custom css color picking.',
					'input_fields' => array(
						array(
							'id'=>'custom_css',
							'type'=>'textarea'
						)
					)
				),
				'Custom JS' => array(
					'icon'=>'js',
					'size'=>'half_last',
					'description'=>'Here you can write your personal JS that will be appended to footer.<br><br>',
					'input_fields' => array(
						array(
							'id'=>'custom_js',
							'type'=>'textarea'
						)
					)
				)
			)
		),
		array(
			'title' => 'Site Colors',
			'icon'=>4,
			'boxes' => array(
				'Background Customization'=>array(
					'icon'=>'customization',
					'columns'=>true,
					'size' => '1',
					'input_fields' => array(
							'Background Color'=>array(
								'size'=>'half',
								'id'=>'bg_color',
								'type'=>'colorpicker'
							),
							'Background Image' => array(
								'size'=>'half_last',
								'id'=>'bg_image',
								'type'=>'image_upload'
							)
						)
					),
					'Site Colors' => array(
						'icon'=>'background',
						'columns'=>true,
						'size' => '1',
						'input_fields' => array(
							'Primary Site Color'=>array(
								'size'=>'1_2',
								'id'=>'site_color',
								'type'=>'colorpicker',
								'note'=>'Choose primary color for your website. This will affect only specific elements, such as post links, widgets title underline etc...<br>To return to default color , open colorpicker and click the Clear button.'
							),
							'Secondary Site Color'=>array(
								'size'=>'1_2',
								'id'=>'site_color_2',
								'type'=>'colorpicker',
								'note'=>'Choose secondary color for your website. This will affect only specific elements.<br>To return to default color , open colorpicker and click the Clear button.'
							)
						)
					)
				)
			),
		array(
				'title' => 'Typography',
				'icon'  => 1,
				'boxes' => array(
					'Font Changers'=>array(
						'icon' => 'customization',
						'description'=>'Change the fonts & colors for site\'s sections:',
						'size'=>'1',
						'columns'=>true,
						'input_fields' => array(
							'Main Content Font/Color'=>array(
								'size'=>'1_3',
								'id'=>'main_content_text',
								'type'=>'text',
								'note' => "Then select a color, set a size and choose a font",
								'color_changer'=>true,
								'font_changer'=>true,
								'font_size_changer'=>array(8,50, 'px'),
								'hide_input'=>true,
							),
							'Secondary Font/Color'=>array(
								'size'=>'1_3',
								'id'=>'sidebar_text',
								'type'=>'text',
								'note' => "Then select a color, set a size and choose a font",
								'color_changer'=>true,
								'font_changer'=>true,
								'font_size_changer'=>array(8,50, 'px'),
								'hide_input'=>true,
							),
							'Thirdary Font/Color'=>array(
								'size'=>'1_3_last',
								'id'=>'menu_text',
								'type'=>'text',
								'note' => "Then select a color, set a size and choose a font",
								'color_changer'=>true,
								'font_changer'=>true,
								'font_size_changer'=>array(8,50, 'px'),
								'hide_input'=>true,
							)
						)
					)
				)
			),
		array(
			'title' => 'SEO and Socials',
			'icon'=>3,
			'boxes'=>array(
				'ShareThis feature'=>array(
					'icon'=>'social',
					'description'=>"To use this service please select your favorite social networks and it will be displayed under posts.",
					'size'=>'half',
					'input_fields'=>array(
						array(
							'type'  => 'select',
							'id'    => 'share_this',
							'note' => 'Facebook',
							'class'  => 'social_search',
							'multiple' => true,
							'options'=>array('Google'=>'googleplus','Facebook'=>'facebook','Twitter'=>'twitter','Pinterest'=>'pinterest','Linkedin'=>"linkedin",'Vkontakte'=>'vkontakte')
						)
					)
				),
				'Social Platforms'=>array(
					'icon'=>'social',
					'description'=>"Insert the link to the social share page.",
					'size'=>'half',
					'columns'=>true,
					'input_fields'=>array(
						array(
							'id'=>'social_platforms',
							'type'=>'social_platforms',
							'platforms'=>array('facebook','twitter','google','pinterest','linkedin','dribbble','behance','youtube','flickr','rss')
						)
					)
				)
			)
		),
		array(
			'title' => 'Header',
			'icon'  => 8,
			'boxes' => array(
				'Header' => array(
					'icon'=>'customization',
					'size'=>'1',
					'input_fields' => array(
						'Default Hero Image'=>array(
							'size'=>'half',
							'id'=>'default_hero_image',
							'type'=>'image_upload',
							'note'=>'Here you can insert your link to a image or upload a new image for header'
						),
						'Navigation Style' => array(
							'size'	=> 'half',
							'id' => 'navigation_style',
							'type' => 'radio',
							'values' => array('Sticky', 'Simple')
						)
					)
				) 
			)
		),
		array(
			'title' => 'Footer',
			'icon'  => 8,
			'boxes' => array(
				'Footer' => array(
					'icon'=>'customization',
					'size'=>'1',
					'input_fields' => array(

						'Copiright Text' => array(
							'id'=>'copyright_text',
							'type'=>'text',
							'note'=>'Type in your custom copyright message. Remenber that if you leave it blank then the default message will be shown. <b>(It accepts HTML)</b>'
						),
						'Hide Copyright Row' => array(
							'id'=>'hide_copyright',
							'type'=>'checkbox',
							'note'=>'Choose whether to show or hide the copyright inscription.'
						)
					)
				) 
			)
		),
		array(
			'title' => 'Additional Options',
			'icon'  => 6,
			'boxes' => array(
				'Facebook'=>array(
					'icon' => 'customization',
					'description'=>"Insert a website domain so the comments will assiciate with it.",
					'size'=>'1_3',
					'input_fields' =>array(
						'Comments Website' => array(
							'id'    => 'facebook_comments_url',
							'type'  => 'text',
							'note' => 'This url that you paste here helps you to track from where the comments are comming on facebook and how much of them are there. Example: http://teslathemes.com',
						),
						'Number of comments' => array(
							'id'    => 'nbr_of_facebook_comments',
							'type'  => 'text',
							'note' => 'Accepts only numbers.',
						),
						'Language' => array(
							'id'    => 'facebook_comments_language',
							'type'  => 'select',
							'note' => 'Choose the language for the comments plugin.',
							'options'=>array(
								'English'=>'en_US',
								'French'=>'fr_FR',
								'Russian'=>'ru_RU',
								'German'=>'de_DE',
								'Spanish (Spain)'=>'es_ES',
								'Bulgarian'=>'bg_BG',
								'Romanian'=> 'ro_RO'
							)
						),
						'Hide the comments' => array(
							'id'=>'use_facebook_comments',
							'type'=>'checkbox',
							'note'=>'Choose whether to show or hide facebook comments.'
						)
					)
				),
				'Category Slider'=>array(
					'icon' => 'customization',
					'description'=>"Here you can choose which categories will be shown in the category slider on the blog.",
					'size'=>'1_3',
					'input_fields' =>array(
						'Category Slugs' => array(
							'id'    => 'slider_categories',
							'type'  => 'text',
							'note' => 'Enter the category slugs SEPARATED BY COMAS. if you don\'t use commas then it won\'t work.',
						),
						'Hide the category slider' => array(
							'id'=>'hide_category_slider',
							'type'=>'checkbox',
							'note'=>'Choose whether to show or hide the category slider on the blog page.'
						)
					)
				),
				'404 Page' => array(
					'icon'=>'customization',
					'size'=>'1',
					'input_fields' => array(
						'404 ERROR IMAGE'=>array(
							'size'=>'1_3',
							'id'=>'404_bg_image',
							'type'=>'image_upload',
							'note'=>'Here you can insert your link to a image or upload a new image for the error page - 404.'
						),
						'Title Text' => array(
							'id'=>'404_title',
							'type'=>'text',
							'note'=>'Type in your custom 404 title. Remenber that if you leave it blank the default message will be shown. (ERROR 404)'
						),
						'Error Message' => array(
							'id'=>'404_message',
							'type'=>'text',
							'note'=>'Type in your custom 404 error message. If you leave it blank the default message will be shown.'
						),
						'Button Text' => array(
							'id'=>'404_button_text',
							'type'=>'text',
							'note'=>'Type in your custom 404 button text. If you leave it blank the default message will be shown.'
						)
					)
				),
			)
		),
		array(
			'title' => 'Contact Info',
			'icon' => 5,
			'boxes' => array(
				
				'Google Settings'=>array(
					'icon' => 'customization',
					'description'=>"Provide contact information. This information will appear in contact template. For more informations read documentation.",
					'size'=>'1',
					'columns'=>true,
					'input_fields' =>array(
						'Map' => array(
							'id'    => 'map-wrapper',
							'type'  => 'map',
							'note'	=> 'Just navigate to the location you want to be displayed on the google map and if you want a pin over your location , press the "Drop marker here" button. ' ,
							'icons' => array('google-marker.gif', '../../../../theme_config/icons/map-pin.png'),
							'size'	=> '1',
							'style'	=>	'',
							'mapOptions'=> '',
						)
					)
				),
			)
		),
		array(
			'title' => 'Subscribers',
			'icon' => 7,
			'boxes' => array(
				'Subscribers'=>array(
					'icon' => 'social',
					'description'=>'First 20 subscribers are listed here. To get the full list export files using buttons below:',
					'size'=>1,
					'input_fields' => array(
						array(
							'type'=>'subscription',
							'id'=>'subscribe-form'
						)
					)
				)
			)
		),
	),
	'styles' => array( array('wp-color-picker'),'style','select2' ),
	'scripts' => array( array( 'jquery', 'jquery-ui-core','jquery-ui-datepicker','wp-color-picker' ), 'select2.min','jquery.cookie','tt_options', 'admin_js' )
);