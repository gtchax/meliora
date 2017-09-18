<?php  if(_go('slider_categories')) : ?>
<div class="tt-carousel blog-filters-carousel" data-items-desktop="4" data-items-tablet="2" data-items-phone="1" data-dots="true" data-arrows="true" data-infinite="true">
	<div class="container">
		<ul class="clean-list carousel-items">
			<?php $slugs_list = str_replace(', ', ',', _go('slider_categories')); ?>
			<?php $slugs = explode(",", $slugs_list); ?>
			<?php foreach($slugs as $slug) : 
				$cat_id = get_category_by_slug( $slug )->term_id; 
				$cat_name = get_category($cat_id)->name;
				?>
				<li class="carousel-item">
					<a href="<?php echo get_category_link($cat_id) ?>" class="blog-category-filter">
						<div class="image">
							<?php if(wp_get_attachment_image( get_option( "category_image_{$cat_id}"), 'tt_category_slider')) :
								echo wp_get_attachment_image( get_option( "category_image_{$cat_id}"), 'tt_category_slider');
								else : ?>
								<img src="<?php echo get_template_directory_uri().'/assets/placeholder-263x380.png' ?>" alt="<?php tt_print($cat_name) ?>">
							<?php endif; ?>
							<span class="category-title"><?php tt_print($cat_name); ?></span>
						</div>
					</a>
				</li>
			<?php endforeach ?>
		</ul>
	</div>
</div>
<?php else : ?>
	<div class="container">
		<h3 class="template-info-message"><?php esc_html_e( 'The Category Slider isn\'t configured yet. Please configure it from Dashboard > Suarez > Addition Options', 'suarez' ); ?></h3>
	</div>
<?php endif; ?>