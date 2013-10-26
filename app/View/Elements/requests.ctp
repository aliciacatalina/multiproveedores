<table cellpadding="10" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('category_id'); ?></th>
		<th><?php echo $this->Paginator->sort('content_id'); ?></th>
		<th><?php echo $this->Paginator->sort('user_id'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		<th><?php echo $this->Paginator->sort('deleted'); ?></th>
		<th><?php echo $this->Paginator->sort('note'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($requests as $request): ?>
	<tr>
		<td><?php echo h($request['Request']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($request['Category']['url'], array('controller' => 'categories', 'action' => 'view', $request['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($request['Content']['comment'], array('controller' => 'contents', 'action' => 'view', $request['Content']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($request['User']['name'], array('controller' => 'users', 'action' => 'view', $request['User']['id'])); ?>
		</td>
		<td><?php echo h($request['Request']['created']); ?>&nbsp;</td>
		<td><?php echo h($request['Request']['modified']); ?>&nbsp;</td>
		<td><?php echo h($request['Request']['deleted']); ?>&nbsp;</td>
		<td><?php echo h($request['Request']['note']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $request['Request']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $request['Request']['id'])); ?>
			<?php echo $this->Form->postLink(__('Virtual Del'), array('action' => 'virtualDelete', $request['Request']['id']), null, __('Are you sure you want to delete # %s?', $request['Request']['id'])); ?>
			<?php if(isset($request['Request']['user_id'])) :
				echo $this->Form->postLink(__('Release'), array('action' => 'releaseRequest', $request['Request']['id']), null, __('Are you sure you want to release  # %s?', $request['Request']['id']));
			endif; ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $request['Request']['id']), null, __('Are you sure you want to delete # %s?', $request['Request']['id'])); ?>
			
		</td>
	</tr>
	<?php endforeach; ?>
</table>