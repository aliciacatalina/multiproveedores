<?php
App::uses('AppController', 'Controller');
/**
 * Requests Controller
 *
 * @property Request $Request
 * @property PaginatorComponent $Paginator
 */
class RequestsController extends AppController {

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
		$this->Request->recursive = 0;
		$this->set('requests', $this->Paginator->paginate());
	}

/**
 *@throws NotFunctionException
 *@param string $id
 *@return void
 */
	public function pending()
	{
		$this->Request->recursive = 0;
		$pendingRequests = $this->Paginator->paginate(array('user_id' => null));
		$this->set('pendingRequests', $pendingRequests);


		//$pendingRequests = $this->Request->find('all', array('conditions' => array('Request.user_id' => null)));
		//$this->set('pendingRequests', $pendingRequests);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null)
	{
		$this->Request->recursive = 0;

		if (!$this->Request->exists($id)) {
			throw new NotFoundException(__('Invalid request'));
		}

		$options = array('conditions' => array('Request.id' => $id));
		$request = $this->Request->find('first', $options);
		
		if(!isset($request['Request']['user_id']))
		{
			$this->assign($request);
		}

		$options = array('conditions' => array('Request.' . $this->Request->primaryKey => $id));
		$this->set('request', $this->Request->find('first', $options));
	}

	/**
 * assign method
 *
 * @throws NotFoundException
 * @param request $request
 * @return void
 */
	private function assign($request)
	{
		$request['Request']['user_id'] = $this->Auth->user('id');
		print_r($request);
		$this->Request->save($request['Request']);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Request->create();
			if ($this->Request->save($this->request->data)) {
				$this->Session->setFlash(__('The request has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The request could not be saved. Please, try again.'));
			}
		}
		$categories = $this->Request->Category->find('list');
		$contents = $this->Request->Content->find('list');
		$users = $this->Request->User->find('list');
		$this->set(compact('categories', 'contents', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Request->exists($id)) {
			throw new NotFoundException(__('Invalid request'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Request->save($this->request->data)) {
				$this->Session->setFlash(__('The request has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The request could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Request.' . $this->Request->primaryKey => $id));
			$this->request->data = $this->Request->find('first', $options);
		}
		$categories = $this->Request->Category->find('list');
		$contents = $this->Request->Content->find('list');
		$users = $this->Request->User->find('list');
		$this->set(compact('categories', 'contents', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Request->id = $id;
		if (!$this->Request->exists()) {
			throw new NotFoundException(__('Invalid request'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Request->delete()) {
			$this->Session->setFlash(__('The request has been deleted.'));
		} else {
			$this->Session->setFlash(__('The request could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
