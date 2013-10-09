<?php
class Usuario extends AppModel{
	public $validate = array(
			'nombre' => array(
					'rule' => 'notEmpty'
			),
			'nombreUsuario' => array(
					'rule' => 'notEmpty'
			)
	);
}