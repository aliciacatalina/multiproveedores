<?php
    class ProductSearchQueries {
		
    //attributes_search_with_equivalences
    	public function attributes_search_with_equivalences_query($productSearch)
		{
			$query = "SELECT s.id AS supplier_id, p.id AS product_id, s.corporate_name, s.moral_rfc, s.contact_name, s.contact_email, s.credit, s.contact_telephone, s.rating, s.accepted_quotes, s.rejected_quotes, p.manufacturer_id, price";
			$query += "FROM suppliers AS s, products AS p, ";
			if($productSearch->category != '')
			{
				$query += " categories_suppliers as c_s, ";
			}
			$query += "( select ps.supplier_id as s_id, e.p_id as p_id, ps.price as price ";
			$query += "from products_suppliers as ps, ( ";
			$query += "select e.equivalent_id as p_id ";
			$query += "from equivalencies as e ";
			$query += "WHERE ";

			$attributes_count = count($productSearch->attributes);
			$i = 0;
			foreach ($productSearch->attributes as $key => $attribute)
			{
				$query += attributes_search_with_equivalences_query_aux($attribute['id'], $attribute['value']);
				$i++;
				if($i < $attributes_count)
				{
					$query += " AND ";
				}
			}
			$query += ") AS e ";
			$query += "WHERE ps.product_id = e.p_id";
			$query += ") AS s_p ";
			$query += "WHERE s.id = s_p.s_id AND p.id = s_p.p_id";
			if($productSearch->category != '')
			{
				$query += " AND s.id = c_s.supplier_id AND c_s.category_id = ?";
			}
			return $query;
		}
		
		private function attributes_search_with_equivalences_query_aux($attribute_id, $attribute_value)
		{
			return sprintf(
				"exists ( select * from attributes_products where product_id = e.original_id AND attribute_id = ? AND value = '?' )",
				$attribute_id, $attribute_value);
		}

	//attributes_search_no_equivalences
		public function attributes_search_no_equivalences_query($productSearch)
		{
			$query = "SELECT s.id AS supplier_id, p.id AS product_id, s.corporate_name, s.moral_rfc, s.contact_name, s.contact_email, s.credit, s.contact_telephone, s.rating, s.accepted_quotes, s.rejected_quotes, p.manufacturer_id, price";
			$query += "FROM suppliers AS s, products AS p, ";
			if($productSearch->category != '')
			{
				$query += " categories_suppliers as c_s, ";
			}
			$query += "(select ps.supplier_id AS s_id, ps.product_id AS p_id, ps.price AS price WHERE";
			$attributes_count = count($productSearch->attributes);
			$i = 0;
			foreach ($productSearch->attributes as $key => $attribute)
			{
				$query += attributes_search_no_equivalences_query_aux($attribute['id'], $attribute['value']);
				$i++;
				if($i < $attributes_count)
				{
					$query += " AND ";
				}
			}
			$query += " ) AS s_p ";
			$query += "WHERE s.id = s_p.s_id AND p.id = s_p.p_id";
			if($productSearch->category != '')
			{
				$query += " AND s.id = c_s.supplier_id AND c_s.category_id = ?";
			}
			return $query;
		}
		
		private function attributes_search_no_equivalences_query_aux($attribute_id, $attribute_value)
		{
			return sprintf(
				"exists ( select * from attributes_products where product_id = p.id AND attribute_id = ? AND value = '?' )",
				$attribute_id, $attribute_value);
		}
		
		public function attributes_search_values($productSearch)
		{
			$values = array();
			foreach ($productSearch->attributes as $key => $attribute)
			{
				array_push($attribute->id, $attribute->value);
			}
			if($productSearch->category != '')
			{
				array_push($values, $productSearch->category);
			}
			return $values;
		}
	}
?>