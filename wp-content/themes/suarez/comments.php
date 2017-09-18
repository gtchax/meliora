<?php
wp_reset_postdata();
if(comments_open( ) || have_comments()) : ?>
	<?php if ( post_password_required() ) : ?>
		<div class="container">
			<p class="comments-info-message"><?php esc_attr_e( 'This post is password protected. Enter the password to view any comments.', 'suarez' ); ?></p>
		</div>

		<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
		endif;
		$args = array(
			'fields' => apply_filters( 'comment_form_default_fields', array(

				'author'    => '<div class="row">
							<div class="col-md-6">
								<div class="input-line">
									<input type="text" name="author" value="' . esc_attr( $commenter[ 'comment_author' ] ) . '" aria-required="true" class="form-input check-value" placeholder="" />
									<span class="placeholder">Your name</span>
								</div>
							</div>',

				'email'     =>  '<div class="col-md-6">
							<div class="input-line">
								<input type="text" name="email" value="' . esc_attr( $commenter[ 'comment_author_email' ] ) . '" aria-required="true" class="form-input check-value" placeholder="" />
								<span class="placeholder">Your email address</span>
							</div>
						</div>
					</div>',


				'url'       =>  '<div class="input-line">
						<input type="text" name="url" value="' . esc_attr( $commenter[ 'comment_author_url' ] ) . '" aria-required="false" class="form-input check-value" placeholder="" />
						<span class="placeholder">Website URL</span>
					</div>'

				)
			),
			'comment_notes_after' => '<div class="align-center">
								<button type="submit" id="submit" name="submit" class="btn btn-default submit-button">
									<span class="text">Comment<i class="icon-plane"></i></span>
								</button>
							</div>',
			'comment_notes_before' => '',
			'class_form'    =>  'comments-form respond-form',
			'title_reply_before' => '',
			'title_reply_after' => '',
			'title_reply'   => '',
			'comment_field' => '<div class="input-line">
						<textarea name="comment" class="form-input check-value" aria-required="true" placeholder=""></textarea>
						<span class="placeholder">Comment</span>
					</div>',
			'label_submit'  => '',
			'class_submit'  =>  'hidden'
		);
	if ( comments_open()) :
		paginate_comments_links(); ?>
		<!-- Respond Area -->
		<div class="comments-area">
			<div class="container">
				<h4 class="comments-area-title"><?php esc_html_e('Leave a comment','suarez') ?></h4>

				<?php if(!_go('use_facebook_comments')) :
					if(_go('facebook_comments_url')) : ?>
					<script src="//connect.facebook.net/<?php _eo('facebook_comments_language')?>/sdk.js#xfbml=1&amp;version=v2.4"></script>
						<!-- Facebook Comments -->
						<div class="facebook-comments">
							<div class="comments-toggle">
								<div class="toggle no-select">
									<i class="icon-facebook2"></i>
									<span class="title"><?php esc_html_e('Show facebook comments','suarez') ?>
									<span class="fb-comments-count" data-href="<?php _eo('facebook_comments_url') ?>"></span></span>
									<i class="icon-facebook2"></i>
								</div>
							</div>

							<div class="comments-wrapper">
								<div id="fb-root"></div>
								<div class="fb-comments" data-href="<?php _eo('facebook_comments_url') ?>" data-width="100%" data-numposts="<?php _go('nbr_of_facebook_comments') ? _eo('nbr_of_facebook_comments') : 10; ?>"></div>
							</div>
						</div>
					<?php else: ?>
						<h4 class="align-center template-info-message small"><?php esc_html_e('Facebook plugin is not configured. Please add a website for the facebook comments and a number of comments from the Dashboard > Suarez > Additional Options > Facebook.', 'suarez') ?></h4>
					<?php endif; 
				endif; ?>
				<ul class="comments-list">
					<?php wp_list_comments( array( 'callback' => 'tt_custom_comments' , 'avatar_size'=>'60','style'=>'ul') ); ?>
				</ul>
			</div>
		</div>
	<?php endif; ?>

	<div class="reply-area">
		<?php comment_form( $args ); ?>
	</div>

<?php endif; ?>