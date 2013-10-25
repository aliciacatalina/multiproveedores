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

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
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

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<!-- <div class="panels ">
	  <div class="panel panel-left">
	  </div>
	</div>

	<div class="panel-content">
	  <div class="navbar navbar-fixed-top">
	    <div class="navbar-inner">
	      <div class="container">
	        <a href="#menu" class="menu-trigger meteocon" data-meteocon="M" data-toggle="panel" data-target="#menu"></a>
	        <div class="nav-collapse collapse">
	          <nav id="menu">
	            <ul class="nav">
	              <li><a class="brand" href="index.html">Multiproveedores</a></li>
	              <li class="dropdown">
	              	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Solicitudes<b class="caret bottom-up"></b></a>
	              	<ul class="dropdown-menu bottom-up pull-right">
	              		<li><a href="#">Solicitudes Pendientes</a></li>
	              		<li><a href="#">Solicitudes Activas</a></li>
	              		<li><a href="#">Crear Solicitud</a></li>
	              	</ul>
	              </li>
	              <li class="dropdown">
	              	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Cotizaciones<b class="caret bottom-up"></b></a>
	              	<ul class="dropdown-menu bottom-up pull-right">
	              		<li><a href="#">Cotizaciones Pendientes</a></li>
	              	</ul>
	              </li>
	              <li class="dropdown">
	              	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Ordenes<b class="caret bottom-up"></b></a>
	              	<ul class="dropdown-menu bottom-up pull-right">
	              		<li><a href="#">Ordenes por Cerrar</a></li>
	              	</ul>
	              </li>
	              <li class="dropdown">
	              	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Cuentas<b class="caret bottom-up"></b></a>
	              	<ul class="dropdown-menu bottom-up pull-right">
	              		<li><a href="#">Cuentas Por Pagar</a></li>
	              		<li><a href="#">Historial de Pagos</a></li>
	              	</ul>
	              </li>
	              <li class="dropdown">
	              	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuario<b class="caret bottom-up"></b></a>
	              	<ul class="dropdown-menu bottom-up pull-right">
	              		<li><a href="#">Cambiar Contraseña</a></li>
	              		<li><a href="#">Editar Perfil</a></li>
	              		<li class="divider"></li>
	              		<li><a href="#">Cerrar Sesión</a></li>
	              	</ul>
	              </li>
	            </ul>
	          </nav>
	        </div>
	      </div>
	    </div>
	  </div>
	</div> -->
	<div id="main-container">
		<div id="header">
		 <h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1> 
 			<?php $this->BootstrapNavbar->create(array('fixed' => 'top', 'responsive' => 'false')) ;
			$this->BootstrapNavbar->brand('Multiproveedores') ;
			$this->BootstrapNavbar->link('Solicitudes', array('controller' => 'blog', 'action' => 'index')) ;
			$this->BootstrapNavbar->link('Cotizaciones', array('controller' => 'blog', 'action' => 'index')) ;
			$this->BootstrapNavbar->link('Órdenes', array('controller' => 'blog', 'action' => 'index')) ;
			$this->BootstrapNavbar->link('Cuentas', array('controller' => 'blog', 'action' => 'index')) ;
			$this->BootstrapNavbar->link('Usuario', array('controller' => 'blog', 'action' => 'index')) ;
			$this->BootstrapNavbar->end() ; 
			echo $this->BootstrapNavbar->compile () ; ?>
		</div> 
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
