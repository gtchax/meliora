<?php

/***********************************************************************************************/
/*  Tesla Framework */
/***********************************************************************************************/

require_once(get_template_directory() . '/tesla_framework/tesla.php');
(!class_exists('GenerateCustomMeta')) ? require_once(TEMPLATEPATH . '/theme_config/custom_meta_box.php') : '';

/***********************************************************************************************/
/*  Register Plugins */
/***********************************************************************************************/

if ( is_admin() && current_user_can( 'install_themes' ) ) {
  require_once( get_template_directory() . '/plugins/tgm-plugin-activation/register-plugins.php' );
}

/***********************************************************************************************/
/* Add Menus */
/***********************************************************************************************/

function tt_register_menus($return = false){
	$tt_menus = array(
		'primary' => esc_attr_x('Main Menu', 'dashboard','suarez'), 
		'secondary' => esc_attr_x('Full Screen Menu', 'dashboard', 'suarez'),
		'footer' => esc_attr_x('Footer Menu', 'dashboard', 'suarez'),
	);
	if($return)
		return array(
			'primary' => 'Main Menu', 
			'secondary' => 'Full Screen Menu', 
			'footer' => 'Footer Menu'
		);
	register_nav_menus($tt_menus);
}
add_action('init', 'tt_register_menus');

/**********************************************************************************************/
/*    favicon                                                                                 */
/**********************************************************************************************/
function tt_theme_favicon() {
	if( function_exists( 'wp_site_icon' ) && has_site_icon() ) {
		wp_site_icon();
	} else if(_go( 'favicon')){
		echo "\r\n" . sprintf( '<link rel="shortcut icon" href="%s">', _go( 'favicon') ) . "\r\n";
	}
}
add_action( 'wp_head', 'tt_theme_favicon');

/***********************************************************************************************/
/*   Enable Visual Composer */
/***********************************************************************************************/

function tt_load_vc() {
	if (class_exists('Vc_Manager')) {
		vc_set_shortcodes_templates_dir(TEMPLATEPATH . '/templates/shortcodes');
		require_once(TEMPLATEPATH . '/theme_config/shortcodes.php');
		require_once(TEMPLATEPATH . '/theme_config/tt-map.php');
		//include_once(TEMPLATEPATH . '/theme_config/google_map.php' );
	}
}
add_action('init','tt_load_vc', 15);

/***********************************************************************************************/
/* ESC Attribute Function */
/***********************************************************************************************/

function tt_print( $param ){
	print esc_attr( $param );
}

/**********************************************************************************************/
/*        SIDEBARS                                                                            */
/**********************************************************************************************/

function tt_suarez_main_sidebar_register() {

	register_sidebar( array(
		'name'          => 'Blog Sidebar',
		'id'            => 'main-sidebar',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => 'Post Sidebar',
		'id'            => 'post-sidebar',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => 'Footer Sidebar',
		'id'            => 'footer-sidebar',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'tt_suarez_main_sidebar_register' );


/***********************************************************************************************/
/* Share Function */
/***********************************************************************************************/

if(!function_exists('tt_share')){
  function tt_share(){
	$share_this = _go('share_this');
	if(isset($share_this) && is_array($share_this)): ?>
			<div class="share-block">
				<span class="title">
					<i class="icon"></i>
					<span class="text"><?php esc_html_e('Share via', 'suarez') ?></span>
				</span>
			<!-- Share Article -->
				<ul class="share-list">
				  <?php foreach($share_this as $val):
					if($val === 'googleplus') $val = 'google-plus';
					switch ($val) {
					  case 'facebook': ?>
							  <?php printf('<li>', $val) ?>
							<a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;t=<?php urlencode(get_the_title()); ?>&amp;u=<?php echo urlencode(get_the_permalink()) ?>','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)"><i class="icon-<?php echo esc_attr($val );?>"></i></a>
						
						<?php break; ?>
					  <?php case 'twitter': ?>
						  <?php printf('<li>', $val) ?>
							<a class="twitter" onClick="window.open('http://twitter.com/intent/tweet?url=<?php echo urlencode(get_the_permalink()) ?>&amp;text=<?php urlencode(get_the_title()); ?>','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)"><i class="icon-<?php echo esc_attr($val );?>"></i></a>
						  
						<?php break; ?>
					  <?php case 'google-plus': ?>
						  <?php printf('<li>', $val) ?>
							<a class="google-plus" onClick="window.open('https://plus.google.com/share?url=<?php echo urlencode(get_the_permalink()) ?>','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)"><i class="icon-<?php echo esc_attr($val );?>"></i></a>
						 
						<?php break; ?>
					  <?php case 'pinterest': ?>
						  <?php printf('<li>', $val) ?>
							<a class="pinterest" onClick="window.open('https://www.pinterest.com/pin/create/button/?url=<?php echo urlencode(get_the_permalink()) ?>','sharer','toolbar=0,status=0,width=748,height=325');" href="javascript: void(0)"><i class="icon-<?php echo esc_attr($val );?>"></i></a>
						  
						<?php break; ?>
					  <?php case 'linkedin': ?>
						  <?php printf('<li>', $val) ?>
							<a class="linkedin" onClick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode(get_the_permalink()) ?>','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)"><i class="icon-<?php echo esc_attr($val );?>"></i></a>
						  
						  <?php break; ?>
					  <?php case 'vkontakte': ?>
						  <?php printf('<li>', $val) ?>
							<a class="vkontakte" onClick="window.open('http://www.vkontakte.ru/share.php?url=<?php echo urlencode(get_the_permalink()) ?>','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)"><i class="icon-vk"></i></a>
						  
						<?php break; ?>
					  <?php default:
						esc_attr_e('No Share','suarez');
						break;
					} ?>
				  <?php endforeach; ?>
			  </ul>
		<!-- Share Article End -->
		</div>
	<?php endif;
	}
}

