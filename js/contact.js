$('document').ready(function()
		{
	
			/*the following code is for the update form, allowing user to update their weight*/
			
			$('#User-contactForm').submit(function(event)
			{
			 
			    event.preventDefault();
				var formData = new FormData($(this)[0]);
			
                 $.ajax({
					type: "POST",
					url: "api/contact.php",
					data: formData,
					async: false,
					 beforeSend: function(){
                      $('body').append("<i class='fa fa-spinner loading' aria-hidden='true'></i>");
                       },
                       complete: function(){
                      $('.loading').hide();
                      },
					success: function(data)
					{
			          var newdata =$.parseJSON(data);
					
					  if(newdata == "Success")
					  {	
						
					     $("#submitMsg").val("Success");
					     $("#submitMsg").css({"background-color":"#FFA500"}); 
					      
				            
				          setInterval(function()
				           {   
					         $("#submitMsg").val("Send"); 
					         $("#submitMsg").css({"background-color":"","color":""});   
					         
				           }, 3000);
				               
					        $('#User-contactForm')[0].reset();
					        $(".error").empty();
					   }
						
					 else
					 {
					   $(".error").empty();
				       var i=0;
			
				       for(i=0; i < newdata.length; i++)
				       {
			              $(".error").append("<p>"+ newdata[i] +"</p>");
					   }
					  }
				     },
				
			         cache: false,
				     contentType: false,
				     processData: false			
		        });//close the ajax call
			});//close the #User-contactForm submit function
		return false;
	});//close the document ready function	