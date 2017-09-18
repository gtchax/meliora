<div class="align-center">
	<input class="btn btn-default submit-button" type="submit" value="<?php print isset($label) && $label !== '' ? $label : esc_attr__('Submit','suarez') ?>"
	data-sending="<?php esc_attr_e('Sending Message','suarez') ?>"
	data-sent="<?php esc_attr_e('Message Successfully Sent','suarez') ?>" 
	data-error="<?php esc_attr_e('Unable to send message','suarez') ?>"/>
</div>