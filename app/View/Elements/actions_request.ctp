<div class="actions dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo __('Actions'); ?><b class="caret bottom-up"></b></a>
		<ul class="dropdown-menu bottom-up pull-right">
		<li><?php echo $this->Html->link(__('New Request'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Pending Request'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('My Request'), array('action' => 'myRequests')); ?></li>
	</ul>
</div>
