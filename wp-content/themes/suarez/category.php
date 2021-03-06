<?php get_header(); 
$blog_page = get_option( 'page_for_posts' );
$sidebar = get_post_meta( $blog_page, THEME_NAME . '_sidebar_position', true );
$sidebar_status = is_active_sidebar('main-sidebar');
$page_meta = get_post_meta($blog_page, 'page_meta');
@$header_icon = $page_meta[0]['icon'];
global $cat;
?>
<div class="single-page-cover">
		<div class="image">
			<?php if(wp_get_attachment_image( get_option( "category_image_{$cat}"), 'tt_single_page')) :
				echo wp_get_attachment_image( get_option( "category_image_{$cat}"), 'tt_single_page');
			elseif(_go('default_hero_image')) : ?>
				<img src="<?php _eo('default_hero_image') ?>" alt="single page image" />
			<?php else : ?>
				<img src="<?php echo get_template_directory_uri() . '/assets/placeholder-1840x575.png' ?>" alt="single page image" />
			<?php endif; ?>
		</div>
	<div class="page-cover-content">
		<div class="container">
			<h2 class="title"><?php esc_html_e('Category: ', 'suarez'); single_cat_title() ?></h2>
			<?php if($header_icon) : ?>
				<i class="icon-<?php tt_print($header_icon) ?>"></i>
			<?php endif ?>
		</div>
	</div>
</div>
<section class="section section-articles">
	<div class="container">
		<?php if(have_posts()) : ?>
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
<?php get_footer();