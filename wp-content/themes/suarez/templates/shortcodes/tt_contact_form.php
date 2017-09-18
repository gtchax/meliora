<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );
$section_id = !empty($section_id) ? $section_id : 'contact';
$css = !empty($css) ? vc_shortcode_custom_css_class( $css ) : '';
$form_title = $form_title ? $form_title : 'Say Hello!';
$form_description = $form_description ? $form_description : 'Your Questions and Special Requests are Always Welcome.';
?>

<!-- Contact Section -->
<div class="contact-box <?php tt_print($css); ?>">
	<div class="box-inner">
		<?php if(!$hide_map): 
            			tt_gmap('map-wrapper', 'map-canvas' , 'contact-map', true, true ); 
            		endif ?>
		<div class="contact-details" <?php if($hide_map) echo 'style="width: 100% !important"'; ?>>
			<h2 class="details-title"><?php tt_print( $form_title ) ?></h2>
			<p class="details-description"><?php tt_print($form_description) ?></p>
			<?php tt_form_location('shortcode'); ?>
		</div>
	</div>
</div>
<?php if(!$hide_socials) : ?>
	<!-- Social Block -->
	<ul class="clean-list social-block">
		<?php $social_platforms = array(
			'facebook',
			'twitter',
			'dribbble',
			'youtube',
			'rss',
			'google',
			'linkedin',
			'pinterest',
			'instagram'
		);
		foreach($social_platforms as $platform): 
			if (_go('social_platforms_' . $platform)): ?>
				<li>
					<a href="<?php echo esc_url(_go('social_platforms_' . $platform)); ?>" target="_blank">
						<i class="icon-<?php print esc_attr($platform); if($platform == 'pinterest' || $platform == 'facebook') echo '2'; if($platform == 'google') echo '-plus3';?>"></i>
						<span class="name"><?php print esc_attr($platform) ?></span>
					</a>
				</li>
			<?php endif;
		endforeach; ?>
	</ul>
<?php endif; ?>