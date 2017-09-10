<?php
	session_start();
	
	// Check user permissions to ensure they are on the correct homepage
	if(( $_SESSION['FNad']) == null)
	{
		header( "Location: login.php" );
		exit;
	}
	
		if(( $_SESSION['FNad']) == "1")
		{
		header( "Location: index-1.php" );
		exit;
	}
	
	if(( $_SESSION['FNad']) == "2"){
		header( "Location: index-ad-2.php" );
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Chat with other Everthing Backpacker members about their job vacancies, Accomodation and/ or Transport.">
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
	  	    <p class="WelcomMsg" >Welcome: <?php echo  (isset($_SESSION["FN"]) ? $_SESSION["FN"] : null); ?> <i class="fa fa-facebook-square fa-2x " aria-hidden="true"> <i class="fa fa-twitter-square" aria-hidden="true"></i>
</i></p>
          
           <nav class="navbar white navbar-default">
	 
              <div class="container-fluid">
                <div class="logo"><a href="index-ad-4.php" title="Home"><img src="images/logo.png" alt="Home" /></a><span>Everything Backpacker</span></div> 

                  <div class="navbar-header">
	                  <!-- the following div is for responsie nav menu on devices other than desktop-->
	                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span>
					<span class="icon-bar top-bar"></span>
					<span class="icon-bar middle-bar"></span>
					<span class="icon-bar bottom-bar"></span>
					</button>
				  </div><!--close the navbar-header div-->
	
	                <div id="navbar-1" class="navbar-collapse collapse mainnav">
                       <ul class="nav navbar-nav navbar-right">
	                     <li><a class="scroller"  href="index-1.php" title="Home">Home</a></li>
                         <li><a href="#" class="DeleteSess" title="Messages">Messages</a></li>
                         <li><a href="account.php" title="Account">Account</a></li>
                         <li><a href="contact.php" title="Contact">Contact</a></li>
                         <li class="logout"><a href="api/logout.php" title="Logout"><span class="glyphicon glyphicon-log-out "></span> Logout</a></li>
                      </ul>
				  </div><!--close navbar-1 div -->
               </div><!-- close the container-fluid div -->
          </nav> 
	   </div><!-- close the container class-->

      <!-- Page Content -->
      <div class="container" >
	       <div class="col-lg-14">
	           <h2 class="section-header">Chats</h2>
            </div><!-- close the col-lg-14 class-->
            
             <div class="list-group-item ChatBox">    
	           <div id="Convos">
		      </div><!-- close the Convos div-->
	    
		      <div id="chatwrapper">
			     <p> <a id='dowloadfile' href='#' download><i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i>
 download conversation</a>
			      <a href='#' class='DeleteCon'><i class="fa fa-trash" aria-hidden="true"></i> Delete conversation</a></p>
		         <div id="chatbox">
                </div><!-- close the chatbox div-->
     
                <form name="message" action="" id="Chatform">
                   <input name="usermsg" type="text" id="usermsg" size="63" />
                   <input name="submitmsg" type="submit" class="btn btn-primary"  id="submitmsg" value="Send" />
               </form>
            </div><!-- close the chatwrapper div-->

     </div><!-- close the container class -->
	 
    
    </div><!-- close the container class -->


    <?php  require "footer.php"; ?>
 
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/Chat.js"></script>     
  <script src="js/members.js"></script>
</body>
</html>