/***********************************************************************************************/
/* Comments */
/***********************************************************************************************/

function tt_custom_comments( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  extract($args, EXTR_SKIP);
	global $comment_order;
	$comment_order++;
	$comment_class = 'comment';
	if($comment_order == 1)
		$comment_class = 'first';
  if ( 'div' == $args['style'] ) {
	$tag = 'div';
	$add_below = 'comment';
  } else {
	$tag = 'li';
	$add_below = 'div-comment';
  }
  ?>

  <<?php print $tag ?> id="comment-<?php comment_ID() ?>" <?php comment_class(empty( $args['has_children'] ) ? " $comment_class " : " $comment_class parent ") ?>>
			
	<div class="comment-inner">
		<?php if ($args['avatar_size'] != 0): ?>
			<div class="comment-image">
				<?php echo get_avatar( $comment, $args['avatar_size'], false,'avatar image' ); ?>
			</div>
		<?php endif ?>

		<div class="comment-body">
			<div class="comment-meta">
				<h5 class="comments-author"><?php echo get_comment_author(); ?></h5>
				<span class="comment-date"><?php echo get_comment_time(get_option('date_format','j F, Y \a\t g:i a')) ?></span>

				<div class="comments-options">
					<span class="options-trigger">
						<i class="icon-points-icon"></i>
					</span>

					<ul class="clean-list options-list">
						<li class="option">
							<?php comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'],'reply_text'=> esc_html__('Reply','suarez'))));  ?>
						</li>
						<li class="option">
							<?php edit_comment_link(__('Edit','suarez'),'','' ); ?>
						</li>
					</ul>
				</div>
			</div>
			<?php comment_text() ?>
			<?php if ($comment->comment_approved == '0') : ?>
				<em class="comment-awaiting-moderation">
					<i class="fa-fa-gear fa-spin"></i><?php esc_attr_e(' Your comment is awaiting moderation.','suarez') ?>
				</em>
			<?php endif;?>
		</div>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>"></div>
	<?php endif;
}

function tt_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'tt_move_comment_field_to_bottom' );

/***********************************************************************************************/
/* Color Changers */
/***********************************************************************************************/

add_action( 'tt_fw_init' , 'tt_color_changers' );
function tt_color_changers(){
	//color changers
	require_once get_template_directory() . '/theme_config/color_changers.php';
}

/***********************************************************************************************/
/* Custom JS */
/***********************************************************************************************/

add_action('wp_footer', 'tt_custom_js', 99);
function tt_custom_js() {
  ?>
  <script type="text/javascript"><?php echo esc_js(_eo('custom_js')) ?></script>
  <?php
}

function tt_suarez_to_js() {
	$send_js = array(
		'dirUri' => get_template_directory_uri()
	);
	wp_localize_script( 'options.js', 'themeOptions', $send_js );
}
add_action( 'wp_enqueue_scripts', 'tt_suarez_to_js', 1 );

