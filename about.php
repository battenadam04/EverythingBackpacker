<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Get in touch with us if you have any issues with your account or simply want to ask us a question.">
    <meta name="author" content="Adam Batten">
    <meta name="keywords" content="Backpacker,Backpackers, Australia, Travel, Travelling, Jobs, Transport, Acomodation, Everything Backpacker, backpackr,oz travel, oz, adventure">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <title>Just 4 Backpackers</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/custom.css" rel="stylesheet">
   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>

<body ng-app="data2App">

  	    <div class="container">
	  	    
	  	    <?php if(empty(($_SESSION["FNad"])))
		  	  { require "log-nav.php";}
		  	  else
		  	  { 
	  	        	  $name=(isset($_SESSION["FN"]) ? $_SESSION["FN"] : null); 
	  	       echo'<p class="WelcomMsg" >Welcome: '.$name.'  <i class="fa fa-facebook-square fa-2x " aria-hidden="true"> <i class="fa fa-twitter-square" aria-hidden="true"></i>
</i></p>

            <nav class="navbar white navbar-default ">
	 
               <div class="container-fluid">
                  <div class="logo"><a href="index-ad-4.php" title="Home"><img src="images/logo.png" alt="Home" /></a><span>Everything Backpacker</span></div> 

                  <div class="navbar-header">
	              <!-- the following div is for responsie nav menu on devices other than desktop-->    
	              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span>
								<span class="icon-bar top-bar"></span>
								<span class="icon-bar middle-bar"></span>
								<span class="icon-bar bottom-bar"></span>
							</button>
						</div><!-- close navbar-header div-->
	                  <div id="navbar-1" class="navbar-collapse collapse mainnav">
                         <ul class="nav navbar-nav navbar-right">
	    
                        <li><a class="scroller"  href="index-1.php" >Home</a></li>';
                         
	     
       	                  if(( $_SESSION["FNad"]) == "1" || ($_SESSION["FNad"]) == "2")
       	                  {
		      	
		      	            $error="you dont qualify";
		      	            echo ' <li><a href="account.php">Account</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li class="logout"><a href="api/logout.php"><span class="glyphicon glyphicon-log-out "></span> Logout</a></li>
                        </ul>
				   </div><!-- close navbar-1 div-->
             </div><!-- close container-fluid div-->
         </nav> ';
		      	          } 
		      	          
		      	          else 
		      	          {
			      	        echo '<li><a href="#" class="DeleteSess">Messages</a></li> <li><a href="account.php">Account</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li class="logout"><a href="api/logout.php"><span class="glyphicon glyphicon-log-out "></span> Logout</a></li>
                        </ul>
				   </div><!-- close navbar-1 div-->
             </div><!-- close container-fluid div-->
         </nav> ';
			      	      }
		      	         
                       
         }?>
	  </div><!-- close container class-->

   <!-- Page Content -->
    <div class="container" >
	    
	    
         <h2 class="section-header">&#45;Our Mission&#45;</h2>
         
           <div class="list-group-item about">    
	           <blockquote>We aim to provide every Backpacker in Australia with the ability to see Australian advertisers that can help them continue their travels and to ensure they are able to communicate effectively with them through us.</blockquote>
	        
          </div><!-- close the list-group-item div -->	 
          
	     <h2 class="section-header">About us</h2>
	     
           <div class="list-group-item about">    
	           
	           <p>This is a very young company, beginning in mid 2017. The idea for this application comes from someone who was once a Backpacker themselves. Adam Batten spent a year travelling all over Australia and experiencing everything from their culture to their working environments and more. He understand that there was a need for something that would provide better accessible information to those travelling this land. On his travels 3 of the main essentials that he came across was Transport, Accomodation and Jobs. Without these 3 he found it difficult to get the full experience of his travels.</p>
	           <br/>
	           <p>This idea was born when Adam was in Brisbane and since then it has grown into what you know use to search for and communicate with other people around Australia. Many other websites provide one of the 3 areas that we cover but we thought it would be much more simple to have them in one location.</p>
	              
      </div><!-- close the list-group-item div -->
    </div><!-- close the container class-->
</div>    <!-- close the container class-->


 <?php  require "footer.php"; ?>

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>  
  <script src="js/custom.js"></script>   
  <script src="js/members.js"></script>
  <script src="js/contact.js"></script>
  <script src="js/login.js"></script>

</body>
</html>