<div class="orders view">
<h2><?php echo __('Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($order['Order']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['User']['name'], array('controller' => 'users', 'action' => 'view', $order['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quote'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['Quote']['created'], array('controller' => 'quotes', 'action' => 'view', $order['Quote']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($order['State']['value'], array('controller' => 'states', 'action' => 'view', $order['State']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($order['Order']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Price'); ?></dt>
		<dd>
			<?php echo h($order['Order']['total_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Unitary Price'); ?></dt>
		<dd>
			<?php echo h($order['Order']['unitary_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($order['Order']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($order['Order']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($order['Order']['deleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rating'); ?></dt>
		<dd>
			<?php echo h($order['Order']['rating']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logistics'); ?></dt>
		<dd>
			<?php echo h($order['Order']['logistics']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo __('Actions'); ?><b class="caret bottom-up"></b></a>
		<ul class="dropdown-menu bottom-up pull-right">
			<li><?php echo $this->Html->link(__('Edit Order'), array('action' => 'edit', $order['Order']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete Order'), array('action' => 'delete', $order['Order']['id']), null, __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Order'), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Quotes'), array('controller' => 'quotes', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Quote'), array('controller' => 'quotes', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Accounts'), array('controller' => 'accounts', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Account'), array('controller' => 'accounts', 'action' => 'add')); ?> </li>
		</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Accounts'); ?></h3>
	<?php if (!empty($order['Account'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $order['Account']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Order Id'); ?></dt>
		<dd>
	<?php echo $order['Account']['order_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Due Date'); ?></dt>
		<dd>
	<?php echo $order['Account']['due_date']; ?>
&nbsp;</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
	<?php echo $order['Account']['status']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
<div class="actions dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#"><b class="caret bottom-up"></b></a>
		<ul class="dropdown-menu bottom-up pull-right">
				<li><?php echo $this->Html->link(__('Edit Account'), array('controller' => 'accounts', 'action' => 'edit', $order['Account']['id'])); ?></li>
			</ul>
		</div>
	</div>
	