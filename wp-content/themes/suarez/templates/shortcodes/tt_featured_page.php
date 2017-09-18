<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$css = !empty($css) ? vc_shortcode_custom_css_class( $css ) : '';
$args = array(
	'name'        => $page_slug,
	'post_type'   => 'page',
	'post_status' => 'publish',
	'numberposts' => 1
);
if($page_slug == '') :
	$my_posts = null;
else :
	$my_posts = get_posts($args);
endif;
if($my_posts) : 
	$page_meta = get_post_meta($my_posts[0]->ID, 'page_meta');
	@$header_subtitle = $page_meta[0]['subtitle'];
	@$header_icon = $page_meta[0]['icon']; ?>
	<div class="author-bio-block raised-up <?php tt_print($css) ?>">
		<div class="row row-fit">
			<div class="col-md-7">
				<div class="block-description">
					<?php if($header_subtitle) : ?>
						<span class="block-heading"><?php tt_print($header_subtitle); ?></span>
					<?php endif; ?>
					<h3 class="block-title"><?php tt_print($my_posts[0]->post_title) ?></h3>
					<p class="block-text"><?php echo get_the_excerpt($my_posts[0]->ID) ?></p>
					<div class="delimiter">
						<?php if($header_icon) : ?>
							<i class="icon-<?php tt_print($header_icon); ?>"></i>
						<?php endif; ?>
					</div>
					<a href="<?php the_permalink($my_posts[0]->ID) ?>" class="btn btn-default">
						<span class="text"><?php esc_html_e('Read more', 'suarez') ?></span>
					</a>
				</div>
			</div>

			<div class="col-md-5">
				<div class="block-image">
					<?php if(has_post_thumbnail( $my_posts[0]->ID )) : ?>
						<img src="<?php echo get_the_post_thumbnail_url( $my_posts[0]->ID, 'tt_featured_post' ); ?>" alt="<?php tt_print($my_posts[0]->post_title) ?>">
					<?php else : ?>
						<img src="<?php echo get_template_directory_uri().'/assets/placeholder-570x410.png' ?>" alt="<?php tt_print($my_posts[0]->post_title) ?>">
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php else : ?>
	<div class="author-bio-block raised-up">
		<div class="row row-fit">
			<div class="col-md-12">
				<div class="block-description">
					<h5><?php esc_html_e('You haven\'t specified any page slugs, please add a page slug. Thank you.', 'suarez' ); ?></h5>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
