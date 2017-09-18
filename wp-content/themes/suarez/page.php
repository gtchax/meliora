<?php get_header();
$page_id = tt_get_page_id();
$page_meta = get_post_meta($page_id, 'page_meta');
@$header_subtitle = $page_meta[0]['subtitle'];
@$hide_header = $page_meta[0]['hide_header'];
@$header_icon = $page_meta[0]['icon'];
$sidebar = get_post_meta($page_id, THEME_NAME . '_sidebar_position', true);
$sidebar_status = is_active_sidebar('post-sidebar');

if(empty($sidebar)) : $sidebar = 'full_width'; endif;
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
<?php while(have_posts()) : the_post(); ?>
	<?php if(!has_shortcode(get_the_content(),'vc_row') || ($sidebar !== 'full_width' && has_shortcode(get_the_content(),'vc_row'))) : ?>
		<div class="container">
			<div class="row">
				<?php if($sidebar === 'left' && $sidebar_status) : ?>
					<div class="col-md-5">
						<?php get_sidebar('post'); ?>
					</div>
				<?php endif; ?>
				<div class="col-md-<?php if( $sidebar !== 'full_width' && $sidebar_status ) print '7'; else print '12'; ?>">
					<!-- Article Content -->
					<article class="blog-post page-post">
							<!-- Post Body -->
							<div class="post-body">
	<?php endif; ?>
								<?php the_content(); ?>
	<?php if(!has_shortcode(get_the_content(),'vc_row') || ($sidebar !== 'full_width' && has_shortcode(get_the_content(),'vc_row'))) : ?>
							</div>
					</article>
				</div>
				<?php if($sidebar === 'right' && $sidebar_status) : ?>
					<div class="col-md-5">
						<?php get_sidebar('post'); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
<?php endwhile; ?>
<?php get_footer(); ?>