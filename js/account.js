$('document').ready(function ()
{ 	
	$(".list-group").show();
	
     $(document).on('change','.update',function()
     {
      
        var ID=$(this).prop('id');
        var data=$(this).val();
        var Colname=$(this).prop('name');
        var inputclicked=$(this);
        var url="";
    
        if ($(this).closest('tr').attr("value") == "Jobs")
        {
	       url="api/editJobAd.php";
        }
    
        if ($(this).closest('tr').attr("value") == "Transport")
        {
	       url="api/editTransportAd.php";
        }
    
        if ($(this).closest('tr').attr("value") == "Accom")
        {
	       url="api/editAccomAd.php";
        }
   
      
         $.ajax({
	         type:"POST",
	         url:url,
	         data:{data:data, Colname:Colname, ID:ID},
	         success: function(data)
	         {
		         
		         var result =JSON.parse(data)[0];
				                            
				     if(result == true)
				     {
					    inputclicked.closest("td").next().html("Updated");
					    
					    setTimeout(function()
                        {
                           inputclicked.closest("td").next().html("");
                        },2000);
					 }
					                         
					 else
					 {
						alert("nope");
					 }
		      }
	     
	     });//close ajax call
     }); //close document on.change function
 
 
 
    $("#changePass").submit(function(event)
    {
				
		var formData = new FormData($(this)[0]);
			         
		  $.ajax({
			
		    type: "POST",
			url: "api/changePass.php",
			data: formData,
			async: false,
			success: function(data)
			{
				var result =JSON.parse(data)[0];
				                            
				if(result == true)
				{
					$(".updateBtn:first").val("Password updated");
				
                    setTimeout(function()
                     {
                        $(".updateBtn:first").val("Update");
                          
                     },2000);
				}
				                            
				else
				{
					    
                   $(".updateBtn:first").val("update Failed");

                      setTimeout(function()
                      {
                        $(".updateBtn:first").val("Update");
                          
                      },2000);
				}
			},
				
		    cache: false,
		    contentType: false,
		    processData: false
		 });//close ajax call
			
		return false;
	});//close #changePass submit function
	
	
	$("#changeNo").submit(function(event)
    {
		//var inputclicked=$(this);		
			       
		var formData = new FormData($(this)[0]);
			    
        $.ajax({
			
			type: "POST",
			url: "api/changeNo.php",
			data: formData,
			async: false,
			success: function(data)
			{
			   var result =JSON.parse(data)[0];
			  
			   if(result == true)
			   {
			  
				  $(".updateBtn:last").val("Number updated");   
                
                  setTimeout(function()
                  {

                     $(".updateBtn:last").val("Update");
                          
                   },2000);
			   }
				                            
				else
				{
				
				   $(".updateBtn:last").val("update Failed");

                    setTimeout(function()
                    {

                      $(".updateBtn:last").val("Update");
                          
                    },2000);
				}
			},
				
		    cache: false,
			contentType: false,
			processData: false
					
		});//close the ajax call
			
		return false;
	});//close #changeNo submit function
 
 
 });//close the document ready function