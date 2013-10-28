<?php
class RequestServicesController extends AppController {
    public $uses = array('Content');
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
    public function newOnlineRequest()
    {
            $this->response->header('Access-Control-Allow-Origin', 'http://origen.herokuapp.com');
            $this->response->header('Access-Control-Allow-Headers ', 'Content-Type' );
            $this->response->header('Content-Type ', 'application/json');

            $this->autoRender = false;
            $this->Content->create();
            $content['comment'] = $this->request->data['comment'];
            $this->Content->save($content);
            echo $content;
    }

    /*
    public function index() {
        $recipes = $this->Recipe->find('all');
        $this->set(array(
            'recipes' => $recipes,
            '_serialize' => array('recipes')
        ));
    }

    public function view($id) {
        $recipe = $this->Recipe->findById($id);
        $this->set(array(
            'recipe' => $recipe,
            '_serialize' => array('recipe')
        ));
    }

    public function edit($id) {
        $this->Recipe->id = $id;
        if ($this->Recipe->save($this->request->data)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }

    public function delete($id) {
        if ($this->Recipe->delete($id)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(array(
            'message' => $message,
            '_serialize' => array('message')
        ));
    }
    */
}