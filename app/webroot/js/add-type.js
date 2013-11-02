$(document).ready(function()
{
	attributes = new Array();
});

function add_attribute()
{
	attribute_name = $('#attribute_name').val();
	attribute_type = $('#attribute_type').val();

	row = $('<tr>');

	row.append($('<td>').html(attribute_name));
	row.append($('<td>').html(attribute_type));

	$('#attributes_table').append(row);

	attribute = new Object();
	attribute.name = attribute_name;
	attribute.type_id = attribute_type;

	attributes.push(attribute);
	$('#attributes').val(JSON.stringify(attributes));
}