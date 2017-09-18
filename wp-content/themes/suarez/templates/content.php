<?php $post_likes = get_post_meta(get_the_ID(), 'post_likes', true);
$popularity = get_post_meta(get_the_ID(), 'post_views_count', true); 
if(!$post_likes) $post_likes = 0;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?> data-likes="<?php tt_print($post_likes) ?>" data-popularity="<?php tt_print($popularity) ?>" data-date="<?php echo get_the_date(); ?>" data-alphabet="<?php the_title(); ?>">
	<figure class="article-cover">
		<a href="<?php the_permalink() ?>">
			<?php if(has_post_thumbnail()) : ?>
				<img src="<?php the_post_thumbnail_url( 'tt_single_post' ); ?>" alt="<?php the_title() ?>" />
			<?php else : ?>
				<img src="<?php echo get_template_directory_uri().'/assets/placeholder-262x262.png' ?>" alt="<?php the_title() ?>" />
			<?php endif; ?>
		</a>
	</figure>
	<div class="article-body">
		<p class="category color-2">
			<?php the_category(', '); ?>
		</p>
		<h3 class="title">
			<a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
		</h3>

		<a href="<?php the_permalink() ?>" class="btn btn-simplified">
			<span class="text"><?php esc_html_e('Read more', 'suarez') ?></span>
		</a>
	</div>
</article>
