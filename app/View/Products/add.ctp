<?php echo $this->Html->script('add-product'); ?>


<?php echo $this->Form->create('Product', array('id'=>'ProductAddForm')); ?>
	<fieldset>
		<legend><?php echo __('Add Product'); ?></legend>
	<?php
		echo $this->Form->input('category_id');
		echo $this->Form->input('type_id', array('onchange'=>"type_changed()"));
		echo $this->Form->input('manufacturer_id', array('type' => 'Text', 'label' => 'Numero Fabricante'));
		echo $this->Form->hidden('attributes_values', array("id" => 'attributes_values'));
	?>
	</fieldset>


<fieldset>
	<div id="atributos">
		<legend>Atributos</legend>
	</div>
</fieldset>



<?php echo $this->Form->end(__('Submit')); ?>