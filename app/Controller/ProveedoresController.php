<?php
class ProveedoresController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('RequestHandler');


	//accion para desplegar el listado de proveedores
	public function index() {
		$proveedores = $this->Proveedore->find('all');
		$this->set(array(
				'proveedores' => $proveedores,
				'_serialize' => array('proveedores')
			));
	}
}
	