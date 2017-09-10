	$('document').ready(function ()
 {
	    
	    
  	    $("#SignUp-bp").hide();
  	    $("#SignUp-ad").hide();
  	    $("#Member").hide();
  	    $("#loginform").hide();
  	    $(".hiddendiv").hide();
  	    
  	    $(".Sign-up").click(function(e)
  	    {
	  	    e.preventDefault();
  	      	    
  	        $("#Member").toggle("slow");
  	        $("#loginform").hide();
  	        $("#SignUp-bp").hide();
            $("#SignUp-ad").hide();
            
  	    },
  	    
  	       function()
  	       {
	  	    
  	          $("#Member").toggle("slow");
  	          $("#loginform").hide();
  	          $("#SignUp-bp").hide();
              $("#SignUp-ad").hide();
              $("#testInfo").toggle("slow").css("display","none");
  	       
  	    });
  	    
  	    
  	    
        
  	    $(".login").click(function(e)
  	    {

          // $("#loginform").toggle("slow");
           $("#Member").hide();
           $("#SignUp-bp").hide();
           $("#SignUp-ad").hide();
            $("#testInfo").toggle("slow").css("display","none");
  	 
        },

          function(e)
          {
            $("#loginform").toggle("slow");
            $("#Member").hide();
            $("#SignUp-bp").hide();
            $("#SignUp-ad").hide();
           
  	        //div for test info log in
           $("#testInfo").toggle("slow").css("display","block");
       });
  	
  	    
  	   $(".logo").click(function(e)
  	   {
  	    window.location.href="index-1.php";
  	  });
  	    
  	  $("#PassForget").click(function(e)
  	  {
  	     $(".messagepop").fadeToggle().css("display","block");
  	     $(".hiddendiv").css("display","block");
  	     $(".hiddendiv").show();
  	     $("#testInfo").toggle("slow").css("display","none");
  	 });
  	     
  	     
  	  $("#forgot-pass").submit(function(e)
  	  {
  	    e.preventDefault();
  	    
  	   	var formData = new FormData($(this)[0]);
  	    
  	    $.ajax({
			type: "POST",
			url: "api/forget-pass.php",
            data: formData,
			async: false,
			success: function(data)
			{
			    var status = data;
		
		        if(status == '["Success"]' )
		        {
				 
				   alert("You will receive an email with your current password");
				   $(".messagepop").css("display","none");
				 
			    }//close if statement
				 
				else
				{
				   alert("Sorry we do not have this email address in our database");
				}
			
			},//close success function
			
			cache: false,
			contentType: false,
			processData: false	
			
		}); //close ajax
  	    
  	    return false;
  	  });//close #forgot-pass submit function
  	     
  	     
  	    
  	  $("#message_cancel").click(function(e)
  	   {
  	      $(".messagepop").css("display","none");
  	      $(".hiddendiv").css("display","none");
  	   });
  	     
  	   $(".hiddendiv").click(function(e)
  	    {
  	    
  	      $(".messagepop").css("display","none");
  	      $(".hiddendiv").css("display","none");
  	      $(".hiddendiv").hide();
  	   });
  	    
  	   $("#Member .btn-primary:eq(0)").click(function(e)
  	   {
  	     
  	      $("#Member").hide();
  	      $("#SignUp-bp").show();
  	      $('input[class=freeSub],input[class=Paidsub]').prop('checked',false);
  	      $(".Payment").hide();
  	       // Add an instance of the card UI component into the `card-element` <div>
  	       card.unmount('#card-element-ad');
           card.mount('#card-element');
  	   });
  	     
  	     
  	    $("#Member .btn-primary:eq(1)").click(function(e)
  	    {
  	     
  	      $("#Member").hide();
  	      $("#SignUp-ad").show();
  	      $('input[class=freeSub],input[class=Paidsub]').prop('checked',false);
  	      $(".Payment").hide();
  	      // Add an instance of the card UI component into the `card-element-ad` <div>
  	      card.unmount('#card-element');
  	      card.mount('#card-element-ad');
  	    });
 
 
  	/*---------------background of header js-------------------*/
  	
  	
  	$(window).on("scroll", function() 
  	{
       if($(this).scrollTop() > 0) 
       {
   
          $(".navbar").stop().animate({height: "16%"},'fast'); //or any other class
          $(".messagepop").css("top","18%");
       } 
    
    
       else
       {
  
         $(".navbar").stop().animate({height: "20%"},'fast');
         $(".messagepop").css("top","22%");
       }  
    
   });
   
     /*--------------stop default on all .list-group-item links---------------------- */
     
     
     $(".list-group-1").click(function(e)
     
     {
	     e.preventDefault();
	     
     });

});


/*------------following js is for the cookie law banner---------------------*/

// Creare's 'Implied Consent' EU Cookie Law Banner v:2.4
	// Conceived by Robert Kent, James Bavington & Tom Foyster
	
	var dropCookie = true; // false disables the Cookie, allowing you to style the banner
	var cookieDuration = 14; // Number of days before the cookie expires, and the banner reappears
	var cookieName = 'complianceCookie'; // Name of our cookie
	var cookieValue = 'on'; // Value of cookie
	
	function createDiv(){
	var bodytag = document.getElementsByTagName('body')[0];
	var div = document.createElement('div');
	div.setAttribute('id','cookie-law');
	div.innerHTML = '<p>Our website uses cookies. By continuing we assume your permission to deploy cookies, as detailed in this <a href="http://www.pwc.com.au/contact-us/cookies-info.html" rel="nofollow" title="Privacy &amp; Cookies Policy">privacy and cookies policy</a>. <a class="close-cookie-banner" href="#" onclick="removeMe();"><span>X</span></a></p>';
	// Be advised the Close Banner 'X' link requires jQuery
	
	// bodytag.appendChild(div); // Adds the Cookie Law Banner just before the closing </body> tag
	// or
	bodytag.insertBefore(div,bodytag.firstChild); // Adds the Cookie Law Banner just after the opening <body> tag
	
	document.getElementsByTagName('body')[0].className+=' cookiebanner'; //Adds a class tothe <body> tag when the banner is visible
	
	createCook(window.cookieName,window.cookieValue, window.cookieDuration); // Create the cookie
	}
	
	
	function createCook(name,value,days) 
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
	
	function checkCook(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
	var c = ca[i];
	while (c.charAt(0)==' ') c = c.substring(1,c.length);
	if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
	}
	
	function eraseCook(name) {
	createCookie(name,"",-1);
	}
	
	window.onload = function(){
	if(checkCook(window.cookieName) != window.cookieValue){
	createDiv();
	}
	}
	
	function removeMe(){
	var element = document.getElementById('cookie-law');
	element.parentNode.removeChild(element);
	}