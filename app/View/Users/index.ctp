<h1>Usuarios</h1>
<p><?php echo $this->Html->link("Add User", array('action' => 'add')); ?><a><i class="icon-user"></i></a></p>

<!-- Here's where we loop through our $usuarios array, printing out usuario info -->

<?php foreach ($users as $user): ?>
    <div class="row striped">
        <h4>Id: <?php echo $user['User']['id']; ?></h4>
        <h4>Nombre: <?php echo $this->Html->link($user['User']['name'], array('action' => 'view', $user['User']['id'])); ?></h4>
        <h4>Username:<?php echo $user['User']['username']; ?></h4>
        <h4>Password: <?php echo $user['User']['password']; ?></h4>
        <h4>Email:<?php echo $user['User']['email']; ?></h4>
        <h4>Creado: <?php echo $user['User']['created']; ?></h4>
        <p>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $user['User']['id'])); ?>
        </p>
        <p>
            <?php echo $this->Html->link('Delete', array('action' => 'delete', $user['User']['id'])); ?>
        </p>        
    </div>
<?php endforeach; ?>
