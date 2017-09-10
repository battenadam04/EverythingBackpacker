$('document').ready(function ()
{
	  	
	function createCookie(name,value,days) 
    {
        var expires = "";
        if (days)
        {
           var date = new Date();
           date.setTime(date.getTime() + (days*24*60*60*1000));
           expires = "; expires=" + date.toUTCString();
         }
           document.cookie = name + "=" + value + expires ;//+ "; path=/"
    }


    function eraseCookie(name)
    {
      createCookie(name,"",-1);
    }
        
        
    //when link clicked for comments.php we need to delete the recip-email session cookie to ensure a new file isnt created
    $(document).on("click",".DeleteSess",function(e)
    {
       eraseCookie("RecipEmail");
   
       $.ajax({
			type: "POST",
			url: "api/deleteSession.php",
			dataType:"JSON",
            success: function(data)
            {
	                                      
	           if (data === true)
	           {
		          window.location.href = "comments.php";
	           }
	                                      
	           else
	           {
		          alert("something went wrong");
	           }
	                                    
	        }  
	     });//close ajax call
     });//close document on click function
              
              
    $(document).on("click",".DeleteCon",function(e){
		  	 
		  	 e.preventDefault();
             var data=$(this).attr('id');
            
              $.ajax({
			      type: "POST",
				  url: "api/DeleteConvo.php",
				  data:{data:data},
                  success: function(data)
                  {
	                                      
	                     $.ajax({
				              type: "POST",
				              url: "api/deleteSession.php",
				              dataType:"JSON",
                              success: function(data)
                              {
	                          }  
	                       });//close ajax call

	                  if (data === "true")
	                  {
		                 $("#chatwrapper").hide();
		                 document.getElementById("Convos").innerHTML = "";
		                 //$(".DeleteCon").remove();
		                 ShowConvos();// refresh the conversations for the user after deleting a single conversation                          
	                   }
	                                                               
	                  else
	                 {
		                alert("something went wrong");
	                 }
	            }                         
	        });//close ajax call
     });//close document on click function
                
               
	  $(document).on("click",".ChatService",function(e)
	  {
             var data= $(this);
             var Email = $(this).parent().prev().text();
             var Fname= $(this).next().html();
             var btn= data;
             btn.siblings().eq(1).empty();
             var perm = data.prop("id");

             $.ajax({
			     type: "POST",
				 url: "api/Chat.php",
				 dataType:'Json',
				 data: {perm:perm,Email:Email,Fname:Fname},
                 success: function(data)
                 {
	                 createCookie('RecipEmail',data.email+"-"+Email+"-log.txt",7);
	                 createCookie('Newconvo',Email,7);
	                 createCookie('Name',Fname,7);
	                 
	                 if(data.no == 1)
	                 {
		                btn.siblings().eq(1).append("<p>Error, something went wrong.</p>");
	                 }
	                                    
	                if(data.no == 2)
	                {
		                btn.siblings().eq(1).append("<button>upgrade for online chat service</button>");
	                }
	                                    
	                if(data.no == 3)
	                {
		                btn.siblings().eq(1).append("<p><a href='comments.php'>contact through exclusive online chat</a></p>");   
	                }
	                                    
	                if(data.no == 4)
	                {
		                btn.siblings().eq(1).append("<p>Sorry online chat is not available with this advertiser</p>");
	                }
	                
	                if(data.no == 5)
	                {
		                btn.siblings().eq(1).append("<p>Sorry but you cant have a conversation with yourself</p>");
	                }
				                        
	            }
		    });//close ajax call
	        return false;
	  	});//close document on click function
  	
  	 $("#mainContent .list-group").hide();
  	 var jobsclicks = 0;
  	 var transclicks = 0;
  	 var accomclicks = 0;
  	
  	 $(".showMore:eq(0)").click(function(e)
  	 {
  	    e.preventDefault();
  	    transclicks = 0;
  	    accomclicks = 0;
  	    
  	    if(jobsclicks == 0)
  	    {
  	      jobsclicks++;
  	      $(".list-group-1").hide();
  	      $(".header-hide").hide();
  	     
  	      $("#mainContent").attr("ng-controller","FilesCtrl");
  	      $("#mainContent .list-group:eq(0)").show();
  	      $("#mainContent .list-group:eq(1)").hide();
  	      $("#mainContent .list-group:eq(2)").hide();
  	
  	      document.getElementsByClassName("showMore")[0].innerHTML = "Show less";
  	      document.getElementsByClassName("showMore")[1].innerHTML = "Show more";
  	      document.getElementsByClassName("showMore")[2].innerHTML = "Show more";
  	       
        }
  
        else
        {
          
         jobsclicks--;
         $(".list-group-1").show();
         $(".header-hide").show();
  	     $("#mainContent .list-group").hide();
  	     document.getElementsByClassName("showMore")[0].innerHTML = "Show more";
  	    }
  
  	});//close .showMore:eq(0) click function
  	
  	
  	$(".showMore:eq(1)").click(function(e)
  	{
  	    e.preventDefault();
  	    jobsclicks = 0;
  	    accomclicks = 0;
  	    
  	   if(transclicks == 0)
  	   {    
  	       transclicks++;
  	       $(".list-group-1").hide();
  	       $(".header-hide").hide();
  	       $("#mainContent").attr("ng-controller","TransCtrl");
  	       $("#mainContent .list-group:eq(1)").show();
  	       $("#mainContent .list-group:eq(0)").hide();
  	       $("#mainContent .list-group:eq(2)").hide();
  	       document.getElementsByClassName("showMore")[0].innerHTML = "Show more";
  	       document.getElementsByClassName("showMore")[1].innerHTML = "Show less";
  	       document.getElementsByClassName("showMore")[2].innerHTML = "Show more";	
  	   }  
  	         
  	   else
       {
           transclicks--;
           $(".list-group-1").show();
           $(".header-hide").show();
  	       $("#mainContent .list-group").hide();
  	       document.getElementsByClassName("showMore")[1].innerHTML = "Show more";
       }
  	
  	
  	});//close  showMore:eq(1) click function
  	
    $(".showMore:eq(2)").click(function(e)
  	{
  	    e.preventDefault();
  	    jobsclicks = 0;
  	    transclicks = 0;
  	    
  	      if(accomclicks == 0)
  	      {
  	        accomclicks++;
            $(".list-group-1").hide();
            $(".header-hide").hide();
  	        $("#mainContent").attr("ng-controller","AccomCtrl");
  	        $("#mainContent .list-group:eq(2)").show();
  	        $("#mainContent .list-group:eq(0)").hide();
  	        $("#mainContent .list-group:eq(1)").hide();
  	         document.getElementsByClassName("showMore")[0].innerHTML = "Show more";
  	         document.getElementsByClassName("showMore")[2].innerHTML = "Show less";
  	         document.getElementsByClassName("showMore")[1].innerHTML = "Show more";  
  	      }
  	  
  	    else
        {
          accomclicks--;
          $(".list-group-1").show();
          $(".header-hide").show();
  	      $("#mainContent .list-group").hide();
  	      document.getElementsByClassName("showMore")[2].innerHTML = "Show more";
  	    }
    });//close .showMore:eq(2) click function
  	
});// close the document ready function