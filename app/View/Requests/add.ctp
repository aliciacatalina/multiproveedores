<div class="requests form">
<?php echo $this->Form->create('Request'); ?>
	<fieldset>
		<legend><?php echo __('Add Request'); ?></legend>
	<?php
		echo $this->Form->input('Request.category_id');
		echo $this->Form->input('Content.comment');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->element('actions_request'); ?>