$("document").ready(function ()
{
  	
  	
  	$(".Payment").hide();
  	

  	$(".freeSub").click(function()
  	{
  	$(".Payment").hide();
  	
  	});
  	
  	$(".Paidsub").click(function()
  	{
  	$(".Payment").show();
  	
  	});
  	


  	
  	// Create a token when the form is submitted.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(e) 
{
     e.preventDefault();
  
    
  
         var Fname=$("#inputFname").val();
		 var Sname=$("#inputSname").val();
		 var Email=$("#inputEmail").val();
		 var Phone=$("#inputPhone").val();
		 var Password=$("#inputPassword").val();

       
       Term= $("input[name='Term']:checked").val();
       var TandC= $("input[name='TandC']:checked").val();
       
       
       if (!(document.getElementById("TandC").checked) || Term === undefined)
       
       {
	         $(".commErrors").empty();
	       $(".commErrors").append("<h4>Make sure all fields are filled in.</h4>");
	       //  form.find(".submit").prop("disabled", false);
       }
       
       else{
	       
	       $(".commErrors").empty();
	  
        
           if (Term === "6" || Term === "12")
            {
                createToken();
            }
            
            if(Term === "3")
                       {

	                     $(".commErrors").empty();
             
                                  $.ajax({
			
				                      type: "POST",
				                      url: "api/sign-up.php",
				                      data: { Fname:Fname , Sname:Sname, Email:Email, Phone:Phone, Password:Password, Term:Term},
                                      success: function(data)
                                      {
		
				                           var status = $.parseJSON(data);
				 
				                           if(status == "true")
				                           {
				                            
				                            
				                            window.location.reload("login.php");
				                             
				 
				                           }
				 
				 		                   else
					                       {
						                       
						                      
					                         $(".commErrors").empty();
				 
				                             var i=0;
			
				                             for(i=0; i < status.length; i++)
				                             {
				                                $(".commErrors").show();
				                                $(".commErrors").append("<h4>"+ status[i] +"</h4>");
					                         }
					                        }

				                       }
	
		                           });
				 
                       }

            
                }
 
});

  
    function stripeTokenHandler(token) 
    {
       // Grab the form:
       var form = document.getElementById('payment-form');
       var hiddenInput = document.createElement('input');
       hiddenInput.setAttribute('type', 'hidden');
       hiddenInput.setAttribute('name', 'stripeToken');
       hiddenInput.setAttribute('value', token.id);
       form.appendChild(hiddenInput);
       
        var Fname=$("#inputFname").val();
		 var Sname=$("#inputSname").val();
		 var Email=$("#inputEmail").val();
		 var Phone=$("#inputPhone").val();
		 var Password=$("#inputPassword").val();
		 Term= $("input[name='Term']:checked").val();
      
  
  	                      $(".commErrors").empty();
                        
			
			            $.ajax({
			
				           type: "POST",
				           url: "api/sign-up.php",
				           data: { Fname:Fname , Sname:Sname, Email:Email, Phone:Phone, Password:Password, Term:Term},
                           success: function(data)
                           {
		
				                var status = $.parseJSON(data);
				 
				                if(status == "true")
				                { 
					              form.submit(ChargeCustAd());  
					             //ChargeCustAd();
				                }
					
					            else
					            {
					              $(".commErrors").empty();
				 
				                  var i=0;
			
				                   for(i=0; i < status.length; i++)
				                   {
				                      $(".commErrors").show();
				                      $(".commErrors").append("<h4>"+ status[i] +"</h4>");
					               }
					
					            }
				            }
		                });
                    
                    
           
  
    }
    
    function createToken() {
  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server
      stripeTokenHandler(result.token);
    }
  });
}


