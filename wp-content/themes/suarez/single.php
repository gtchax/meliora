<?php
get_header();
$page_id = tt_get_page_id();
$time_to_read = get_post_meta( $page_id, THEME_NAME . '_time_to_read', true );
$related_posts_on_off = get_post_meta( $page_id, THEME_NAME . '_related_posts_on_off', true );
$news_id = get_option( 'page_for_posts' );
$sidebar_option = get_post_meta( $page_id, THEME_NAME . '_sidebar_position', true );
$sidebar_status = is_active_sidebar('post-sidebar' );
switch ($sidebar_option) {
	case 'as_blog':
		$s_id = $news_id;   
		break;
	case 'full_width':
		$s_id = $page_id;
		break;
	case 'right':
		$s_id = $page_id;
		break;
	case 'left':
		$s_id = $page_id;
}
if(!empty($s_id)) $sidebar = get_post_meta( $s_id, THEME_NAME . '_sidebar_position', true );
if(empty($sidebar)) $sidebar = 'full_width';

while(have_posts()) : the_post(); tt_setPostViews(get_the_ID()); ?>
	<!-- Single Page Cover -->
	<div class="single-page-cover">
		<div class="image">
			<?php if(has_post_thumbnail()) : 
				the_post_thumbnail('tt_single_page');
			else : ?>
				<img src="<?php echo get_template_directory_uri(). '/assets/placeholder-1840x575.png' ?>" alt="<?php the_title() ?>">
			<?php endif; ?>
		</div>
	</div>

	<!-- Article Content -->
	<article class="blog-post single">
		<div class="container">
			<div class="blog-post-inner">

				<!-- Post Nav Link -->
				<span class="post-nav-link prev">
					<?php previous_post_link('%link', '<i class="icon-previous-post"></i>', false, '') ?>
				</span>
				<!-- Post Nav Link -->
				<span class="post-nav-link next">
					<?php next_post_link( '%link', '<i class="icon-next-post"></i>', false, '' ); ?>
				</span>
				

				<!-- Post Header -->
				<div class="post-header">
					<div class="post-author">
						<div class="image">
							<?php echo get_avatar(get_the_author_meta( 'ID' )) ?>
						</div>
					</div>

					<div class="post-meta">
						<p class="categories">
							<?php the_category(', '); ?>
						</p>

						<h2 class="post-title"><?php the_title(); ?></h2>

						<span class="date"><?php the_time(get_option('date_format')); ?></span>

						<?php if($time_to_read) : ?>
							<p class="estimated-reading-time">
								<span class="text"><?php tt_print($time_to_read) ?></span>
							</p>
						<?php endif; ?>
					</div>
				</div>

				<!-- Post Body -->
				<div class="post-body <?php if($sidebar !== 'full_width' && $sidebar_status) echo 'has-sidebar'; ?>">
					<?php if('full_width' !== $sidebar && $sidebar_status) : ?>
						<div class="row">
					<?php endif; ?>
						<?php if($sidebar === 'left' && $sidebar_status) : ?>
							<div class="col-md-5">
								<?php get_sidebar('single') ?>
							</div>
						<?php endif; ?>
						<?php if($sidebar !== 'full_width' && $sidebar_status) : ?>
							<div class="col-md-7">
						<?php endif; ?>	
						<?php if(has_post_format(array('gallery'))) :
							$gallery = get_post_gallery($page_id, false);
							$att_ids = explode(',', $gallery['ids']);
							$attachments = array_combine($att_ids, $gallery['src']);

							foreach( $attachments as $id => $src ) : ?>
								<div class="post-image big-image">
									<span class="title"><?php echo get_the_title($id) ?></span>
									<img src="<?php tt_print($src) ?>" alt="<?php echo get_the_title($id) ?>" />
								</div>
							<?php endforeach; 
						else :
							the_content(); 
						endif; ?>
						<?php if($sidebar !== 'full_width' && $sidebar_status) : ?>
							</div>
						<?php endif; ?>	
						<?php if($sidebar === 'right' && $sidebar_status) : ?>
							<div class="col-md-5">
								<?php get_sidebar('single') ?>
							</div>
						<?php endif; ?>
					<?php if('full_width' !== $sidebar && $sidebar_status) : ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<!-- Post Footer -->
		<div class="post-footer">
			<div class="container">
				<div class="footer-inner">                            
					<?php tt_share(); ?>
					<div class="comments-and-likes">
						<span class="likes-block <?php if( @$_COOKIE['post_likes_'. $page_id]) echo esc_attr('liked'); else echo ''; ?>" data-id="<?php echo esc_attr($page_id);?>">
							<i class="icon-heart no-select"></i>
							<span class="text"><span class="count"><?php print get_post_meta($page_id, 'post_likes', true) ? get_post_meta($page_id, 'post_likes', true) : '0' ;?></span> <?php esc_html_e('likes', 'suarez') ?></span>
						</span>

						<span class="comments-info"><i class="icon-blog"></i><?php echo get_comments_number(); esc_attr_e(' Comments','suarez'); ?></span>
					</div>
				</div>
			</div>
		</div>
	</article>
<?php endwhile; 

if($related_posts_on_off === 'show_related_posts') :
	get_template_part( 'templates/related_posts' ); 
endif; 
comments_template();
get_footer(); ?>