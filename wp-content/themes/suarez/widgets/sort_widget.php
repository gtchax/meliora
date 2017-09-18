<?php
 // Sorting Box
 class tt_sort_box extends WP_Widget {
 
	function __construct() {
		parent::__construct(
				'widget_sort_posts',
				'[Suarez] Posts Sorting',
				array(
					'description' => esc_attr__('Posts Sorting Widget.', 'suarez'),
					'classname' => 'widget_sort_posts',
				)
		);
	}

 
	function widget($args, $instance){
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

	print $before_widget;
	if(!empty($title)){
		print $before_title . $title . $after_title;
	} ?>

		<div class="sort-posts-block">
			<i class="block-icon icon-filters-icon"></i>

			<div class="block-filters">
				<div class="filters-inner">
					<label class="filter">
						<input class="filter_latest" type="radio" name="posts-filter">
						<span class="filter-content">
							<span class="text"><?php esc_html_e('Latest', 'suarez'); ?></span>
						</span>
					</label>

					<label class="filter">
						<input class="filter_likes" type="radio" name="posts-filter">
						<span class="filter-content">
							<span class="text"><?php esc_html_e('Likes', 'suarez'); ?></span>
						</span>
					</label>

					<label class="filter">
						<input class="filter_popular" type="radio" name="posts-filter">
						<span class="filter-content">
							<span class="text"><?php esc_html_e('Popularity', 'suarez'); ?></span>
						</span>
					</label>

					<label class="filter">
						<input class="filter_alphabet" type="radio" name="posts-filter">
						<span class="filter-content">
							<span class="text"><?php esc_html_e('A - Z', 'suarez'); ?></span>
						</span>
					</label>
				</div>

				<span class="filters-direction">
					<label>
						<input type="checkbox" name="direction-checkbox">
						<i class="icon-arrow-up"></i>
					</label>
				</span>
			</div>
		</div>
		
	<?php print $after_widget;
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}
 
	function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
	?>
		<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_attr_e( 'Title:' , 'suarez'); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
	<?php
	}
}
 
add_action('widgets_init', create_function('', 'return register_widget("tt_sort_box");')); ?>