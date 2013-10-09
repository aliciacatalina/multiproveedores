<h1>Blog usuarios</h1>
<p><?php echo $this->Html->link("Add Usuario", array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
                <th colspan=2>Actions</th>
        <th>Created</th>
    </tr>

<!-- Here's where we loop through our $usuarios array, printing out usuario info -->

<?php foreach ($usuarios as $usuario): ?>
    <tr>
        <td><?php echo $usuario['Usuario']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($usuario['Usuario']['title'], array('action' => 'view', $usuario['Usuario']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $usuario['Usuario']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link('Delete', array('action' => 'delete', $usuario['Usuario']['id'])); ?>
        </td>
        <td>
            <?php echo $usuario['Usuario']['created']; ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>