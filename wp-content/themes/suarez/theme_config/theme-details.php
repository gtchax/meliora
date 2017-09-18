<?php
define('THEME_NAME', 'suarez');
define('THEME_PRETTY_NAME', 'Suarez');

//Load Textdomain
function tt_theme_textdomain_setup(){
    if(load_theme_textdomain('suarez', file_exists(get_stylesheet_directory() . '/languages') ? get_stylesheet_directory() . '/languages' : get_template_directory() . '/languages'))
        define('TT_TEXTDOMAIN_LOADED',true);
}
add_action('after_setup_theme', 'tt_theme_textdomain_setup');



//content width
if (!isset($content_width))
    $content_width = 1170;

//============Theme support=======
//post-thumbnails
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('gallery'));
//add feed support
add_theme_support('automatic-feed-links');
//add  html5 support
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'caption' ));
add_theme_support( 'custom-header' );
add_theme_support( 'custom-background' );
 add_theme_support( 'title-tag' );

add_image_size( 'tt_single_post', 262, 264, array( 'center', 'center'));
add_image_size( 'tt_single_photo', 570, 410, array( 'center', 'center'));
add_image_size( 'tt_single_page', 1840, 575, array( 'center', 'center'));
add_image_size( 'tt_category_slider', 263, 380, array( 'center', 'center'));
add_image_size( 'tt_popular_posts', 370, 130, array( 'center', 'center'));
add_image_size( 'tt_featured_post', 475, 418, array( 'center', 'center'));
