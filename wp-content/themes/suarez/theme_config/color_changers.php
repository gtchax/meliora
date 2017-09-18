<?php
/***********************************************************************************************/
/* Custom CSS */
/***********************************************************************************************/

add_action('wp_enqueue_scripts', 'tt_tesla_custom_css', 99);
function tt_tesla_custom_css() {
	wp_enqueue_script('comment-reply');
	$custom_css = _go('custom_css') ? _go('custom_css') : '';
	wp_add_inline_style('tt-main-style', $custom_css);
}

add_action('wp_enqueue_scripts', 'tt_style_changers',99);
function tt_style_changers(){
	$background_color = _go('bg_color') ;
	$background_image = _go('bg_image') ;
	if($background_image || $background_color)
		wp_add_inline_style('tt-main-style', "body{background-color: $background_color; background-image: url('$background_image')}");

	$colopickers_css = '';
	if (_go('site_color')):
        $lighter_color = adjustBrightness(_go('site_color'), 80);
        $lighter_color_2 = adjustBrightness(_go('site_color'), 150);
		$colopickers_css .= '  
		.main-footer .footer-socials .footer-nav ul li a:hover,
		.main-footer .footer-socials .social-links li a:hover,
		.main-footer .copyrights a:hover,
		.blog-post.single .post-header .date, .blog-post.page-post .post-header .date,
		.blog-post.single .post-footer .share-block .title:before, .blog-post.page-post .post-footer .share-block .title:before,
		.btn.btn-simplified,
		.blog-post.single .post-footer .share-block .share-list li a i, .blog-post.page-post .post-footer .share-block .share-list li a i,
		.comments-form .input-line .placeholder:after, .contact-form .input-line .placeholder:after,
		.author-bio-block .block-description .delimiter i,
		.author-bio-block .block-description .block-heading,
		.article .article-body .category a:hover,
		ul.page-numbers li span.page-numbers,
		ul.page-numbers li .page-numbers:hover,
		.main-search-form .form-submit {
			color: '._go('site_color').' !important;
		}
				
		.main-sidebar .widget.widget_sort_posts .sort-posts-block .icon-filters-icon, 
		.subscribe-form .form-submit i, .subscribe-form .form-submit .text,
		.blog-post.single .post-header .date, .blog-post.page-post .post-header .date,
		.blog-post.single .post-footer .share-block .title:before, .blog-post.page-post .post-footer .share-block .title:before,
		.btn.btn-default,
		.contact-box .box-inner .contact-details .details-description:after,
		.author-bio-block .block-description .delimiter i,
		.author-bio-block .block-description .block-heading,
		ul.page-numbers li span.page-numbers,
		.main-search-form .form-submit {
			background : '._go('site_color').' !important;
		}';
	endif;

	if (_go('site_gcolor_2')) :

		$colopickers_css .= ' 
		.article .article-body .category.color-2,
		.blog-post.single .post-header .categories, .blog-post.page-post .post-header .categories{
			color:  '._go('site_gcolor_2').';
		}

		';
	endif;

	wp_add_inline_style('tt-main-style', $colopickers_css);

	//Custom Fonts Changers
	wp_add_inline_style('tt-main-style', tt_text_css('main_content_text','h1, h2','px'));
	wp_add_inline_style('tt-main-style', tt_text_css('sidebar_text','h3, h4', 'p', 'px'));
	wp_add_inline_style('tt-main-style', tt_text_css('menu_text','h5, h6, footer, single-blog-post','px'));
}