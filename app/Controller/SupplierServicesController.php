<?php
class SupplierServicesController extends AppController {
	public $uses = array('Content', 'Supplier');

	public $components = array('RequestHandler');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('newOnlineRequest');
	}

	/**
	 * newOnlineRequest method
	 *
	 * @return void
	 */
	public function products_search_by_attributes()
	{
		$this->response->header('Access-Control-Allow-Origin', 'http://origen.herokuapp.com');
		$this->response->header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
		$this->response->header('Access-Control-Allow-Headers ', 'Content-Type' );
		$this->response->header('Content-Type ', 'multipart/form-data');

		$this->autoRender = false;

		$product_description = json_decode($this->request->data);
		$productSearch = new ProductSearch(
			$product_description['category'],
			$product_description['attributes']
			);
	}

	private function attributes_search_no_equivalences($productSearch)
	{
		$query = attributes_search_no_equivalences_query($productSearch);
		$values = attributes_search_no_equivalences_values($productSearch);
		$db = $this->getDataSource();
		return $db->fetchAll($query, $values);
	}
}