<?php get_header() ?>
<!-- 404 Section -->
<section class="section-404">
	<div class="section-inner">
		<div class="section-content">
			<h1 class="content-title"><?php esc_html_e('Error 404', 'suarez'); ?></h1>
			<p><?php _go('404_title') ? _eo('404_title') : esc_html_e('The page you\'re looking for can\'t be found', 'suarez'); ?></p>
			<i class="icon-error"></i>

			<a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-default">
				<span class="text"><?php esc_html_e('Homepage', 'suarez') ?></span>
			</a>
		</div>

		<div class="image">
			<img src="<?php if(_go('404_bg_image')) : _eo('404_bg_image'); else : echo get_template_directory_uri() . '/assets/404-cover.jpg'; endif;?>" alt="The page was not found" />
		</div>
	</div>
</section>
<?php get_footer() ?>