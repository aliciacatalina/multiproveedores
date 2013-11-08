// REQUESTS - VIEW

function type_changed1()
{
	fp_type_changed('1-atributos', '1-', '1-product_type_id');
}

function search1()
{
	search = new Array();
	search['category']		= $('#1-category_id').val();
	search['attributes'] 	= fp_construct_array_for_attribute_values('1-atributos');

alert ($('#1-category_id').val());
	alert(JSON.stringify(search));

	$.ajax({
		url: 'http://localhost:8080/multiproveedores/Products/products_search_by_attributes/',
		type: 'GET',
		contentType: 'application/json',
		async: false,
		data: JSON.stringify(search),
		success : function(data)
		{	
			alert(data);
			//fp_change_attributes_form('1-atributos', '1-', JSON.parse(data));
		},
		
		error : function(a,b,data)
		{
			alert("Error =)\n");
		}			
	});

}
