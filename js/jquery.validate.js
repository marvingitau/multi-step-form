// validate form on keyup and submit
var v = jQuery("#msform").validate({
    ignore: ".ignore",	
    rules: {
        firstname: "required",
        lastname: "required",
        'gender': {
        required: true
        },
        address: "required",
        mobilenumber: "required",
        email: "required",
        postalcode: "required",
        cityname: "required"
    },
    submitHandler: function(form) 
    { 
            var formData = new FormData(form);
            //e.preventDefault();
                $("#loadingmessage").show();
                    $.ajax({
                    url: "formsubmitajax.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data)
                    {
                        if(data == 'success')
                        {
                            $("#loadingmessage").hide();
                            $("#sucessmsg").show();
                        }
                        if(data == 'error')
                        {
                            $("#loadingmessage").hide();
                            $("#errormsg").show();
                        }
                    
                    },
                    error: function(){} 	        
                    
                    });		
            
            //return false;  //This doesn't prevent the form from submitting.
    },
    highlight: function(element, errorClass) {
        
        window.scrollTo(0, 0);
    
    },
    unhighlight: function(element, errorClass) {
    //$(element).closest(".form-group").removeClass("has-error");
    },
});

