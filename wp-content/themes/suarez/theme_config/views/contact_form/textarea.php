<div class="input-line <?php if(!empty($required)) echo 'required'; ?>">
	<textarea class="form-input check-value" data-parsley-errors-container="#error-container" data-parsley-error-message="<?php esc_attr_e('Insert a Message!', 'suarez') ?>"  name="<?php echo esc_attr($name)?>" <?php if(!empty($required)) echo 'data-parsley-required="true"'; ?> placeholder=""></textarea>
	<span class="placeholder"><?php echo esc_attr($placeholder); ?></span>
</div>
