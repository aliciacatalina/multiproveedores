<h1>Blog usuarios</h1>
<p><?php echo $this->Html->link("Add User", array('action' => 'add')); ?></p>
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

<?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td><?php echo $this->Html->link($user['User']['name'], array('action' => 'view', $user['User']['id'])); ?></td>
        <td><?php echo $user['User']['username']; ?></td>
        <td><?php echo $user['User']['password']; ?></td>
        <td><?php echo $user['User']['email']; ?></td>
        <td><?php echo $user['User']['created']; ?></td>
        <td>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $user['User']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link('Delete', array('action' => 'delete', $user['User']['id'])); ?>
        </td>        
    </tr>
<?php endforeach; ?>

</table>