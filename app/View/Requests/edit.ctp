<div class="requests form">
<div class="actions dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo __('Actions'); ?><b class="caret bottom-up"></b></a>
		<ul class="dropdown-menu bottom-up pull-right">

				<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Request.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Request.id'))); ?></li>
				<li><?php echo $this->Html->link(__('List Requests'), array('action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__('List Contents'), array('controller' => 'contents', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Content'), array('controller' => 'contents', 'action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__('List Quotes'), array('controller' => 'quotes', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('New Quote'), array('controller' => 'quotes', 'action' => 'add')); ?> </li>
		</ul>
</div>
<?php echo $this->Form->create('Request'); ?>
	<fieldset>
		<legend><?php echo __('Edit Request'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('content_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('deleted');
		echo $this->Form->input('note');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>