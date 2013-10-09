<h1>Blog usuarios</h1>
<p><?php echo $this->Html->link("Add Usuario", array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Idusuario</th>
        <th>Nombre</th>
        <th>Nombre de usuario</th>
        <th>Password</th>
        <th>Correo</th>
        <th>Fecha de creaci&oacute;n</th>
        <th colspan=2>Actions</th>      
    </tr>

<!-- Here's where we loop through our $usuarios array, printing out usuario info -->

<?php foreach ($usuarios as $usuario): ?>
    <tr>
        <td><?php echo $usuario['Usuario']['idusuario']; ?></td>
        <td>
            <?php echo $this->Html->link($usuario['Usuario']['nombre'], array('action' => 'view', $usuario['Usuario']['idusuario'])); ?>
        </td>
        <td><?php echo $usuario['Usuario']['nombreusuario']; ?></td>
        <td><?php echo $usuario['Usuario']['password']; ?></td>
        <td><?php echo $usuario['Usuario']['correo']; ?></td>
        <td><?php echo $usuario['Usuario']['fechacreacion']; ?></td>
        <td>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $usuario['Usuario']['idusuario'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link('Delete', array('action' => 'delete', $usuario['Usuario']['idusuario'])); ?>
        </td>        
    </tr>
<?php endforeach; ?>

</table>