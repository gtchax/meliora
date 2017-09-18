<?php get_header();
/**
 * Blog Page
 */
$page_id = tt_get_page_id();
$page_meta = get_post_meta($page_id, 'page_meta');
@$header_subtitle = $page_meta[0]['subtitle'];
@$hide_header = $page_meta[0]['hide_header'];
@$header_icon = $page_meta[0]['icon'];
$sidebar = get_post_meta($page_id, THEME_NAME . '_sidebar_position', true);
$sidebar_status = is_active_sidebar('main-sidebar');
?>
	<?php if(!$hide_header) : ?>
		<!-- Single Page Cover -->
		<div class="single-page-cover">
			<?php if(has_post_thumbnail($page_id)) : ?>
				<div class="image">
					<img src="<?php echo get_the_post_thumbnail_url( $page_id, 'tt_single_page' ); ?>" alt="single page image" />
				</div>
			<?php else : ?>
				<div class="image">
					<img src="<?php echo get_template_directory_uri() . '/assets/placeholder-1840x575.png' ?>" alt="single page image" />
				</div>
			<?php endif; ?>
			<div class="page-cover-content">
				<div class="container">
					<h2 class="title"><?php echo get_the_title($page_id) ?></h2>
					<?php if($header_subtitle) : ?>
						<p class="sub-title"><?php tt_print($header_subtitle) ?></p>
					<?php endif; ?>
					<?php if($header_icon) : ?>
						<i class="icon-<?php tt_print($header_icon) ?>"></i>
					<?php endif ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<section class="section section-articles">
		<?php if(!_go('hide_category_slider')) : 
			get_template_part('templates/category_slider');
		endif; ?>
		<div class="container">
			<?php if(!_go('hide_category_slider')) : ?>
				<h1 class="section-title smaller"><?php esc_html_e('Select Category', 'suarez') ?></h1>
			<?php else : ?>
				<h1 class="section-title smaller"><?php esc_html_e('Select a Post', 'suarez') ?></h1>
			<?php endif; ?>
			<div class="row">
				<?php if($sidebar === 'left' && $sidebar_status) : ?>
					<div class="col-md-5">
						<?php get_sidebar(); ?>
					</div>
				<?php endif; ?>
				<?php $i = 0; $half_posts = get_option('posts_per_page') / 2; ?>
				<div class="sort-target col-md-<?php echo $sidebar !== 'full_width' && $sidebar_status ? 7 : 6; ?>">
					<?php if(have_posts()) : 
						while(have_posts()) : the_post();
							if(has_post_format(array('gallery'))) :
								get_template_part('templates/content-photo');
							else :
								get_template_part('templates/content');
							endif;
							if( $sidebar === 'full_width' && $sidebar_status ) :
								$i++;
								if($i == (int)$half_posts) echo '</div><div class="col-md-6">';
							endif;
						endwhile;
					else : ?>
						<h1 class="section-title neg_search"><?php esc_html_e('Sorry, but there was nothing found.', 'suarez') ?></h1>
					<?php endif; ?>
				</div>
				<?php if($sidebar === 'right' && $sidebar_status) : ?>
					<div class="col-md-5">
						<?php get_sidebar(); ?>
					</div>
				<?php endif; ?>
			</div>
			<?php get_template_part('templates/pagination'); ?>
		</div>
	</section>
<?php get_footer() ?>