/***********************************************************************************************/
/* DISPLAYING POST POPULARITY BY VIEWS ( VIEWS COUNTER )                                       */
/***********************************************************************************************/

function tt_getPostViews($postID){
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
		return esc_html__('0 Views', 'suarez');
	}
	return $count. esc_html__(' Views', 'suarez');
}
function tt_setPostViews($postID) {
	$count_key = 'post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}else{
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}

/***********************************************************************************************/
/* Form Location                                                                               */
/***********************************************************************************************/
add_action( 'tt_fw_init' , 'tt_fw_functions' );
function tt_fw_functions(){
  TT_Contact_Form_Builder::add_form_locations(array(
	  'shortcode' => 'Shortcode Form',
  ));

/***********************************************************************************************/
/* Google fonts + Fonts changer */
/***********************************************************************************************/

TT_ENQUEUE::$gfont_changer = array(
		_go('logo_text_font'),
		_go('main_content_text_font'),
		_go('sidebar_text_font'),
		_go('menu_text_font')
	);
TT_ENQUEUE::$base_gfonts = array('Playfair Display:400,700', 'Droid Serif', 'Varela Round');
TT_ENQUEUE::add_css(array('//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'));
}

/***********************************************************************************************/
/* AJAX Functions */
/***********************************************************************************************/
add_action('wp_ajax_post_likes', 'tt_suarez_likes');
add_action('wp_ajax_nopriv_post_likes', 'tt_suarez_likes');

function tt_suarez_likes(){
	if(!empty($_POST['postid'])){
		$post_id = $_POST['postid'];
		$likes = get_post_meta($post_id, 'post_likes', true);
		
		if( $_COOKIE['post_likes_'. $post_id] !== null ) :
			if($likes) $likes--;
			if(update_post_meta($post_id, 'post_likes', $likes)){
				unset($_COOKIE['post_likes_'. $post_id]);
				setcookie('post_likes_'. $post_id, '', time()*20, '/');
				die(true);
			}
			else{
				die('error');
			}
		else :
			if(!$likes) $likes = 0;
			$likes++;
			
			if(update_post_meta($post_id, 'post_likes', $likes)){
				setcookie('post_likes_'. $post_id, 'tt_'.$post_id, time()*20, '/');
				die(true);
			}
			else{
				die('error');
			}
		endif;
	}
die();
}

/***********************************************************************************************/
/* Custom Metabox for Property Category */
/***********************************************************************************************/
function edit_form_tag( ) {
	echo ' enctype="multipart/form-data"';
}
add_action( 'property_tax_term_edit_form_tag' , 'edit_form_tag' );
add_action( 'category_term_edit_form_tag' , 'edit_form_tag' );

