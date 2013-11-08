<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 */
class ProductsController extends AppController {
/**
 * Components
 *
 * @var array
 */
public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Product->recursive = 0;
		$this->set('products', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
		$this->set('product', $this->Product->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		}
		
		$types = $this->Product->Type->find('list');
		$attributes = $this->Product->Attribute->find('list');
		$suppliers = $this->Product->Supplier->find('list');
		$this->set(compact('types', 'attributes', 'suppliers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
		}
		$categories = $this->Product->Category->find('list');
		$types = $this->Product->Type->find('list');
		$attributes = $this->Product->Attribute->find('list');
		$suppliers = $this->Product->Supplier->find('list');
		$this->set(compact('categories', 'types', 'attributes', 'suppliers'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('The product has been deleted.'));
		} else {
			$this->Session->setFlash(__('The product could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}



						// SEARCHS!!!
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

		$productSearchQueries = new $ProductSearchQueries();
		echo $productSearchQueries->attributes_search($productSearch);
	}
