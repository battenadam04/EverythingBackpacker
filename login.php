<?php
	session_start();
	
	$_SESSION['FNad']=[];
	
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
	
	if(( $_SESSION['FNad']) == "3")
	{
		header( "Location: index-3.php" );
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
    <meta name="description" content="">
    <meta name="author" content="">
  

    <title>Just 4 Backpackers</title>
    
    <!--[if IE 7]>    <html class=" lt-ie9 lt-ie8" lang="en"> <![endif]-->
    <!--[if IE 8]>    <html class=" lt-ie9" lang="en"> <![endif]-->

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/custom.css" rel="stylesheet">
    <script src="https://js.stripe.com/v3/"></script>

    <script type="text/javascript">
       var stripe = Stripe('pk_test_aXAbLPL7Px2YNT1QwkBl2xcW');
       var elements = stripe.elements();
    </script>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js"></script>
  

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	    <div class="container">
		<?php require "log-nav.php"; ?>
		</div><!-- close the container-->
    

    <!-- Page Content -->
    <div class="container">
 <!-- Service Panels -->
              <div class="Clickimages">
		         <p><img src="images/ads/ad2.jpg" alt="Advertisement" /></p>
	           </div>
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
                        <a href="#" class="btn btn-primary Sign-up" >Sign up to view</a>
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
                        <a href="#" class="btn btn-primary Sign-up">Sign up to view</a>
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
                        <h4>Accommodation</h4>
                        <p>Cheap accomodation for those looking to save money</p>
                        <a href="#" class="btn btn-primary Sign-up">Sign up to view</a>
                    </div>
                </div>
                
            </div>
 		   
 		 <div ng-app="dataApp">
	 		   	 	
	 		   	 	  <div class="col-md-12 col-sm-12 ">
	 		   	 	    <div class="Clickimages">
		                   <p><img src="images/ads/ad3.png" alt="Advertisement" /></p>
	                    </div>
	                       <h2 class="section-header">Recently added</h2>
	 		   	     </div>
	 		   	 	  
	 		   	 	    
 		   
 		   	<div class="list-group">
 		      <div class="col-md-4 col-sm-6 list-group-1">
 			
				 	<div ng-controller="jobsCtrl" >
				     <a href="#" class="list-group-item" ng-repeat="x in Jobs" ng-if="$index < 3">
				     <h4 class="list-group-item-heading">{{ x.Title }}</h4>
				     <p class="list-group-item-text" >{{ x.Description }}</p>
				    </a>
            </div>
           </div>


 		    <div class="col-md-4 col-sm-6 list-group-1">
 		      <div ng-controller="TransCtrl">
	 		      
				  <a href="#" class="list-group-item ad" ng-repeat="x in TransportList" ng-if="$index < 3">
				    <h4 class="list-group-item-heading">{{ x.Make }} {{ x.Model }}</h4>
				    <p class="list-group-item-text" >{{ x.Description }}</p>
				  </a>		  
             </div>
          </div>

  	      <div class="col-md-4 col-sm-6 list-group-1">
 		    <div ng-controller="AccomCtrl">
	 		    
				  <a href="#" class="list-group-item ad" ng-repeat="x in Accomodation" ng-if="$index < 3">
				    <h4 class="list-group-item-heading">{{ x.Title }}</h4>
				    <p class="list-group-item-text" >{{ x.Description }}</p>
				  </a>
            </div>
         </div>
     </div>
     
     
        </div><!--close data app -->
        
    </div>
 		     	
 		  
        <hr>
 </div>    <!-- close the container div-->

       <?php  require "footer.php"; ?>


    <script src="js/jquery.js"></script>
    
    <script>
	      	 	
       var card = elements.create('card', {
         hidePostalCode: true,
         style: {
         base: {
         iconColor: '#F99A52',
         color: '#32315E',
         width:'50%',
         border:'2px solid black',
         lineHeight: '48px',
         fontWeight: 400,
         fontFamily: '"Open Sans", "Helvetica Neue", "Helvetica", sans-serif',
         fontSize: '15px',

         '::placeholder': {
         color: '#CFD7DF',
          }
          },
          }
         });
	    </script>
 
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/login.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/sign-up.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>