<?php
App::uses('AppModel', 'Model');
App::uses('ProductSearch', 'Lib');
/**
 * Product Model
 *
 * @property Category $Category
 * @property Type $Type
 * @property Attribute $Attribute
 * @property Supplier $Supplier
 */
class Product extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'category_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'type_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'manufacturer_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
/**
 *hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Quote' => array(
			'className' => 'Quote',
			'foreignKey' => 'product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);



/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Type' => array(
			'className' => 'Type',
			'foreignKey' => 'type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Attribute' => array(
			'className' => 'Attribute',
			'joinTable' => 'attributes_products',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'attribute_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Supplier' => array(
			'className' => 'Supplier',
			'joinTable' => 'products_suppliers',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'supplier_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);



	public function search_by_attributes($search)
	{
		$preparation = $this->search_by_attributes_preparation($search);
		$db = $this->getDataSource();
		// return $preparation['query'];
		return $db->fetchAll($preparation['query'], $preparation['values']);
	}

	public function search_by_attributes_preparation($productSearch)
	{
		$not_empty_attributes = array();
		foreach ($productSearch->attributes as $key => $value)
		{
			if($value['value'] != '')
			{
				$not_empty_attributes[$value['attribute_id']] = $value['value'];
			}
		}

		if($productSearch->category == '')
		{
			return $this->attributes_no_category_preparation($not_empty_attributes);
		}else
		{
			return $this->attributes_category_preparation($productSearch->category, $not_empty_attributes);
		}
	}

	public function attributes_category_preparation($category, $not_empty_attributes)
	{
		$query = "select p.id, p.manufacturer_id ";
		$query .= "from products as p, products_suppliers as ps, categories_suppliers as c_s ";
		$query .= "where ";
		$query .= 	"p.id = ps.product_id AND ";
		$query .=	"c_s.supplier_id = ps.supplier_id AND ";
		$query .=	"c_s.category_id = ? ";

		foreach ($not_empty_attributes as $key => $attribute)
		{
			$query .= "AND ";
			$query .= "exists ( ";
			$query .= 		"select * from attributes_products ";
			$query .= 		"where ";
			$query .=			"attribute_id = ? AND ";
			$query .=			"product_id = p.id AND ";
			$query .=			"value = ? ";
			$query .=	") ";
		}

		$values = $this->attributes_search_values($category, $not_empty_attributes);
		return array('query' => $query, 'values' => $values);
	}

	public function attributes_no_category_preparation($not_empty_attributes)
	{
		$query = "select p.id, p.manufacturer_id ";
		$query .= "from products as p, products_suppliers as ps ";
		$query .= "where ";
		$query .=	"p.id = ps.product_id ";

		foreach ($not_empty_attributes as $key => $attribute)
		{
			$query .= "AND ";
			$query .= "exists ( ";
			$query .= 		"select * from attributes_products ";
			$query .= 		"where ";
			$query .=			"attribute_id = ? AND ";
			$query .=			"product_id = p.id AND ";
			$query .=			"value = ? ";
			$query .= ") ";
		}

		$values = $this->attributes_search_values('', $not_empty_attributes);
		return array('query' => $query, 'values' => $values);
	}

	public function attributes_search_values($category, $not_empty_attributes)
	{
		$values = array();
		if($category != '')
		{
			array_push($values, $category);
		}
		foreach ($not_empty_attributes as $key => $value)
		{
			array_push($values, $key);
			array_push($values, $value);
		}
		return $values;
	}

}
