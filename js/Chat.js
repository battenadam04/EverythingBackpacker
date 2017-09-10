 
  function ShowConvos()
  {
	  
     //$("footer").css("margin-top","-15vh");// keep footer at bottom when the content has not been loaded yet
     
     $.ajax({
			
		type: "POST",
		url: "api/AllConvos.php",
		dataType:'JSON',
		cache: false, 
		success: function(data)
        {
	      var i=0;
	      
	      for(i=0; i < Object.keys(data).length / 3; i++)
		  { 
			var f=1;
			var newi= i + f;
			var key="file" + i ;  
		    var key1="file"+newi;
			var Emailnew="Email" + i ;
			var Namekey="Name" + i;  
			var Namekey1="Name" + newi; 
			
			var newlink="";
			
					                           
			if(data.NOFILE != "NOFILE")
	        {
		         newlink = data[key].replace("../convos/", "convos/");
				//add link to the ID value and name to the element value
	            $("#Convos").append("<div class='chats' id='"+data[key]+"'><i class='fa fa-user fa-4x usericon' aria-hidden='true'></i> <a href='#' title='' class='convolist' >"+ data[Namekey] +"</a></div>");
	                  
	                  
	               
	              $(".DeleteCon").prop("id",data[key]);
	              $("#dowloadfile").prop("href",newlink);
	              //$("#chatwrapper").prepend("<i class='a fa-times fa-2x ' aria-hidden='true' ></i><a href='#' id='"+data[key]+"' class='DeleteCon'>Delete conversation</a>");
	                                 
	             //$("#chatwrapper").prepend("<a id='dowloadfile' href='"+newlink+"' download>download conversation</a>");
	                                                           
	                                  
	        }
	                                           
	         if(data.NOFILE === "NOFILE")
	         {
		         $("#Convos").append("<div class='chats'><i class='fa fa-frown-o fa-5x' aria-hidden='true'></i><p>Sorry you have no one to talk to yet</p></div>");
		                                          
		                                          
		                                           
	         }
	                                      
	                                         
	      }//close for loop
	                                         
	                                          
	   }//close success function
	                                   
	 });//close ajax call
	         
  } //close ShowConvos function
 
 
  $('document').ready(function ()
  { 	
	 
     var link="";
 
     function readCookie(name)
     {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
                      
        for(var i=0;i < ca.length;i++) 
        {
            var c = ca[i];
                           
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
                        }
                      return null;
        }
                
                 var RecipEmail=readCookie('RecipEmail');
                 var name=readCookie('Name');
                 var newconvo=readCookie('Newconvo');
  
  
	             //Load the file containing the chat log
	
	            function loadLog()
	            {		
		 
                   var newVal = link.substring(3, link.length);
	               var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20; //Scroll height before the request
		
		           $.ajax({
			          url: newVal,
			          cache: false,
			          success: function(html)
			          {		
				          $("#chatbox").html(html); //Insert chat log into the #chatbox div	
				
				          //Auto-scroll			
				          var newscrollHeight = $("#chatbox").attr("scrollHeight"); //Scroll height after the request
				          $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
                      },
		           });//close the ajax call
	            }//close the loadLog function
		
 
	    //If user submits the form
	      
	    $("#submitmsg").click(function()
	    {	
		
	       var clientmsg = $("#usermsg").val();
		
		   $.ajax({
			   type: "POST",
			   url: "api/post.php",
			   cache: false,
			   data:{text:clientmsg,link:link},
			   success: function(html)
			   {			
			        $("#usermsg").val("");
					setInterval (loadLog, 1500);				
		  	   }
		   });
		return false;
	    });// close #submitmsg click function
 

  	$("#chatwrapper").hide();

	      
	 ShowConvos();
	         
	$(document).on("click",".chats", function(e)
	{
		e.preventDefault();
		link=$(this).attr('id');
			     
		$.ajax({
		    type: "POST",
			 url: "api/showChat.php",
			 dataType:'Json',
			 data:{link:link},
			 success: function(data)
             {
	            $("#chatbox").empty();
	            $("#chatwrapper").show();
	            $("#chatbox").append(data);
	                                      
	            var newlink = link.replace("../convos/", "convos/");
	            $("#dowloadfile").prop("href",newlink);
	           // $("#chatwrapper").append("<a id='dowloadfile' href='"+newlink+"' download>download conversation</a>");                         
	                        
	          }
	                                   
	      });//close the ajax call
		         
	  });//close document on click function
	           
	         
});// close document ready function
  	