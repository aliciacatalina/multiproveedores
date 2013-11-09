<?php
App::uses('AppModel', 'Model');
App::uses('ProductSearch', 'Lib');
App::uses('ProductResult', 'Lib');
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
		$result = $db->fetchAll($preparation['query'], $preparation['values']);
		$results = array();
		$current_product_id = 0;
		$aux = null;
		// $line = $result[0][0];
		// return array($line['data_type_id'], $line['name'], $line['value']);
		for($i = 0; $i < count($result); $i++)
		{
			$line = $result[$i][0];
			if($current_product_id == 0 || $current_product_id != $line['id'])
			{
				if($current_product_id != 0)
				{
					array_push($results, $aux);
				}
				$current_product_id = $line['id'];
				$aux = new ProductResult($line['id'], $line['manufacturer_id']);
			}
			array_push($aux->attributes, array($line['data_type_id'], $line['name'], $line['value']));
		}
		if($aux != null)
		{
			array_push($results, $aux);
		}
		return $results;
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
			return $this->attributes_no_category_preparation($productSearch->type, $not_empty_attributes);
		}else
		{
			return $this->attributes_category_preparation($productSearch->category, $productSearch->type, $not_empty_attributes);
		}
	}

	public function attributes_category_preparation($category, $product_type, $not_empty_attributes)
	{
		$query = "select p.id, p.manufacturer_id, name, data_type_id, value ";
		$query .= "from products as p, attributes as a, attributes_products as ap ";
		$query .= "WHERE p.id in ";
		$query .= "(select suppliers_filter.p_id ";
		$query .= "from ";
		$query .= "(select attributes_filter.p_id as p_id, ps.supplier_id as s_id ";
		$query .= "from (";
		$query .= "select ap.product_id as p_id ";
		$query .= "from ";
		$query .= 	"( ";
		$query .= "select * ";
		$query .= "from attributes ";
		$query .= $this->list_of_ids_place_holders($not_empty_attributes);;
		$query .= ") as a ";
		$query .= "inner join ";
		$query .= "attributes_products as ap ";
		$query .= "on a.id = ap.attribute_id ";
		$query .= $this->list_of_values_place_holders($not_empty_attributes) . " ";
		$query .= "group by p_id ";
		$query .= "Having Count(ap.product_id) >= ". count($not_empty_attributes);
		$query .= ") as attributes_filter, ";
		$query .= "products_suppliers as ps ";
		$query .= "where attributes_filter.p_id = ps.product_id ";
		$query .= ") as suppliers_filter, ";
		$query .= "categories_suppliers as cs ";
		$query .= "where ";
		$query .= "cs.supplier_id = suppliers_filter.s_id AND ";
		$query .= "cs.category_id = ? ";
		$query .= ") ";
		$query .= "AND p.type_id = ? AND ap.product_id = p.id AND ap.attribute_id = a.id ";
		$query .= "ORDER BY p.id, attribute_id";

		$values = $this->attributes_search_values($category, $product_type, $not_empty_attributes);
		return array('query' => $query, 'values' => $values);
	}

	public function attributes_no_category_preparation($product_type, $not_empty_attributes)
	{
		$query = "select p.id, p.manufacturer_id, name, data_type_id, value ";
		$query .= "from products as p, attributes as a, attributes_products as ap ";
		$query .= "WHERE p.id in ";

		$query .= "(select attributes_filter.p_id as p_id ";
		$query .= "from (";
		$query .= "select ap.product_id as p_id ";
		$query .= "from ";
		$query .= 	"( ";
		$query .= "select * ";
		$query .= "from attributes ";
		$query .= $this->list_of_ids_place_holders($not_empty_attributes);;
		$query .= ") as a ";
		$query .= "inner join ";
		$query .= "attributes_products as ap ";
		$query .= "on a.id = ap.attribute_id ";
		$query .= $this->list_of_values_place_holders($not_empty_attributes) . " ";
		$query .= "group by p_id ";
		$query .= "Having Count(ap.product_id) >= ". count($not_empty_attributes);
		$query .= ") as attributes_filter ";
		$query .= ") ";

		$query .= "AND p.type_id = ? AND ap.product_id = p.id AND ap.attribute_id = a.id ";
		$query .= "ORDER BY p.id, attribute_id";

		$values = $this->attributes_search_values('', $product_type, $not_empty_attributes);
		return array('query' => $query, 'values' => $values);
	}

	public function list_of_ids_place_holders($attributes)
	{
		if (count($attributes) == 0) return '';

		$result = "where attributes.id in ( ?";
		for($i = 0; $i < count($attributes)-1; $i++)
		{
			$result .= ", ?";
		}
		$result .= ") ";
		return $result;
	}

	public function list_of_values_place_holders($attributes)
	{
		if (count($attributes) == 0) return '';

		$result = "WHERE ap.value = ?";
		for($i = 0; $i < count($attributes)-1; $i++)
		{
			$result .= " OR ap.value = ?";
		}
		return $result;
	}

	public function attributes_search_values($category, $type, $not_empty_attributes)
	{
		$values = array();
		foreach ($not_empty_attributes as $key => $value)
		{
			array_push($values, $key);
		}
		foreach ($not_empty_attributes as $key => $value)
		{
			array_push($values, $value);
		}
		if($category != '')
		{
			array_push($values, $category);
		}
		array_push($values, $type);
		return $values;
	}

}
