$('document').ready(function()
{

	$('#submitAdd').click(function(e)
	{
		e.preventDefault();
		var Title=$('#Title').val();
		var Desc=$('#Desc').val();
		var Employer=$('#Employer').val();
		var Location=$('#Location').val();
		var State=$('#State').val();
		var Visa=$('#Visa').val();
		var Pay=$('#Pay').val();

			$.ajax({
			
				type: "POST",
				url: "api/newAdd.php",
				data:{Title:Title, Desc:Desc, Employer:Employer, Location:Location, State:State, Visa:Visa, Pay,Pay},
				success: function(data)
				{
				
				   var status = $.parseJSON(data);
			
				   if(status == "true")
				   {
				
				     $("#submitAdd").val("Advert has been added, please refresh page.");
				     setInterval(function(){   $("#submitAdd").val("Add"); }, 3000);
				     $('#New-Job-Form')[0].reset();
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
	
		     });//close ajax call
		 
		    
		    	
		});//close #submitAdd click function

		
/*------------code for Transport adding new advertisement--------------*/

$('#submitAdd1').click(function(e)
{
		

	 e.preventDefault();
     var form = $('form').get(1); 
		
		$.ajax({
			type: "POST",
			url: "api/newAdd-trans.php",
				data:new FormData(form), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,

				success: function(data)
				{

				  var status = $.parseJSON(data);
				 
				    if(status == "true")
				    {
				      $("#submitAdd1").val("Advert has been added, please refresh page.");
				      setInterval(function(){   $("#submitAdd1").val("Add"); }, 3000);
					  $('#New-Trans-Form')[0].reset();
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
	
		    });//close ajax call
		    	
		});//close #submitAdd1 click function

		

/*-------------------code for Accomodation adding new advertisement---------------------------*/

$('#submitAdd2').click(function(e){
		

	 e.preventDefault();
	 var form = $('form').get(2); 
		
		$.ajax({
		    type: "POST",
		    url: "api/newAdd-Accom.php",
			data:new FormData(form), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,
            success: function(data)
		    {
			    var status = $.parseJSON(data);
				
				if(status == "true")
				{
				  $("#submitAdd2").val("Advert has been added, please refresh page.");
				  setInterval(function(){   $("#submitAdd2").val("Add"); }, 3000);
			      $('#New-Accom-Form')[0].reset();
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
	
		 });//close ajax call
		 
	});//close #submitAdd2 click function


});	//close document ready function	