<!-- Main Search Form -->
<form class="main-search-form" method="get" id="searchform" action="<?php echo esc_url( home_url('/') ) ?>">
	<span class="close-search-form"><?php esc_html_e('Close', 'suarez') ?><i class="icon-cross"></i></span>

	<div class="form-inner">
		<div class="input-line">
			<input type="text" class="form-input check-value" name="s" id="s" placeholder="<?php esc_html_e('Search', 'suarez') ?>" />
			<i class="icon-mag"></i>
		</div>
		<button type="submit" class="form-submit"><?php esc_html_e('- Submit -', 'suarez') ?></button>
	</div>
</form>