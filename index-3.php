<?php
	session_start();
	
	// Check user permissions to ensure they are on the correct homepage
	if(!isset($_SESSION['FN']))
	{
		header( "Location: login.php" );
		exit;
	}
	
	if(( $_SESSION['FNad']) == "1")
	{
		header( "Location: index-1.php" );
		exit;
	}
	
	if(( $_SESSION['FNad']) == "2")
	{
		header( "Location: index-ad-2.php" );
		exit;
	}
	
	if(( $_SESSION['FNad']) == "4")
	{
		header( "Location: index-ad-4.php" );
		exit;
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Welcome to Everything Backpacker, the place to find the essentials while backpacking around Australia. You can find Accomodation, Transport and even Job positions in your area.">
    <meta name="author" content="Adam Batten">
    <meta name="keywords" content="Backpacker,Backpackers, Australia, Travel, Travelling, Jobs, Transport, Acomodation, Everything Backpacker, backpackr,oz travel, oz, adventure">

    <title>Just 4 Backpackers</title>
    <!--[if IE 7]>    <html class=" lt-ie9 lt-ie8" lang="en"> <![endif]-->
    <!--[if IE 8]>    <html class=" lt-ie9" lang="en"> <![endif]-->

     <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/custom.css" rel="stylesheet">
  
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>

<body>

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
					  </div><!-- close the navbar-header div-->
					  
	                   <div id="navbar-1" class="navbar-collapse collapse mainnav">
                           <ul class="nav navbar-nav navbar-right">
	                           <li><a class="scroller" title="Home" href="index-1.php" >Home</a></li>
                               <li><a href="#" title="Messages" class="DeleteSess">Messages</a></li>
                               <li><a href="account.php" title="Account">Account</a></li>
                               <li><a href="contact.php" title="Contact">Contact</a></li>
                               <li class="logout"><a href="api/logout.php" title="Logout"><span class="glyphicon glyphicon-log-out "></span> Logout</a></li>
                          </ul>
					  </div><!-- close the navbar-1 div-->
                </div><!--close the container-fluid div-->
          </nav> 
    </div> <!-- close the container div-->

    
    <!-- Page Content -->
    <div class="container">
 <!-- Service Panels -->
        <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
        <div class="row">
           <div class="col-lg-12">
	            <h2 class="section-header">Services</h2>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-briefcase fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Jobs</h4>
                        <p>Join to see our growing list of employers and positions available</p>
                        <a href="#" title="Show more" class="btn btn-primary showMore" >Show more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-car fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Transport</h4>
                        <p>Looking for a cheap car or camping van? We have members uploading vehicles for sale every day</p>
                        <a href="#" title="Show more" class="btn btn-primary showMore">Show more</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                              <i class="fa fa-circle fa-stack-2x text-primary"></i>
                              <i class="fa fa-home fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Accomodation</h4>
                        <p>Cheap accomodation for those looking to save money</p>
                        <a href="#"  title="Show more" class="btn btn-primary showMore">Show more</a>
                    </div>
                </div>
            </div>

 		   		<?php require "adverts-ads.php";   ?>

        <hr>
    </div>   <!-- close the row div-->
   </div>    <!-- close the container div-->
      
       <?php  require "footer.php"; ?>

       <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>  
    <script src="js/custom.js"></script>
    <script src="js/members.js"></script>
    <script src="js/newAdd.js"></script>
    <!--<script src="js/search/angular-animate.min.js"></script>-->
    <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.2.0.js"></script>
    <script src="js/scripts.js"></script>
    <!--<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">-->

</body>
</html>