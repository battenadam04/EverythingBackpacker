<?php
	session_start();
	
	if(( $_SESSION['FNad']) == null){
		header( "Location: login.php" ) ;
		  exit;
	}	
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Update your Everything Backpacker personal details and delete or edit your adverts depending on your subscription.">
    <meta name="keywords" content="Backpacker,Backpackers, Australia, Travel, Travelling, Jobs, Transport, Acomodation, Everything Backpacker, backpackr,oz travel, oz, adventure">
    <meta name="author" content="Adam Batten">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <title> <?php echo  (isset($_SESSION["FN"]) ? $_SESSION["FN"] : null); ?>'s account</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
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

<body ng-app="data3App">

   <div class="container">
	  	    
	  	    <p class="WelcomMsg" >Welcome: <?php echo  (isset($_SESSION["FN"]) ? $_SESSION["FN"] : null); ?> <i class="fa fa-facebook-square fa-2x " aria-hidden="true"> <i class="fa fa-twitter-square" aria-hidden="true"></i>
</i></p>
 
    <nav class="navbar white navbar-default ">
	    <div class="container-fluid">
              <div class="logo"><a href="index-ad-4.php" title="Home"><img src="images/logo.png" alt="Home" /></a><span>Everything Backpacker</span></div> 

              <div class="navbar-header">
	              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span>
					<span class="icon-bar top-bar"></span>
					<span class="icon-bar middle-bar"></span>
					<span class="icon-bar bottom-bar"></span>
					</button>
			  </div><!--close the navbar-header-->
	
	    <div id="navbar-1" class="navbar-collapse collapse mainnav">
    
                 <ul class="nav navbar-nav navbar-right">
	    
                     <li><a class="scroller" title="Home" href="index-1.php" >Home</a></li>
                     <?php
	     
       	                if(( $_SESSION['FNad']) == "1" || ($_SESSION['FNad']) == "2" )
       	                {
		      	          $error="you dont qualify";
		      	        } 
		      	        else 
		      	        {
			      	      echo '<li><a href="#" title="Messages" class="DeleteSess">Messages</a></li>';
			      	    }
		      	     ?>
                     <li><a href="account.php" title="Account">Account</a></li>
                     <li><a href="contact.php" title="Contact">Contact</a></li>
                     <li class="logout"><a href="api/logout.php"><span class="glyphicon glyphicon-log-out "></span> Logout</a></li>
                 </ul>
	   </div><!--close navbar-1-->
  
       </div><!-- close the container-fluid-->

   </nav> 
   </div><!-- close container class-->

   <!-- Page Content -->
    <div class="container" >
	    
	     <div class="col-lg-14">
             <h2 class="section-header">Account details</h2>
        </div><!-- close class col-lg-14 -->
            
	    <div id="mainContent">
	    
	        <div class="list-group-item">
		    
		    <div id="UserDetails"  ng-controller="userCtrl">
	        <div ng-repeat="x in User" class="UserDetails" ng-if="$index < 1">
	            
	             <h4>You joined us on {{x.Joined}}</h4>
	             <h4>Your subscription ends on  {{x.EndDate}}</h4>
	        
	        </div><!--close the UserDetails div-->
		    </div><!--close the UserDetails clas-->

		       <table class="col2table">
		          <tr><td>
	                  <h3>Change Password</h3>
	                    <form id="changePass" method="POST" action="#" class="form-control-other">
		                   <p> <input type="text" class="form-control " name="oldPass" placeholder="Old password"/></p>
		                   <p> <input type="text" class="form-control" name="newPass" placeholder="New password"/></p>
		                   <p> <input  type="submit" class=" form-control submitAd btn btn-primary updateBtn" value="update"></p>
		               </form>
		            </td>
		      
		      
		            <td>
		            <h3>Change landline/ mobile number</h3>
	                   <form id="changeNo" method="POST" action="#" class="form-control-other">
		                   <p> <input type="text" class="form-control" name="newNo" placeholder="New number"/></p>
		                   <p> <input  type="submit" class=" form-control submitAd btn btn-primary updateBtn" value="update"></p>
		              </form></td></tr>
		      </table>
		
	      </div><!-- close list-group-item class-->
	      
	      <!-- Make sure the user has the relevant permissions to access and edit adverts -->
	      <?php 
	      	if(( $_SESSION['FNad']) == "1"  || ($_SESSION['FNad']) == "3")
	      	  {
		         $error="you dont qualify";
		      }
		    
		    else
		      {
		
	             echo ' <div class="col-lg-14">
	                         <h2 class="section-header">Change/ edit ads</h2>
	                         <h4 class="section-header">Simply edit each field and hit enter</h4>
                        </div>
      
                       <div class="list-group">
                         
                          <div id="editAds"  ng-controller="userJobsCtrl">
	      
	                         <div ng-repeat="x in Jobs" class="list-group-item" >
		        
		                     <h4 class="list-group-item-heading">{{ x.Title }}</h4>
		                  
                             <form id="changefields" method="POST" action="#" >
                      
                               <table class="Title" >
                                  <tr value="Jobs"><td> Location:</td><td> <input type="Text" name="Location" class="update form-control" id="{{ x.ID }}" value="{{ x.Location }}"/></td><td class="Message"></td></tr>
                                  <tr value="Jobs"><td> State:</td><td>  <input type="Text" name="State" class="update form-control"  id="{{ x.ID }}" value="{{ x.State }}"/></td><td class="Message"></td></tr>
                                  <tr value="Jobs"><td>Employer:</td><td> <input type="Text" name="Employer" class="update form-control" id="{{ x.ID }}" value="{{ x.Employer }}"/></td><td class="Message"></td></tr>
                                  <tr value="Jobs"><td>2nd Year Visa:</td><td>  <input type="Text" name="Visa" class="update form-control" id="{{ x.ID }}" value="{{ x.Visa }}"/></td><td class="Message"></td></tr>
                                  <tr value="Jobs"><td>Pay rate  &#36;:</td><td> <input type="Text" name="PayRate" class="update form-control" id="{{ x.ID }}" value="{{ x.PayRate }}"/></td><td class="Message"></td></tr>
                           
                                  <tr value="Jobs"><td>Description:</td><td> <Textarea name="Description"   class="update form-control" id="{{ x.ID }}" value="">{{ x.Description }}</textarea></td><td class="Message"></td></tr>
                             </table>
                    
                             <button type="button" id="{{ x.ID }}"  ng-click="showDetail($event)" class="delAdvert form-control btn btn-primary" name="Jobs" value="{{x.IDad}}">Delete advert</button>
                          </form>
                  
                       </div><!--close list-group-item class-->
	                 </div><!--close editAds id-->
                  </div><!--close list-group class-->
      
      
                     <div class="list-group">
                      
                        <div id="editAds-trans"  ng-controller="userTransCtrl">
	      
	                       <div ng-repeat="x in Trans" class="list-group-item" >
		        
		                   <h4 class="list-group-item-heading">{{ x.Make }}</h4>
		        
                                <form id="changefields-trans" method="POST" action="#" >
                    
                                  <table class="Title">
                                   
                                    <tr value="Transport"> <td>Year:</td><td><input type="Text"  name="Year" class="update form-control" id="{{ x.ID }}" value="{{ x.Year }}"/></td><td class="Message"></td></tr>
                                    <tr value="Transport"><td>Make:</td><td><input type="Text"  name="Make" class="update form-control" id="{{ x.ID }}" value="{{ x.Make }}"/></td><td class="Message"></td></tr>
                                    <tr value="Transport"><td>Model:</td><td><input type="Text"  name="Model" class="update form-control" id="{{ x.ID }}" value="{{ x.Model }}"/></td><td class="Message"></td></tr>
                                    <tr value="Transport"><td>Location:</td><td><input type="Text" name="Location" class="update form-control" id="{{ x.ID }}" value="{{ x.Location }}"/></td><td class="Message"></td></tr>
                                    <tr value="Transport"><td> State:</td><td><input type="Text" name="State" class="update form-control" id="{{ x.ID }}" value="{{ x.State }}"/></td><td class="Message"></td></tr>
                                    <tr value="Transport"><td>Fuel:</td><td><input type="Text" name="FuelType" class="update form-control" id="{{ x.ID }}" value="{{ x.FuelType }}"/></td><td class="Message"></td></tr>
                                    <tr value="Transport"><td>Mileage KM:</td><td><input type="Text" name="KM" class="update form-control" id="{{ x.ID }}" value="{{ x.KM }}"/></td><td class="Message"></td></tr>
                                    <tr value="Transport"><td>Price &#36;:</td><td><input type="Text"name="Price" class="update form-control" id="{{ x.ID }}" value="{{ x.Price }}"/></td><td class="Message"></td></tr>
                                    <tr value="Transport"><td>Description:</td><td> <Textarea name="Description"  class="update form-control" id="{{ x.ID }}" value="">{{ x.Description }}</textarea></td><td class="Message"></td></tr>
                                </table>
                
                                <button type="button" id="{{ x.ID }}"  ng-click="showDetail($event)" class="delAdvert form-control btn btn-primary" name="Jobs" value="{{x.IDad}}">Delete advert</button>
   
                            </form>
        
		                   </div><!--close list-group-item class-->
	                 </div><!--close editAds id-->
                  </div><!--close list-group class-->
      
      
                         <div class="list-group">
                         
                           <div id="editAds-Accom"  ng-controller="userAccomCtrl">
	      
	                         <div ng-repeat="x in Accom" class="list-group-item" >
		        
		                        <h4 class="list-group-item-heading">{{ x.Title }}</h4>
      
                                   <form id="changefields-Accom" method="POST" action="#" >
                                     
                                      <table class="Title">
                                         <tr value="Accom"><td>Location:</td><td><input type="Text" name="Location"  class="update  form-control" id="{{ x.ID }}" value="{{ x.Location }}"/></td><td class="Message"></td></tr>
                                         <tr value="Accom"><td>State:</td><td><input type="Text" name="State" class="update form-control" id="{{ x.ID }}" value="{{ x.State }}"/></td><td class="Message"></td></tr>
                                         <tr value="Accom"><td>Parking:</td><td><input type="Text" name="Parking" class="update form-control" id="{{ x.ID }}" value="{{ x.Parking }}"</td><td class="Message"></td></tr>
                                         <tr value="Accom"><td>Wifi:</td><td><input type="Text" name="Wifi" class="update form-control" id="{{ x.ID }}" value="{{ x.Wifi }}"/></td><td class="Message"></td></tr>
                                         <tr value="Accom"><td>bond:</td><td>&#36;<input type="Text" name="Bond" class="update form-control" id="{{ x.ID }}" value="{{ x.Bond }}"/></td><td class="Message"></td></tr> 
                                         <tr value="Accom"><td>Description:</td><td> &#36; <Textarea name="Description"   class="update form-control" id="{{ x.ID }}" value="">{{ x.Description }}</textarea></td><td class="Message"></td></tr>  
                                   </table>
                                   <button type="button" id="{{ x.ID }}"  ng-click="showDetail($event)" class="delAdvert form-control btn btn-primary" name="Jobs" value="{{x.IDad}}">Delete advert</button>
              
                                </form>
                    </div><!--close list-group-item class-->
	                 </div><!--close editAds id-->
                  </div><!--close list-group class-->

		         <div class="pages"> <pagination data-boundary-links="true" data-num-pages="noOfPages" data-current-page="currentPage" max-size="maxSize" data-previous-text="&laquo;" data-next-text="&raquo;"></pagination></div>
'; }
?>
     </div><!--close the maincontent div-->
     
        
    </div> <!-- .container -->
    
     <?php  require "footer.php"; ?>

 
   <script src="js/jquery.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.2.0.js"></script> 
   <script src="js/custom.js"></script> 
   <script src="js/members.js"></script>
   <script src="js/chat-scripts.js"></script>
   <script src="js/account.js"></script>

</body>
</html>
