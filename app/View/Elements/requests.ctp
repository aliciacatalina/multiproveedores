<?php foreach ($requests as $request): ?>
<div class="row striped">
	<h4>
		Pagina Origen: <?php echo $this->Html->link($request['Category']['url'], array('controller' => 'categories', 'action' => 'view', $request['Category']['id'])); ?>
	</h4>
	<h4>
		Comentarios: <?php echo $this->Html->link($request['Content']['comment'], array('controller' => 'contents', 'action' => 'view', $request['Content']['id'])); ?>
	</h4>
	<h4>
		Creada por: <?php echo $this->Html->link($request['User']['name'], array('controller' => 'users', 'action' => 'view', $request['User']['id'])); ?>
	</h4>
	<h4>Fecha Creacion: <?php echo date('j M Y', strtotime(h($request['Request']['created']))); ?>&nbsp;</h4>
	<h4>Fecha Modificacion: <?php echo date('j M Y', strtotime(h($request['Request']['modified']))); ?>&nbsp;</h4>
<!-- 		<h4><?php echo h($request['Request']['deleted']); ?>&nbsp;</h3>
	<h4><?php echo h($request['Request']['note']); ?>&nbsp;</h3> -->
	<div class="inner-actions">
		<?php echo $this->Html->link(__('Trabajar Solicitud'), array('action' => 'view', $request['Request']['id']), array('class'=>'btn btn-info view')); ?>
	</div>
</div>
<?php endforeach; ?>