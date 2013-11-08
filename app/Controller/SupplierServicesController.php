<?php
class SupplierServicesController extends AppController {
	public $uses = array('Content', 'Supplier');

	public $components = array('RequestHandler');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('newOnlineRequest');
	}

}