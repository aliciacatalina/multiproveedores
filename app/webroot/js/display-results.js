/** Function to receive json query and display elements**/
function display_results(params) {
    for(index in queryresult)
    {
        result = queryresult[index];
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