<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Multiproveedores');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('furatto');
		echo $this->Html->css('examples');
		echo $this->Html->css('custom');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<?php if ($this->Session->read('Auth.User')){ 
 			$this->BootstrapNavbar->create(array('fixed' => 'top', 'responsive' => 'false')) ;
			$this->BootstrapNavbar->brand('Multiproveedores') ;
			$this->BootstrapNavbar->link('Solicitudes', array('controller' => 'blog', 'action' => 'index')) ;
			$this->BootstrapNavbar->link('Cotizaciones', array('controller' => 'blog', 'action' => 'index')) ;
			$this->BootstrapNavbar->link('Órdenes', array('controller' => 'blog', 'action' => 'index')) ;
			$this->BootstrapNavbar->link('Cuentas', array('controller' => 'blog', 'action' => 'index')) ;
			$this->BootstrapNavbar->link('Usuario', array('controller' => 'blog', 'action' => 'index')) ;
			$this->BootstrapNavbar->end() ; 
			echo $this->BootstrapNavbar->compile () ;
		// </div>
	} ?>

		<div id="content" class="inner-960">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
	</div>
</body>
</html>