function ChargeCustAd()
       {  

	     var Term= $("input[name='Term']:checked").val();
	     var Email=$("#inputEmail1").val();
	      var stripeToken=$("input[name='stripeToken']").val();
	     
 
           $.ajax({
			
				type: "POST",
				url: "api/charge.php",
				data: {Term:Term, Email:Email,stripeToken:stripeToken},
				success: function(data)
				{
					 var status = $.parseJSON(data);
				 	
				
				 alert(status);

				}
		   });
       }//close the ChargeCustAd




  
 
  /*------------------------------Sign up form for advertisers---------------------------------------------------*/


  
    
    // Create a token when the form is submitted.
    var form1 = document.getElementById('payment-form-ad');
    form1.addEventListener('submit', function(e) 
{
     e.preventDefault();
  

  
                       var Fname=$("#inputFname1").val();
		              var Sname=$("#inputSname1").val();
		              var Email=$("#inputEmail1").val();
		              var Bname=$("#inputBname1").val();
		              var Phone=$("#inputPhone1").val();
		              var Password=$("#inputPassword1").val();
				      var Term= $("input[name='Term-ad']:checked").val();

                      var TandC= $("input[name='TandC-ad']:checked").val();
       
       
       if (!TandC || Term === undefined)
       
       {
	         $(".commErrors").empty();
	        $(".commErrors").append("<h4>Make sure all fields are filled in.</h4>");
	       //  form.find(".submit").prop("disabled", false);
       }
       
       else{
	       
	       $(".commErrors").empty();
	  
        
           if (Term === "6" || Term === "12")
            {
                createToken1();
            }
            
            if(Term === "3")
                       {

	                     $(".commErrors").empty();
             
                                  $.ajax({
			
				                      type: "POST",
				                      url: "api/sign-up-ad.php",
				                      data: { Fname:Fname , Sname:Sname, Email:Email,Bname:Bname, Phone:Phone, Password:Password, Term:Term},
                                      success: function(data)
                                      {
		
				                           var status = $.parseJSON(data);
				 
				                           if(status == "true")
				                           {
				                            
				                            
				                            window.location.reload("login.php");
				                             
				 
				                           }
				 
				 		                   else
					                       {
						                       
						                      
					                         $(".commErrors").empty();
				 
				                             var i=0;
			
				                             for(i=0; i < status.length; i++)
				                             {
				                                $(".commErrors").show();
				                                $(".commErrors").append("<h4>"+ status[i] +"</h4>");
					                         }
					                        }

				                       }
	
		                           });
				 
                       }

            
                }
 
});

  
    function stripeTokenHandler1(token) 
    {
       // Grab the form:
       var form = document.getElementById('payment-form-ad');
       var hiddenInput = document.createElement('input');
       hiddenInput.setAttribute('type', 'hidden');
       hiddenInput.setAttribute('name', 'stripeToken1');
       hiddenInput.setAttribute('value', token.id);
       form.appendChild(hiddenInput);
       
                       var Fname=$("#inputFname1").val();
		              var Sname=$("#inputSname1").val();
		              var Email=$("#inputEmail1").val();
		              var Bname=$("#inputBname1").val();
		              var Phone=$("#inputPhone1").val();
		              var Password=$("#inputPassword1").val();
                       var Term= $("input[name='Term-ad']:checked").val();
  
  	                      $(".commErrors").empty();
                        
			
			            $.ajax({
			
				           type: "POST",
				           url: "api/sign-up-ad.php",
				           data: { Fname:Fname , Sname:Sname, Email:Email,Bname:Bname, Phone:Phone, Password:Password, Term:Term},
                           success: function(data)
                           {
		
				                var status = $.parseJSON(data);
				 
				                if(status == "true")
				                { 
					              form.submit(ChargeCustAd1());  
					             //ChargeCustAd();
				                }
					
					            else
					            {
					              $(".commErrors").empty();
				 
				                  var i=0;
			
				                   for(i=0; i < status.length; i++)
				                   {
				                      $(".commErrors").show();
				                      $(".commErrors").append("<h4>"+ status[i] +"</h4>");
					               }
					
					            }
				            }
		                });
                    
                    
           
  
    }
    
    function createToken1() {
  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error
      var errorElement = document.getElementById('card-errors-ad');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server
      stripeTokenHandler1(result.token);
    }
  });
}

function ChargeCustAd1()
       {  

	    var Term= $("input[name='Term-ad']:checked").val();
	     var Email=$("#inputEmail1").val();
	      var stripeToken=$("input[name='stripeToken1']").val();
	     
 
           $.ajax({
			
				type: "POST",
				url: "api/charge.php",
				data: {Term:Term, Email:Email,stripeToken:stripeToken},
				success: function(data)
				{
					 var status = $.parseJSON(data);
				 	
				
				 alert(status);

				}
		   });
       }//close the ChargeCustAd

			
});// close the document.ready function

		