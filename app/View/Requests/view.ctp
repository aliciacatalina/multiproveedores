<?php echo $this->AssetCompress->script('requests-view'); ?>
<?php echo $this->Html->script('requests-updateQty'); ?>
<div class="requests view">
<h2><?php echo __('Request'); ?></h2>
	<dl>
		<dt><?php echo __('Id1'); ?></dt>
		<dd>
			<?php echo h($request['Request']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($request['Category']['url'], array('controller' => 'categories', 'action' => 'view', $request['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo $this->Html->link($request['Content']['comment'], array('controller' => 'contents', 'action' => 'view', $request['Content']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($request['User']['name'], array('controller' => 'users', 'action' => 'view', $request['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($request['Request']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($request['Request']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($request['Request']['deleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($request['Request']['note']); ?>
			&nbsp;
		</dd>
		<dt>Quantity</dt>
		<dd>			
			<?php echo $this->Form->input('Request.quantity', array('onchange'=>'updateQty(this,'.$request['Request']['id'].')'));?>
				&nbsp;		
		</dd>
		<dt>&nbsp;</dt>
		<dd>
			<?php echo $this->Html->link("Duplicar solicitud +", array('controller' => 'requests', 'action' => 'duplicate', $request['Request']['id'])); ?>
			
			&nbsp;
		</dd>
	</dl>
</div>

<!-- Búsqueda de proveedores mediante búsqueda de producto -->

<!-- 1: Búsqued por atributo -->
<fieldset>
	<legend> Búsqueda Por Atributos </legend>

	<label>Categoría:</label>
		<?php echo $this->Form->select('Categoría', $categories, array('id' => '1-category_id')); ?>
	<label>Tipo:</label>
		<?php echo $this->Form->select('Tipo', $types, array('id' => '1-product_type_id', 'onchange' => 'type_changed1()')); ?>

	<label> <?php echo __('Atributos del producto:') ?> </label>
	<div id="1-atributos"> </div>
	<input type="submit" value="Buscar" onClick="search1()"/>
</fieldset>

<!-- 2: Búsqueda por tipo -->
<fieldset>
	<legend> Búsqueda Por Tipo </legend>

	<label>Categoría:</label>
		<?php echo $this->Form->select('Categoría', $categories, array('id' => '2-category_id')); ?>
	<label>Tipo:</label>
		<?php echo $this->Form->select('Tipo', $types, array('id' => '2-product_type_id', 'onchange' => 'type_changed()')); ?>
	<input type="submit" value="Buscar" onClick="search2()"/>
</fieldset>


<!-- 3: Búsqueda por manufacturer_id -->
<fieldset>
	<legend> Búsqueda Por Identificador </legend>

	<label>Categoría:</label>
		<?php echo $this->Form->select('Categoría', $categories, array('id' => '3-category_id')); ?>
	<label>Equivalencias:</label>
		<?php echo $this->Form->checkbox('Equivalencias', array('id' => '3-equivalencies')); ?>
	<label>Identificador:</label>
		<?php echo $this->Form->select('Tipo', $types, array('id' => '3-manufacturer_id')) ?>
	<input type="submit" value="Buscar" onClick="search3()"/>
</fieldset>




<div class="actions dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo __('Actions'); ?><b class="caret bottom-up"></b></a>
		<ul class="dropdown-menu bottom-up pull-right">
			<li><?php echo $this->Html->link(__('Edit Request'), array('action' => 'edit', $request['Request']['id'])); ?> </li>
			<li><?php echo $this->Form->postLink(__('Delete Request'), array('action' => 'delete', $request['Request']['id']), null, __('Are you sure you want to delete # %s?', $request['Request']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List Requests'), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Request'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Quotes'); ?></h3>
	<?php if (!empty($request['Quote'])): ?>
	<table>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Request Id'); ?></th>
		<th><?php echo __('Supplier Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Result Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($request['Quote'] as $quote): ?>
		<tr>
			<td><?php echo $quote['id']; ?></td>
			<td><?php echo $quote['request_id']; ?></td>
			<td><?php echo $quote['supplier_id']; ?></td>
			<td><?php echo $quote['user_id']; ?></td>
			<td><?php echo $quote['result_id']; ?></td>
			<td><?php echo $quote['product_id']; ?></td>
			<td><?php echo $quote['created']; ?></td>
			<td><?php echo $quote['modified']; ?></td>
			<td><?php echo $quote['deleted']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'quotes', 'action' => 'view', $quote['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'quotes', 'action' => 'edit', $quote['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'quotes', 'action' => 'delete', $quote['id']), null, __('Are you sure you want to delete # %s?', $quote['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

<div class="actions dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#"><b class="caret bottom-up"></b></a>
		<ul class="dropdown-menu bottom-up pull-right">
			<li><?php echo $this->Html->link(__('New Quote'), array('controller' => 'quotes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
