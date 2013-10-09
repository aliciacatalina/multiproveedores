<?php
class UsuariosController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('RequestHandler');


	//accion para desplegar el listado de usuarios
	public function index() {
		$usuarios = $this->Usuario->find('all');
		$this->set(array(
				'usuarios' => $usuarios,
				'_serialize' => array('usuarios')
			));
	}
	
	//desplegar el contenido del Usuario individual
	public function view($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid Usuario'));
		}
	
		$Usuario = $this->Usuario->findById($id);
		if (!$Usuario) {
			throw new NotFoundException(__('Invalid Usuario'));
		}
		$this->set('Usuario', $Usuario);
	}
	
	//agregar un nuevo registro
	public function add() {
		if ($this->request->is('Usuario')) {
			$this->Usuario->create();
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('Your Usuario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to add your Usuario.'));
		}
	}
	
	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid Usuario'));
		}
	
		$Usuario = $this->Usuario->findById($id);
		if (!$Usuario) {
			throw new NotFoundException(__('Invalid Usuario'));
		}
	
		if ($this->request->is('Usuario') || $this->request->is('put')) {
			$this->Usuario->id = $id;
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('Your Usuario has been updated.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to update your Usuario.'));
		}
	
		if (!$this->request->data) {
			$this->request->data = $Usuario;
		}
	}

	public function delete($id = null){
		if(!$id){
			throw new NotFoundException(__('No se encuentra'));		
		}

		$Usuario = $this->Usuario->findById($id);
		if(!$Usuario){
			throw new NotFoundException(__('Tampoco se encuentra'));
		}

		if($this->Usuario->delete($id)){
			$this->Session->setFlash(__('Se elimino el Usuario'));
			return $this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('No se pudo eliminar el Usuario'));
	}
}

