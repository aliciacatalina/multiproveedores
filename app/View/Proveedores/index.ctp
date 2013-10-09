<h1>Listado proveedores</h1>
<p><?php echo $this->Html->link("Add Proveedor", array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Idproveedor</th>
        <th>Razo&oacute;n social</th>
        <th>RFC Moral</th>
        <th>Contacto</th>
        <th>Correo de contacto</th>
        <th>Cr&eacute;edito</th>
        <th>T&eacute;lefono de contacto</th>
        <th>Calificaci&oacute;n</th>
        <th>Cotizaciones aceptadas</th>
        <th>Cotizaciones rechazadas</th>
        <th colspan=2>Actions</th>      
    </tr>

<!-- Here's where we loop through our $proveedores array, printing out proveedor info -->

<?php foreach ($proveedores as $proveedor): ?>
    <tr>
        <td><?php echo $proveedor['Proveedor']['idproveedor']; ?></td>
        <td>
            <?php echo $this->Html->link($proveedor['Proveedor']['razonsocial'], array('action' => 'view', $proveedor['Proveedor']['idproveedor'])); ?>
        </td>
        <td><?php echo $proveedor['Proveedor']['rfcmoral']; ?></td>
        <td><?php echo $proveedor['Proveedor']['nombrecontacto']; ?></td>
        <td><?php echo $proveedor['Proveedor']['correocontacto']; ?></td>
        <td><?php echo $proveedor['Proveedor']['credito']; ?></td>
        <td><?php echo $proveedor['Proveedor']['telefonocontacto']; ?></td>
        <td><?php echo $proveedor['Proveedor']['calificacion']; ?></td>
        <td><?php echo $proveedor['Proveedor']['cotizacioesaceptadas']; ?></td>
        <td><?php echo $proveedor['Proveedor']['cotizacionesrechazadas']; ?></td>
        <td>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $proveedor['Proveedor']['idproveedor'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link('Delete', array('action' => 'delete', $proveedor['Proveedor']['idproveedor'])); ?>
        </td>        
    </tr>
<?php endforeach; ?>

</table>