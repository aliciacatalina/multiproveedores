<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Request'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Pending Request'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('My Request'), array('action' => 'myRequests')); ?></li>
	</ul>
</div>
