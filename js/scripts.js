var data2App = angular.module('data2App',['ui.bootstrap']);
var dataApp = angular.module('dataApp',['ngRoute']);

//this filter is to filter out all duplicate entries that angular pushes to select dropdown
data2App.filter('unique', function () 
{

    return function (items, filterOn) 
    {
         if (filterOn === false) 
         {
            return items;
         }

        if ((filterOn || angular.isUndefined(filterOn)) && angular.isArray(items)) 
        {
            var hashCheck = {}, newItems = [];
            var extractValueToCompare = function (item) 
            {
                if (angular.isObject(item) && angular.isString(filterOn)) 
                {
                    return item[filterOn];
                }
                else 
                {
                    return item;
                }
            };

            angular.forEach(items, function (item) 
            {
                var valueToCheck, isDuplicate = false;

                for (var i = 0; i < newItems.length; i++) 
                {
                    if (angular.equals(extractValueToCompare(newItems[i]), extractValueToCompare(item))) 
                    {
                        isDuplicate = true;
                        break;
                    }
                }
                if (!isDuplicate) 
                {
                    newItems.push(item);
                }

            });
            
            items = newItems;
        }
        return items;
    };
});//close unique filter function

 
 data2App.filter('reverse', function() 
 {

  return function(items) 
  {
    if (!items) { return };
    return items.slice().reverse();
  };
 });// close the reverse filter function



 dataApp.controller('jobsCtrl', function ($scope, $http) 
 {
	
	$http.get('api/jobs.php').success(function(data) 
	{

     $scope.Jobs = data;
			
   });

 });//close the jobsctrl controller function

		
		 

  data2App.controller('jobs2Ctrl', function ($scope, $http, filterFilter) 
  {
	
	$http.get('api/jobs.php').success(function(data) 
	{
    
    $scope.Jobs2 = data;
	$scope.currentPage = 1; //current page
    $scope.maxSize = 5; //pagination max size
    $scope.entryLimit = 2; //max rows for data table

    /* init pagination with $scope.list */
    $scope.noOfPages = Math.ceil($scope.Jobs2.length/$scope.entryLimit);
    
    $scope.OriginalVal=function()
    {
     
     $scope.noOfPages = Math.ceil($scope.Jobs2.length/$scope.entryLimit);
     $scope.filtered = $scope.Jobs2;
     $scope.query=[];
    };
         
    $scope.changedValue=function(term)
    {
     $scope.filtered = filterFilter($scope.Jobs2, term);
     $scope.noOfPages = Math.ceil($scope.filtered.length/$scope.entryLimit);
    };
  
    $scope.changedValue();
    
   });

  });//close the jobs2ctrl controller function



  data2App.filter('startFrom', function() 
  {
    return function(input, start) {
        start = +start; //parse to int
        return input.slice(start);
    }
 });//close the startFrom filter function


 dataApp.controller('TransCtrl', function ($scope, $http) 
 {
	
	$http.get('api/transport.php').success(function(data) 
	{
       $scope.TransportList = data;
    });
 });//c;pse the TransCtrl controller function
	
	
 data2App.controller('Trans2Ctrl', function ($scope, $http, filterFilter) 
 {
	
	$http.get('api/transport.php').success(function(data) 
	{

		$scope.TransportList2 = data;
		$scope.currentPage = 1; //current page
        $scope.maxSize = 5; //pagination max size
        $scope.entryLimit = 2; //max rows for data table

       /* init pagination with $scope.list */
       $scope.noOfPages = Math.ceil($scope.TransportList2.length/$scope.entryLimit);
    
       $scope.OriginalVal=function()
       {
        $scope.noOfPages = Math.ceil($scope.TransportList2.length/$scope.entryLimit);
        $scope.filtered = $scope.TransportList2;
        $scope.query=[];
       };
         
       $scope.changedValue=function(term)
       {
        $scope.filtered = filterFilter($scope.TransportList2, term);
        $scope.noOfPages = Math.ceil($scope.filtered.length/$scope.entryLimit);
       };
  
        $scope.changedValue();
   
	});	

 });//close Trans2Ctrl controller function

	
	
		
 dataApp.controller('AccomCtrl', function ($scope, $http) 
 {
	
	$http.get('api/Accom.php').success(function(data) 
	{
		$scope.Accomodation = data; 	
    });	
 });//close the AccomCtrl controller function

	
 data2App.controller('Accom2Ctrl', function ($scope, $http,filterFilter)
  {
	
	$http.get('api/Accom.php').success(function(data) 
	{
		$scope.Accomodation2 = data;
		$scope.currentPage = 1; //current page
        $scope.maxSize = 5; //pagination max size
        $scope.entryLimit = 2; //max rows for data table

        /* init pagination with $scope.list */
        $scope.noOfPages = Math.ceil($scope.Accomodation2.length/$scope.entryLimit);
    
         $scope.OriginalVal=function()
         {
          $scope.noOfPages = Math.ceil($scope.Accomodation2.length/$scope.entryLimit);
          $scope.filtered = $scope.Accomodation2;
          $scope.query=[];
         };
         
        $scope.changedValue=function(term)
        {
          $scope.filtered = filterFilter($scope.Accomodation2, term);
          $scope.noOfPages = Math.ceil($scope.filtered.length/$scope.entryLimit);
        };
  
         $scope.changedValue();
	});	

 });//close the Accom2Ctrl controller function