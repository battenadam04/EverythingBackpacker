$("document").ready(function ()
{

	
	$("#logIn").submit(function(event)
	{
	
	    var formData = new FormData($(this)[0]);

		$.ajax({
			url:"api/login-ex.php",
			type: "POST",
			data: formData,
			async: false,
			success: function(data)
			{

			   var result =JSON.parse(data)[0];
					
               if(result == "Success")
			   {
				  window.location.replace("index-1.php");
			   }
					
			
			   else
			   {
				  $("#login-Ex").addClass('fail');
                  $("#login-Ex").html('Login Failed');
			      $("#logIn").attr('class','shake');

                      setTimeout(function()
                       {

                         $("#login-Ex").removeClass("fail");
                         $("#login-Ex").html("Go");
                         $("#logIn").removeClass("shake");
                        },2000);

			    }
			},
				
			cache: false,
			contentType: false,
			processData: false
			
		});//close the ajax call
			
		return false;
	});//close the #logIn submit function
});//close the document ready function