/** Add New Field To Category **/
function additional_category_fields( $term, $tax ) {
	?>
	<script type="text/javascript">
		jQuery(function($) {

			/** Add our listener to the delete button **/
			$('.deleteImage').click(function(){

				/** Make sure the user didn't hit the button by accident and they really mean to delete the image **/
				if( $( '#uploaded_image' ).length > 0 && confirm( 'Are you sure you want to delete this file?' ) ) {
					var result = $.ajax({
						url: ajaxurl,
						type: 'GET',
						data: {
							action: 'tax_del_image',
							term_id: '<?php print $term->term_id; ?>',
							taxonomy: '<?php print $tax; ?>'
						},
						dataType: 'text'
					});

					result.success( function( data ) {
						$('#uploaded_image').remove();
					});
					result.fail( function( jqXHR, textStatus ) {
						console.log( "Request failed: " + textStatus );
					});
				}
			});
		});
	</script>
	<?php

	$uploadID   = get_option( "{$tax}_image_{$term->term_id}" );            // Retrieve our Attachment ID from the Options Database Table
	$feedback   = get_option( "{$tax}_image_{$term->term_id}_feedback" );   // Retrieve any upload feedback from the Options Database Table
?>
	<tr class="form-field">
		<th scope="row" valign="top"><label for="meta-order"><?php _e( 'Category Image', 'suarez' ); ?></label></th>
		<td>
			<div id="catImage">

				<!-- Create a nonce to validate against -->
				<input type="hidden" name="upload_meta_nonce" value="<?php echo wp_create_nonce( basename( __FILE__ ) ); ?>" />

				<!-- Define our actual upload field -->
				Please choose an image: <input type="file" name="_uploaded_file" value="" />

				<?php 
				  if( is_numeric( $uploadID ) ) :                                       // IF our upload ID is actually numeric, proceed

					/***
					/*  In this case we are pulling an image, if we are uploading
					/*  something such as a PDF we could use the built-in function
					/*  wp_get_attachment_url( $id );
					/*  codex.wordpress.org/Function_Reference/wp_get_attachment_url
					***/
					$imageArr = wp_get_attachment_image_src( $uploadID, 'medium' );     // Get the URL of the medium sized image
					$imageURL = $imageArr[0];                                           // wp_get_attachment_image_src() returns an array, index 0 is our URL
				?>

					<div id="uploaded_image">
						<a href="post.php?post=<?php echo esc_attr($uploadID); ?>&action=edit" target="_blank"><?php esc_html__('Edit Image','suarez') ?></a><br />
						<br/>
						<!-- Display our image using the URL retrieved earlier -->
						<a href="post.php?post=<?php echo esc_attr($uploadID); ?>&action=edit" target="_blank"><img src="<?php echo esc_url($imageURL); ?>" /></a><br /><br />
					</div>

				<!-- IF we received feedback, something went wrong and we need to show that feedback. -->               
				<?php elseif( ! empty( $feedback ) ) : ?>

					<p style="color:red;font-size:12px;font-weight;bold;font-style:italic;"><?php print $feedback; ?></p>

				<?php endif; ?>

			</div>
			<span class="description"><?php _e( 'Upload an appropriate image.','suarez' ); ?></span>
				<br />
				<br />

			<!-- This link is for our deletion process -->
			<?php if( ! empty( $uploadID ) ) : ?>

				<a href="javascript:void(0)" class="deleteImage" style="color:red;text-decoration:underline;"><?php esc_html_e('Delete','suarez') ?></a>

			<?php endif; ?>

		</td> 
	</tr>
<?php
	/** Since we've shown the user the feedback they need to see, we can delete our option **/
	delete_option( "{$tax}_image_{$term->term_id}_feedback" );
}
add_action( 'property_tax_edit_form_fields', 'additional_category_fields', 10, 2 ); 
add_action( 'category_edit_form_fields', 'additional_category_fields', 10, 2 ); 

/** Save Category Meta **/
function save_category_fields( $term_id ) {

	// Make sure that the nonce is set, taxonomy is set, and that our uploaded file is not empty
	if(
	  isset( $_POST['upload_meta_nonce'] ) && wp_verify_nonce( $_POST['upload_meta_nonce'], basename( __FILE__ ) ) &&
	  isset( $_POST['taxonomy'] ) && isset( $_FILES['_uploaded_file'] ) && !empty( $_FILES['_uploaded_file'] )
	) {
		$tax            = $_POST['taxonomy'];                                                   // Store our taxonomy, used for the option naming convention
		$supportedTypes = array( 'image/gif', 'image/jpeg', 'image/png' );                      // Only accept image mime types. - List of mimetypes: http://en.wikipedia.org/wiki/Internet_media_type
		$fileArray      = wp_check_filetype( basename( $_FILES['_uploaded_file']['name'] ) );   // Get the mime type and extension.
		$fileType       = $fileArray['type'];                                                   // Store our file type

		// Verify that the type given is what we're expecting
		if( in_array( $fileType, $supportedTypes ) ) {
			$uploadStatus = wp_handle_upload( $_FILES['_uploaded_file'], array( 'test_form' => false ) );   // Let WordPress handle the upload

			// Make sure that the file was uploaded correctly, without error
			if( isset( $uploadStatus['file'] ) ) {
				require_once(ABSPATH . "wp-admin" . '/includes/image.php');

				// Let's add the image to our media library so we get access to metadata
				$imageID = wp_insert_attachment( array(
						'post_mime_type'    => $uploadStatus['type'],
						'post_title'        => preg_replace( '/\.[^.]+$/', '', basename( $uploadStatus['file'] ) ),
						'post_content'      => '',
						'post_status'       => 'publish'
					),
					$uploadStatus['file']
				);

				// Generate our attachment metadata then update the file.
				$attachmentData = wp_generate_attachment_metadata( $imageID, $uploadStatus['file'] );
				wp_update_attachment_metadata( $imageID,  $attachmentData );


				$existingImage = get_option( "{$tax}_image_{$term_id}" );               // IF a file already exists in this option, grab it
				if( ! empty( $existingImage ) && is_numeric( $existingImage ) ) {       // IF the option does exist, delete it.
					wp_delete_attachment( $existingImage );
				}

				update_option( "{$tax}_image_{$term_id}", $imageID );                   // Update our option with the new attachment ID
				delete_option( "{$tax}_image_{$term_id}_feedback" );                    // Just in case there's a feedback option, delete it - theoretically it shouldn't exist at this point.
			}
			else {
				$uploadFeedback = 'There was a problem with your uploaded file. Contact Administrator.';    // Something major went wrong, enable debugging
			}
		}
		else {
			$uploadFeedback = 'Image Files only: JPEG/JPG, GIF, PNG';   // Wrong file type
		}

		// Update our Feedback Option
		if( isset( $uploadFeedback ) ) {
			update_option( "{$tax}_image_{$term_id}_feedback", $uploadFeedback );
		}
	}
}
add_action ( 'edited_category', 'save_category_fields');
add_action ( 'edited_property_tax', 'save_category_fields');


