<?php
$page_id = tt_get_page_id();
$number_of_related = get_post_meta( $page_id, THEME_NAME . '_related_posts', true );
if($number_of_related === '0' || !$number_of_related) $number_of_related = '2';

$orig_post = $post;
global $post;
$categories = get_the_category($post->ID);

if ($categories) :
$category_ids = array();
	foreach( $categories as $individual_category ) $category_ids[] = $individual_category->term_id;
	$args = array(
		'category__in' => $category_ids,
		'post__not_in' => array($post->ID),
		'posts_per_page'=> $number_of_related // Number of related posts that will be shown.
	);

$my_query = new wp_query( $args );

if( $my_query->have_posts() ) : ?>
<!-- Related Posts -->
<div class="related-articles">
	<div class="container">
		<h1 class="section-title"><?php esc_html_e('You Might also Like', 'suarez') ?></h1>
		<div class="row">
				<?php while($my_query->have_posts()) : $my_query->the_post();
					if(has_post_format(array('gallery'))) : ?>
						<div class="col-md-6">
							<?php get_template_part('templates/content-photo'); ?>
						</div>
					<?php else : ?>
						<div class="col-md-6">
							<?php get_template_part('templates/content'); ?>
						</div>
					<?php endif;
				endwhile; ?>
			</div>
		</div>
	</div>
</div>
<?php endif; 
endif;
$post = $orig_post; ?>