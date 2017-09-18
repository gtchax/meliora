<?php $post_likes = get_post_meta(get_the_ID(), 'post_likes', true);
$popularity = get_post_meta(get_the_ID(), 'post_views_count', true); 
if(!$post_likes) $post_likes = 0;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('article big'); ?> data-likes="<?php tt_print($post_likes) ?>" data-popularity="<?php tt_print($popularity) ?>" data-date="<?php echo get_the_date(); ?>" data-alphabet="<?php the_title(); ?>">
	<figure class="article-cover">
	<?php if(has_post_thumbnail()) : ?>
		<?php the_post_thumbnail('tt_single_photo'); ?>
	<?php else : ?>
		<img src="<?php echo get_template_directory_uri().'/assets/placeholder-570x410.png' ?>" alt="<?php the_title() ?>" />
	<?php endif; ?>
		<div class="article-body">
			<p class="category">
				<?php the_category(', '); ?>
			</p>
			<h3 class="title"><?php the_title(); ?></h3>
			<a href="<?php the_permalink() ?>" class="btn btn-white">
				<span class="text"><?php esc_html_e('Read more', 'suarez') ?></span>
			</a>
		</div>
	</figure>
</article>
