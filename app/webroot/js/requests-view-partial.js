// REQUESTS - VIEW

function type_changed1()
{
	fp_type_changed('1-atributos', '1-', '1-product_type_id');
}

function search1()
{
	search = new Array();
	search['search_type']	= 'atributes_search';
	search['atributes'] 	= fp_construct_array_for_attribute_values('1-atributos');


	$.ajax({
		url: 'http://localhost:8080/multiproveedores/Products/products_search_by_attributes/' + type_id,
		type: 'GET',
		contentType: 'application/json',
		async: false,
		success : function(data)
		{	
			fp_change_attributes_form(form_id, prefix, JSON.parse(data));
		},
		
		error : function(a,b,data)
		{
			alert("Error =)\n");
		}			
	});

}
