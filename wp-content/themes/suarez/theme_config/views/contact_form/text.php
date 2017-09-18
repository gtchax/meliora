<div class="input-line <?php if(!empty($required)) echo 'required'; ?>">
	<input type="text" class="form-input check-value" placeholder="" data-parsley-errors-container="#error-container" data-parsley-error-message="<?php esc_attr_e('A name is required !', 'suarez') ?>" name="<?php echo esc_attr($name)?>" <?php if(!empty($required)) echo 'data-parsley-required="true"'; ?> />
	<span class="placeholder"><?php echo esc_attr($placeholder); ?></span>
</div>