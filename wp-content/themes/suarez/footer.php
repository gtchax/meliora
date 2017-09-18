		</div>
		<!-- Footer -->
		<footer class="main-footer">
			<div class="container">
				<?php if( !is_404() ): ?>
					<?php get_sidebar( 'footer' ); ?>

					<!-- Nav & Socials -->
					<div class="footer-socials">
						<!-- Nav -->
						<nav class="footer-nav">
							<?php wp_nav_menu( 
								array(
									'theme_location' => 'footer',
									'container' => false,
									'menu_class' => false
								)
							 ); ?>
						</nav>

						<!-- Socials links -->
						<ul class="social-links">
						<?php 
								$social_platforms = array(
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
												<i class="icon-<?php print esc_attr($platform); if($platform == 'pinterest') echo '2'; if($platform == 'google') echo '-plus3';?>"></i>
											</a>
										</li>
									<?php endif;
								endforeach; 
							?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
			<?php if(!_go('hide_copyright')) : ?>
				<?php if(_go('copyright_text')) : ?>
					<!-- Copyrights -->
					<div class="copyrights">
						<div class="container">
							<?php _eo('copyright_text') ?>
						</div>
					</div>
				<?php else: ?>
					<!-- Copyrights -->
					<div class="copyrights">
						<div class="container"><?php esc_attr_e('Copyright &copy; ','suarez'); echo date('Y').' ';?><a href="<?php echo esc_url('https://www.teslathemes.com/'); ?>" target="_blank"><?php esc_attr_e('TeslaThemes','suarez'); ?></a>, <?php esc_attr_e('Supported by ', 'suarez');?><a href="<?php echo esc_url('https://wpmatic.io/'); ?>" target="_blank"><?php esc_attr_e('WPmatic.','suarez');?></a>
						</div>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</footer>
		<!-- Scripts -->
		<?php wp_footer() ?>
	</body>
</html>