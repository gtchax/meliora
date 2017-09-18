<?php
// Creating the widget 
class popular_posts extends WP_Widget {

function __construct() {
parent::__construct('popular_posts',
					esc_attr__('[Suarez] Popular Posts', 'suarez'), 
					array( 'description' => esc_attr__( 'This widget gives you the ability to show the most popular posts by views', 'suarez' ) ) 
					);
}

public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
if(!empty($instance['number'])):
		$postscount = $instance['number'];
	else:
		$postscount = 3;
	endif;
print $args['before_widget'];
if ( !empty( $title ) ) print $args['before_title'] . $title . $args['after_title']; 
?>
<ul class="clean-list latest-posts-list">                       
	<?php
	$popularpost = new WP_Query( array( 'posts_per_page' => $postscount, 'meta_key' => 'post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
	if ($popularpost->have_posts()) : while ($popularpost->have_posts()) : $popularpost->the_post(); ?>
		<li class="latest-post">
			<a href="<?php the_permalink(); ?>" class="post-link">
				<div class="post-content">
					<div class="image">
						<?php if(has_post_thumbnail()) :
							the_post_thumbnail('tt_popular_posts'); 
						else : ?>
							<img src="<?php echo get_template_directory_uri(). '/assets/placeholder-370x130.png'; ?>" alt="popular post no-image">
						<?php endif; ?>
					</div>
					<h3 class="post-title"><?php the_title(); ?></h3>
				</div>
			</a>
		</li>
	<?php endwhile; endif; ?>
</ul>


<?php
print $args['after_widget'];
}
 
public function form( $instance ){ 
if ( isset( $instance[ 'title' ] ) ) :
	$title = $instance[ 'title' ];
else :
	$title = esc_attr__( 'New title', 'suarez' );
endif;
$number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
?>  
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_attr_e( 'Title:', 'suarez' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
	<label for="<?php print $this->get_field_id( 'number' ); ?>"><?php esc_attr_e( 'Number of Posts:', 'suarez' ); ?></label>
	<input class="widefat" value="<?php echo esc_attr( $number ); ?>" type="number" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" min="1" max="10">
</p>
<?php 
}
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['number'] = (int) $new_instance['number'];
return $instance;
}
}
function tt_widget_popular_posts_load_widget() {
  register_widget( 'popular_posts' );
}
add_action( 'widgets_init', 'tt_widget_popular_posts_load_widget' );