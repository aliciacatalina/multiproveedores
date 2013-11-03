function set_attribute_values()
{
	attributes = $('#atributos .input');

	attributes_array = new Array();
	for(i = 0; i < attributes.length; i++)
	{
		attribute = new Object();
		attribute.name = attributes[i].id;
		attribute.value = attributes[i].value;
		attributes_array.push(attribute);
	}
	$('#attributes_values').val(JSON.stringify(attributes_array));
}

function inputFor(attribute)
{
	data_type_id 	= attribute.Attributes.data_type_id;
	name			= attribute.Attributes.name;

	if(	data_type_id == 1 || 	//Entero
		data_type_id == 2 || 	//Decimal
		data_type_id == 3)	//Texto
	{
		return $('<input>').attr({
				id: name, 
				class: 'input'
			});
	}
	if(	data_type_id == 4)	//Fecha
	{
		return $('<input>').attr({
				id: name,
				class: 'input'
			}).datepicker();
	}
}

function changeAttributesForm(attributes)
{
	newInputs = new Array();

	attributesForm = $('#atributos');
	$('#atributos .legend').remove();
	$('#atributos .input').remove();
	for(i = 0; i < attributes.length; i++)
	{
		attribute = attributes[i];

		$('<legend>').attr('class', 'legend').html(attribute.Attributes.name).appendTo(attributesForm);
		inputFor(attribute).appendTo(attributesForm);
	}

}

function type_changed()
{
	type_id = $('#ProductTypeId').val();
	$.ajax({
		url: 'http://localhost:8080/multiproveedores/attributeServices/attributes_for_type_id/' + type_id,
		type: 'GET',
		contentType: 'application/json',
		async: false,
		success : function(data) {	
			changeAttributesForm(JSON.parse(data));
		},
		error : function(a,b,data) {
			alert("Error =)\n");
		}			
	});
}

$(function(){
    $('form').submit(function(){
    	set_attribute_values();
    });
});