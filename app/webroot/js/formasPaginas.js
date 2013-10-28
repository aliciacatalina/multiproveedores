function ConvertFormToJSON(form){
    var array = jQuery(form).serializeArray();
    var json = {};
    
    jQuery.each(array, function() {
        json[this.name] = this.value || '';
    });
    
    return json;
}

$( "button[type='submit']" ).click(function( event ) {		
	    // AJAX post
	    var form = $("#forma");
	    var formAsJson = ConvertFormToJSON(form);
	    alert(JSON.stringify(formAsJson));
	    $.ajax({
			url: 'http://localhost:8888/multiproveedores/requestServices/newOnlineRequest',
			type: 'POST',
			contentType: 'application/json',
			data: JSON.stringify(formAsJson),
			success : function(data) {	
			  alert(data);
			},
			error : function(data) {
			  	alert("Error =)\n" + data);
			}			
		}); 
	}
);