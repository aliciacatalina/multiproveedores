<div class="quotes view">
<h2><?php echo __('Quote'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($quote['Quote']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Request'); ?></dt>
		<dd>
			<?php echo $this->Html->link($quote['Request']['note'], array('controller' => 'requests', 'action' => 'view', $quote['Request']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Supplier'); ?></dt>
		<dd>
			<?php echo $this->Html->link($quote['Supplier']['corporate_name'], array('controller' => 'suppliers', 'action' => 'view', $quote['Supplier']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($quote['User']['name'], array('controller' => 'users', 'action' => 'view', $quote['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Result'); ?></dt>
		<dd>
			<?php echo $this->Html->link($quote['Result']['value'], array('controller' => 'results', 'action' => 'view', $quote['Result']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($quote['Product']['id'], array('controller' => 'products', 'action' => 'view', $quote['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($quote['Quote']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($quote['Quote']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($quote['Quote']['deleted']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo __('Actions'); ?><b class="caret bottom-up"></b></a>
		<ul class="dropdown-menu bottom-up pull-right">
			<li><?php echo $this->Html->link(__('Edit Quote'), array('action' => 'edit', $quote['Quote']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete Quote'), array('action' => 'delete', $quote['Quote']['id']), null, __('Are you sure you want to delete # %s?', $quote['Quote']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List Quotes'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Quote'), array('action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Requests'), array('controller' => 'requests', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Request'), array('controller' => 'requests', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Suppliers'), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Supplier'), array('controller' => 'suppliers', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Results'), array('controller' => 'results', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Result'), array('controller' => 'results', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
			<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
		</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Orders'); ?></h3>
	<?php if (!empty($quote['Order'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $quote['Order']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
	<?php echo $quote['Order']['user_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Quote Id'); ?></dt>
		<dd>
	<?php echo $quote['Order']['quote_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('State Id'); ?></dt>
		<dd>
	<?php echo $quote['Order']['state_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
	<?php echo $quote['Order']['quantity']; ?>
&nbsp;</dd>
		<dt><?php echo __('Total Price'); ?></dt>
		<dd>
	<?php echo $quote['Order']['total_price']; ?>
&nbsp;</dd>
		<dt><?php echo __('Unitary Price'); ?></dt>
		<dd>
	<?php echo $quote['Order']['unitary_price']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
	<?php echo $quote['Order']['created']; ?>
&nbsp;</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
	<?php echo $quote['Order']['modified']; ?>
&nbsp;</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
	<?php echo $quote['Order']['deleted']; ?>
&nbsp;</dd>
		<dt><?php echo __('Rating'); ?></dt>
		<dd>
	<?php echo $quote['Order']['rating']; ?>
&nbsp;</dd>
		<dt><?php echo __('Logistics'); ?></dt>
		<dd>
	<?php echo $quote['Order']['logistics']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
<div class="actions dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <b class="caret bottom-up"></b></a>
		<ul class="dropdown-menu bottom-up pull-right">
				<li><?php echo $this->Html->link(__('Edit Order'), array('controller' => 'orders', 'action' => 'edit', $quote['Order']['id'])); ?></li>
			</ul>
		</div>
	</div>
	