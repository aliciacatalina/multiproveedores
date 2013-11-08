<div class="quotes index">
	<h2><?php echo __('Quotes'); ?></h2>
	<div class="actions dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo __('Actions'); ?><b class="caret bottom-up"></b></a>
		<ul class="dropdown-menu bottom-up pull-right">
			<li><?php echo $this->Html->link(__('New Quote'), array('action' => 'add')); ?></li>
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
	<?php foreach ($quotes as $quote): ?>
	<div class="row striped">
		<div>
			<h4>
				<?php echo $this->Html->link($quote['Request']['note'], array('controller' => 'requests', 'action' => 'view', $quote['Request']['id'])); ?>
			</h4>
			<h4>
				<?php echo $this->Html->link($quote['Supplier']['corporate_name'], array('controller' => 'suppliers', 'action' => 'view', $quote['Supplier']['id'])); ?>
			</h4>
			<h4>
				<?php echo $this->Html->link($quote['User']['name'], array('controller' => 'users', 'action' => 'view', $quote['User']['id'])); ?>
			</h4>
			<h4>
				<?php echo $this->Html->link($quote['Result']['value'], array('controller' => 'results', 'action' => 'view', $quote['Result']['id'])); ?>
			</h4>
			<h4>
				<?php echo $this->Html->link($quote['Product']['id'], array('controller' => 'products', 'action' => 'view', $quote['Product']['id'])); ?>
			</h4>
			<h4><?php echo date('j M Y', strtotime(h($quote['Quote']['created']))); ?>&nbsp;</h4>
			<h4><?php echo date('j M Y', strtotime(h($quote['Quote']['modified']))); ?>&nbsp;</h4>
			<h4><?php echo date('j M Y', strtotime(h($quote['Quote']['deleted']))); ?>&nbsp;</h4>
		</div>
			<div class="inner-actions">
				<?php echo $this->Html->link(__('View'), array('action' => 'view', $quote['Quote']['id']), array('class'=>'btn btn-info')); ?>
				<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $quote['Quote']['id']), array('class'=>'btn btn-info')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $quote['Quote']['id']), array('class'=>'btn btn-info'), null, __('Are you sure you want to delete # %s?', $quote['Quote']['id'])); ?>
			</div>
	</div>
<?php endforeach; ?>
<p>
	<?php 
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?>
</p>
<ul class="pagination pagination-center">
	<?php
	echo $this->Paginator->prev('' . __('< '), array(), null, array('class' => 'previous'));
	echo $this->Paginator->numbers(array('separator' => ' '));
	echo $this->Paginator->next(__('') . ' >', array(), null, array('class' => 'next disabled')); ?>
</ul>
</div>