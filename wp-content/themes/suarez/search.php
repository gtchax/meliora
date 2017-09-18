<?php get_header(); 

?>
<div class="single-page-cover">
		<div class="image">
			<?php if(_go('default_hero_image')) : ?>
				<img src="<?php _eo('default_hero_image') ?>" alt="single page image" />
			<?php else : ?>
				<img src="<?php echo get_template_directory_uri() . '/assets/placeholder-1840x575.png' ?>" alt="single page image" />
			<?php endif; ?>
		</div>
	<div class="page-cover-content">
		<div class="container">
			<h2 class="title"><?php esc_html_e('Search', 'suarez'); ?></h2>
		</div>
	</div>
</div>
<section class="section section-articles">
	<div class="container">
		<?php if(have_posts()) : ?>
			<h1 class="section-title smaller"><?php esc_html_e('Found for: ', 'suarez') ?><?php echo '" '.get_search_query().' "'; ?></h1>
		<?php endif; ?>
		<div class="row">
			<?php $i = 0; $half_posts = get_option('posts_per_page') / 2; ?>
			<div class="col-md-6">
				<?php if(have_posts()) : ?>
					<?php while(have_posts()) : the_post();
						if(get_post_type(get_the_ID()) == 'photo' ) :
							get_template_part('templates/content-photo');
						else :
							get_template_part('templates/content');
						endif;
					$i++;
					if($i == (int)$half_posts) echo '</div><div class="col-md-6">';
					endwhile;
				else : ?>
					</div>
					<div class="col-md-12">
						<h1 class="section-title neg_search"><?php esc_html_e('Sorry, there are no posts for your query.', 'suarez') ?></h1>
				<?php endif; ?>
			</div>
		</div>
		<?php get_template_part('templates/pagination'); ?>
	</div>
</section>
<?php get_footer();