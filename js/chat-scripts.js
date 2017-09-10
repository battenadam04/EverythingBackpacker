
/*-----------scripts for the user specific adverts for accounts.php-------------*/

   var Callback="";
   
   function DelJobAd(ID,IDad,Colname)
   {
	  var ID=ID;
      var IDad=IDad;
      var Colname=Colname;
      var inputclicked=angular.element(this);
      var url="";
    
      if (Colname == "Jobs")
      {
	    url="api/deleteJobAd.php";
      }
    
      if (Colname == "Transport")
      {
	    url="api/deleteTransportAd.php";
      }
    
      if (Colname == "Accom")
      {
	    url="api/deleteAccomAd.php";
       }
    
       
      var msg= confirm("Are you sure you want to delete this ad?");

	  if (msg == true) 
	  {

	     $.ajax({
		     type: "POST",
		     url: url,
			 data: {IDad:IDad,ID:ID},
			 async: false,
			 success: function(data)
			 {
				var result =JSON.parse(data)[0];
				       
				if(result == true)
				{
			      alert("ad deleted");
                  Callback="true";
			    }
				       
				else
				{
				   Callback= "false";
				}
				       
				       
			 }
				   
		  });// close ajax call
				   
	    }//close if statement for if msg true
			
	  return Callback;	
	}	//close	DelJobAd function	


    var data3App = angular.module('data3App',[]);

    data3App.controller('userJobsCtrl', function ($scope, $http) 
    {
	   $http.get('api/userJobs.php').success(function(data) 
	   {
          $scope.Jobs = data;
        });
  
        $scope.showDetail = function showDetail($event)
        {
	       //$scope.Jobs.splice(event, 1);
           var ID=angular.element($event.target).attr('id');
           var IDad=angular.element($event.target).attr('value');
           var Colname=angular.element($event.target).attr('name');
          
            DelJobAd(ID,IDad,Colname);
  
            index = $scope.Jobs.indexOf($event);
            
            if(Callback == false) 
            {
               alert("nope");
            }
 
            else
            {
	          $scope.Jobs.splice(index, 1); // need to delete the ad being deleted *******************************
            }
        }//close $scope.showDetail function

    });//close userJobsCtrl controller
 
    data3App.controller('userTransCtrl', function ($scope, $http) 
    {
	
	  $http.get('api/userTransport.php').success(function(data) 
	  {
         $scope.Trans = data;
      });
    });//close userTransCtrl controller


    data3App.controller('userAccomCtrl', function ($scope, $http) 
    {
	
	   $http.get('api/userAccom.php').success(function(data) 
	   {
         $scope.Accom = data;
       });	
    });//close userAccomCtrl controller
    
    data3App.controller('userCtrl', function ($scope, $http) 
    {
	
	   $http.get('api/userDetails.php').success(function(data) 
	   {
         $scope.User = data;
       });	
    });//close userCtrl controller
	
     