<?php 
$page_id = tt_get_page_id();
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$css = !empty($css) ? vc_shortcode_custom_css_class( $css ) : '';
$offset = $offset ? $offset : '0';
$posts_per_page = $posts_per_page ? $posts_per_page : get_option('posts_per_page');

$args = array(
	'post_type'   => 'post',
	'post_status' => 'publish',
	'ignore_sticky_posts' => true,
	'offset' => $offset,
	'posts_per_page' => $posts_per_page
);
$blog_posts = new WP_Query($args);
?>
<h1 class="section-title"><?php esc_html_e('Posts', 'suarez') ?></h1>
<?php $i = 0; $half_posts = $posts_per_page / 2; ?>
<div class="sort-target col-md-6">
	<?php if($blog_posts->have_posts()) : 
		while($blog_posts->have_posts()) : $blog_posts->the_post();
			if(has_post_format(array('gallery'))) :
				get_template_part('templates/content-photo');
			else :
				get_template_part('templates/content');
			endif;
				$i++;
				if($i == (int)$half_posts) echo '</div><div class="col-md-6">';
		endwhile;
	else : ?>
		<h1 class="section-title neg_search"><?php esc_html_e('Sorry, but there was nothing found.', 'suarez') ?></h1>
	<?php endif;
	wp_reset_postdata(); ?>
</div>