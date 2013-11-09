// REQUESTS - VIEW

function type_changed1()
{
        fp_type_changed('1-atributos', '1-', '1-product_type_id');
}

function display_results(params) {
    for(index in params)
    {
        result = params[index];
        var result_att = document.createElement("p");
        jQuery.each(result.attributes[index], function(i, val) {
         result_att.innerHTML = result_att.innerHTML + ' ' +val; 
         });
         var result_div =  document.createElement("div");
         result_div.id="result" + index;
         result_div.className = "row striped";
         document.body.appendChild(result_div);
         var result_id = document.createElement("h4");
         result_id.innerHTML = result.id;
         document.getElementById("result" + index).appendChild(result_id);
         var result_manufacturer = document.createElement("h4");
         result_manufacturer.innerHTML = result.manufacturer_id;
         document.getElementById("result"+index).appendChild(result_manufacturer);
         document.getElementById("result"+index).appendChild(result_att);
    }
}

function search1()
{
        var search = new Array();
        var category = $('#1-category_id').val();
        var product_type = $('#1-product_type_id').val();
        var attributes = fp_construct_array_for_attribute_values('1-atributos');
        
        search[0] = category;
        search[1] = product_type;
        search[2] = attributes;

        alert(JSON.stringify(search));
        $.ajax({
                url: 'http://localhost:8080/multiproveedores/Products/products_search_by_attributes',
                type: 'POST',
                contentType: 'application/json',
                async: false,
                data: JSON.stringify(search),
                success : function(data) {
                    alert(data);
                    display_results(JSON.parse(data));
                },
                
                error : function(a,b,data)
                {
                        alert("Error =)\n");
                }                        
        });

}



function search2()
{
        var search = new Array();
        var category = $('#2-category_id').val();
        var product_type_id = $('#2-product_type_id').id;
        
        search[0] = category;
        search[1] = product_type_id;

        alert(JSON.stringify(search));
        $.ajax({
                url: 'http://localhost:8080/multiproveedores/Products/suppliers_search_by_product_type',
                type: 'POST',
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