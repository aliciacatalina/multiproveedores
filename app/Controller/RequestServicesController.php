<?php
class RequestServicesController extends AppController {
	public $uses = array('Content, Requests');
	public $components = array('RequestHandler');

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('newOnlineRequest');
	}

	public function newOnlineRequest()
	{
		$this->response->header('Access-Control-Allow-Origin', 'http://origen.herokuapp.com');
		$this->response->header('Access-Control-Allow-Headers ', 'Content-Type' );
		$this->response->header('Content-Type ', 'application/json');

		$this->autoRender = false;

		//Empezamos trancsaccion
		$transaction = $this->Content->getDataSource();
		$transaction->begin();

		//Tenemos que crear el "content" y guardarlo
		$this->Content->create();

		//Obtenemos los datos a guardar a content
		$content['xml'] = $this->xmlCreation($this->request->data);
		$content['comment'] = $this->request->data['comentario'];

		if ($this->Content->save($content)) {

			//Obteniendo los datos para crear la solicitud
			
			$request['category_id'] = $this->request->data['categoria'];
			$request['content_id'] = $this->Content->getInsertID();

			$this->Request->create();
			if ($this->Request->save($request)) {

				//Se ha guardado exitosamente el registro por lo tanto hacemos 
				$transaction->commit();
				echo "funciona";

			} else{
				$transaction->rollback();
				echo "No funciona";
			}
		} else {
			$transaction->rollback();
			echo "No funciona";
		}
	}
}

	public function xmlCreation($data)
	{
		$xmlDoc = new DOMDocument('1.0');
		$xmlDoc->formatOutput = true;
		//Elemento raiz
		$root = $xmlDoc->createElement('Request');
		$root = $xmlDoc->appendChild($root);

		//Elemento cliente
		$customer = $xmlDoc->createElement('Customer');
		$customer = $root->appendChild($customer);

		//Elemento producto
		$product = $xmlDoc->createElement('Product');
		$product = $root->appendChild($product);

		//Elemento comentario
		$comments = $xmlDoc->createElement('Comments');
		$comments = $root->appendChild($comments);  

		//Iterar y agregar los campos
		foreach ($data as $campos => $value) {
			$tipo = substr($campos, 0, 2);
			$campo = substr($campos, 3);
			switch($tipo){
			//Campo de cliente
				case "cl":
				$campo = $xmlDoc->createElement($campo);
				$campo = $customer->appendChild($campo);
				$valor = $xmlDoc->createTextNode($value);
				$valor = $campo->appendChild($valor);
				break;
			//Campo de producto
				case "pd":
				$campo = $xmlDoc->createElement($campo);
				$campo = $product->appendChild($campo);
				$valor = $xmlDoc->createTextNode($value);
				$valor = $campo->appendChild($valor);
				break;
			}
		}
		$xml =  $xmlDoc->saveXML();
	}
}