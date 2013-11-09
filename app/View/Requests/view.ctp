<?php echo $this->AssetCompress->script('requests-view'); ?>

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
	</dl>
</div>

<!-- Búsqueda de proveedores mediante búsqueda de producto -->
<ul class="nav nav-tabs" id="search-tabs">
	<li class="active"><a href="#attributes">Busqueda por Atributos</a></li>
	<li><a href="#type">Busqueda por Tipo</a></li>
   	<li><a href="#id">Busqueda por Identificador</a></li>
</ul>
 
 <!-- Tabs for advanced search -->
<div class="tab-content">
    <div class="tab-pane active" id="attributes">
<!-- 1: Búsqued por atributo -->

	<label>Categoría:</label>
		<?php echo $this->Form->select('Categoría', $categories, array('id' => '1-category_id')); ?>
	<label>Tipo:</label>
		<?php echo $this->Form->select('Tipo', $types, array('id' => '1-product_type_id', 'onchange' => 'type_changed1()')); ?>

	<label> <?php echo __('Atributos del producto:') ?> </label>
	<div id="1-atributos"> </div>
	<input type="submit" value="Buscar" onClick="search1()" class="btn"/>
</div>

 <!-- 2: Búsqueda por tipo -->
 <div class="tab-pane" id="type">
 
       <label>Categoría:</label>
         <?php echo $this->Form->select('Categoría', $categories, array('id' => '2-category_id')); ?>
       <label>Tipo:</label>
         <?php echo $this->Form->select('Tipo', $types, array('id' => '2-product_type_id', 'onchange' => 'type_changed()')); ?>
       <input type="submit" value="Buscar" onClick="search2()" class="btn"/>
 
  </div>

<!-- 3: Búsqueda por manufacturer_id -->
<div class="tab-pane" id="id">
    <label>Categoría:</label>
     <?php echo $this->Form->select('Categoría', $categories, array('id' => '2-category_id')); ?>
   <label>Tipo:</label>
     <?php echo $this->Form->select('Tipo', $types, array('id' => '2-product_type_id', 'onchange' => 'type_changed()')); ?>
   <input type="submit" value="Buscar" onClick="search2()" class="btn"/>
</div>
  <script>
     $('#search-tabs a').click(function (e) {
       e.preventDefault();
       $(this).tab('show');
     })
   </script>


<div class="actions dropdown">
	<a class="dropdown-toggle" data-toggle="dropdown" href="#"><b class="caret bottom-up"></b></a>
		<ul class="dropdown-menu bottom-up pull-right">
			<li><?php echo $this->Html->link(__('New Quote'), array('controller' => 'quotes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