/** Metabox Delete Image **/
function tax_del_image() {

	/** If we don't have a term_id or taxonomy, bail out **/
	if( ! isset( $_GET['term_id'] ) || ! isset( $_GET['taxonomy'] ) ) {
		echo 'Not Set or Empty';
		exit;
	}

	$term_id = $_GET['term_id'];
	$tax     = $_GET['taxonomy'];
	$imageID = get_option( "{$tax}_image_{$term_id}" );     // Get our attachment ID

	if( is_numeric( $imageID ) ) {                          // Verify that the attachment ID is indeed a number
		wp_delete_attachment( $imageID );                   // Delete our image
		delete_option( "{$tax}_image_{$term_id }" );            // Delete our option
		delete_option( "{$tax}_image_{$term_id }_feedback" ); // Delete our feedback in the off-chance it actually exists ( it shouldn't )
		exit;
	}

	echo 'Contact Administrator';   // If we've reached this point, something went wrong - enable debugging
	exit;
}
add_action('wp_ajax_tax_del_image', 'tax_del_image');

/** Delete Associated Media Upon Term Deletion **/
function delete_associated_term_media( $term_id, $tax ){
	global $wp_taxonomies; 

	if( isset( $term_id, $tax, $wp_taxonomies ) && isset( $wp_taxonomies[$tax] ) ) {
		$imageID    = get_option( "{$tax}_image_{$term_id}" );

		if( is_numeric( $imageID ) ) {
			wp_delete_attachment( $imageID );
			delete_option( "{$tax}_image_{$term_id}" );
			delete_option( "{$tax}_image_{$term_id}_feedback" );
		}
	}
}
add_action( 'pre_delete_term', 'delete_associated_term_media', 10, 2 );



add_action( 'load-post.php', 'tt_generate_custom_meta');
add_action( 'load-post-new.php', 'tt_generate_custom_meta');    

/**
 *   Create custom meta box 
 */

function tt_generate_custom_meta() {
	$meta = new GenerateCustomMeta();
	$meta->add_meta_box('page_meta', array(
		'post_type' => array('page'),
		'title'     => __('Page Header', 'suarez'),
		'position'  => 'side',
		'fields'    => array(
				'subtitle'       => array('text',__('Page Subtitle', 'suarez')),
				'icon' => array('icon',__('Selected icon: ', 'suarez')),
				'hide_header'         => array('checkbox',__('Hide page header', 'suarez')),

			)
	));
}
/**
 *   Get custom meta box 
 */
function tt_get_custom_meta($meta) {
	global $post;

	if(is_front_page()) {
		$id = get_option('page_on_front');
	} else if(is_home() || is_singular('post')) {
		$id = get_option( 'page_for_posts' );
		($id === '0') ? $id = $post->ID : '';
	} else if(isset($post->ID)) {
		$id = $post->ID;
	} else {
		return;
	}

	$custom_meta = get_post_meta($id, $meta);
	if(!empty($custom_meta)) return (object) $custom_meta[0];
}

add_action( 'init', 'tt_add_excerpts_to_pages' );
function tt_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}