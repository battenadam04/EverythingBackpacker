<?php include"forms.php";?>
      
    <div ng-app="data2App" >
	
 		   <div id="mainContent">
 		   
                <div class="list-group">
	                
              
                  	<div ng-controller="jobs2Ctrl" id="Jobscontrol" >
      
                        <table class="table">
                          
                          <thead>
                            <tr class="filters">
	                          <th>Employer
                              <select id="Employer-filter" class="form-control" ng-change="changedValue(query.selectedEmployer)"   ng-model="query.selectedEmployer" ng-options="x.Employer as x.Employer for x in Jobs2 | unique:'Employer'"></select>
                              </th>
            
                              <th>Location
                              <select id="Location-filter" class="form-control"ng-change="changedValue(query.selectedLocation)"   ng-model="query.selectedLocation" ng-options="x.Location as x.Location for x in Jobs2  | unique:'Location'"></select>
                             </th>
            
                             <th>State
                             <select id="State-filter" class="form-control" ng-change="changedValue(query.selectedState)"  ng-model="query.selectedState" ng-options="x.State as x.State for x in Jobs2  | unique:'State'"></select>
                             </th>
           
                             <th>Visa
                             <select id="Visa-filter" class="form-control"  ng-change="changedValue(query.selectedVisa)" ng-model="query.selectedVisa" ng-options="x.Visa as x.Visa for x in Jobs2 | unique:'Visa'"></select>
                             </th>
            
                             <th>Pay rate
                             <select id="Pay-filter" class="form-control" ng-change="changedValue(query.selectedPay)"   ng-model="query.selectedPay" ng-options="x.PayRate as x.PayRate for x in Jobs2  | unique:'PayRate'"></select>
                            </th>
             
                             <th>
                               <button id="clear-filter" class="btn btn-primary form-control"  ng-click="OriginalVal()" type="button">Clear Filter</button>
                            </th>
                         </tr>
                      </thead>
                   </table>
                  
                  
              
 	
              <div class="list-group-item" ng-repeat=" x in filtered | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit|filter:(!!query.selectedEmployer || !!query.selectedLocation || !!query.selectedState || !!query.selectedVisa || !!query.selectedPay|| undefined) && {Employer:query.selectedEmployer, Location:query.selectedLocation, State:query.selectedState, Visa:query.selectedVisa, PayRate:query.selectedPay}" >
	  
                   <h4 class="list-group-item-heading">{{ x.Title }}</h4>
      
                      <table class="Title">
                           <tr><td> Location:</td><td> {{ x.Location }}</td></tr>
                           <tr><td> State:</td><td> {{ x.State }}</td></tr>
                           <tr><td>Employer:</td><td> {{ x.Employer }}</td></tr>
                           <tr><td>2nd Year Visa:</td><td> {{ x.Visa }}</td></tr>
                           <tr><td>Pay rate:</td><td> &#36;{{ x.PayRate }}</td></tr>
                     </table>
                  
                     <span class=" align-right" ><span class="page-header " >Description:</span><br/>{{ x.Description }}</span>
                  
                     <div class="contactdetails">
                        <h5>Get in touch</h5>
                        <p>Tel: {{ x.Phone }}</p>
                        <p>Email: {{ x.Email }}</p>
                            <p>{{ x.Email }}</p>
                        
                        
                          <div class="chatButtonframe">
	                          <button class="ChatService btn btn-primary" id="{{x.Permission}}">Check for Chat Service</button>
	                           <p hidden>{{ x.Fname }}</p>
                              <div class="Chat"></div>
                          </div>
                      
                      
                    </div><!-- contactdetails -->
                  
          
                  
                    <div class="clearfix"></div>
              </div><!--close list-group-item div-->
  
              <div class="pages"><pagination  data-boundary-links="true" data-num-pages="noOfPages" data-current-page="currentPage" max-size="maxSize" data-previous-text="&laquo;" data-next-text="&raquo;"></pagination></div>
    
               </div><!--jobs2Ctrl div-->
         </div><!--list-group div-->


 		 <div class=" list-group">
 	        
 	          <div ng-controller="Trans2Ctrl as item"  >
	 	
	                  <table class="table">
                            
                            <thead>
                               <tr class="filters">
	                              <th>Year
                                     <select id="Year-filter" class="form-control" ng-change="changedValue(query.selectedYear)"   ng-model="query.selectedYear" ng-options="x.Year as x.Year for x in TransportList2 | unique:'Year'"></select>
                                 </th>
            
                                  <th>Model
                                    <select id="Model-filter" class="form-control" ng-change="changedValue(query.selectedModel)"   ng-model="query.selectedModel" ng-options="x.Model as x.Model for x in TransportList2 | unique:'Model'"></select>
                                  </th>
            
                                  <th>Make
                                    <select id="Make-filter" class="form-control" ng-change="changedValue(query.selectedMake)"   ng-model="query.selectedMake" ng-options="x.Make as x.Make for x in TransportList2 | unique:'Make'"></select>
                                  </th>
            
                                  <th>Location
                                    <select id="Location1-filter" class="form-control"ng-change="changedValue(query.selectedLocation)"   ng-model="query.selectedLocation" ng-options="x.Location as x.Location for x in TransportList2  | unique:'Location'"></select>
                                 </th>
                                
                                 <th>State
                                   <select id="State1-filter" class="form-control" ng-change="changedValue(query.selectedState)"  ng-model="query.selectedState" ng-options="x.State as x.State for x in TransportList2  | unique:'State'"></select>
                                 </th>
            
                                 <th>Fuel
                                   <select id="Fuel-filter" class="form-control"  ng-change="changedValue(query.selectedFuel)" ng-model="query.selectedFuel" ng-options="x.FuelType as x.FuelType for x in TransportList2 | unique:'FuelType'"></select>
                                 </th>
            
                                 <th>Mileage
                                    <select id="Mile-filter" class="form-control" ng-change="changedValue(query.selectedMile)"   ng-model="query.selectedMile" ng-options="x.KM as x.KM for x in TransportList2  | unique:'KM'"></select>
                                 </th>
              
                                 <th>Price
                                    <select id="Price-filter" class="form-control" ng-change="changedValue(query.selectedPrice)"   ng-model="query.selectedPrice" ng-options="x.Price as x.Price for x in TransportList2  | unique:'Price'"></select>
                                 </th>
              
                                 <th>
                                    <button id="clear-Trans" class="btn btn-primary form-control" ng-click="OriginalVal()" type="button">Clear Filter</button>
                                </th>
                             </tr>
                        </thead>
 	               </table>
 

 		   
        <div class="list-group-item TransCtrl" ng-repeat=" x in filtered | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit|filter:(!! query.selectedYear || !! query.selectedMake || !! query.selectedModel || !!query.selectedLocation || !!query.selectedState || !!query.selectedFuel || !!query.selectedMile||!!query.selectedPrice || undefined) && {Year:query.selectedYear, Make:query.selectedMake, Model:query.selectedModel, Location:query.selectedLocation, State:query.selectedState, FuelType:query.selectedFuel, KM:query.selectedMile, Price:query.selectedPrice}" >
            
            <h4 class="list-group-item-heading">{{ x.Make }} {{ x.Model }} </h4>
 
                 <p class="list-group-item-text" ><img src="{{ x.Image }}" alt="Image of car for sale" onerror="this.src='images/noImage.png'"/></p>
         
                 <table class="Title">
                      <tr> <td>Year:</td><td>{{ x.Year }}</td></tr>
                      <tr><td>Year:</td><td>{{ x.Make }}</td></tr>
                      <tr><td>Year:</td><td>{{ x.Model }}</td></tr>
                      <tr><td>Location:</td><td>{{ x.Location }}</td></tr>
                      <tr><td> State:</td><td>{{ x.State }}</td></tr>
                      <tr><td>Fuel:</td><td>{{ x.FuelType }}</td></tr>
                      <tr><td>Mileage:</td><td>{{ x.KM }} KM</td></tr>
                      <tr><td>Price:</td><td>&#36;{{ x.Price }}</td></tr>
                </table>
   
                <span class=" align-right" ><span class="page-header">Description:</span><br/>{{ x.Description }}</span>
      
                <div class="contactdetails">
                  <h5>Get in touch</h5>
                  <p>Tel: {{ x.Phone }}</p>
                  <p class="Email">Email: {{ x.Email }}</p>
                 
                  <p hidden>{{ x.Email }}</p>
                  
              
		
			           <div class="Chat">
	                          <button class="ChatService btn btn-primary" id="{{x.Permission}}">Check for Chat Service</button>
	                           <p hidden>{{ x.Fname }}</p>
                              <div class="Chat"></div>
                          </div>
	
               </div><!--contactdetails div-->
               <div class="clearfix"></div>
       </div><!-- list-group-item-->
    
      <div class="pages"> <pagination data-boundary-links="true" data-num-pages="noOfPages" data-current-page="currentPage" max-size="maxSize" data-previous-text="&laquo;" data-next-text="&raquo;"></pagination></div>
 
            </div> <!-- Trans2Ctrl div-->
     </div><!-- list-group div -->

  	 <div class=" list-group">
  	    
  	        <div ng-controller="Accom2Ctrl">
 	 	
                  <table class="table">
                      
                       <thead>
                          
                          <tr class="filters">
	                         <th>Location
                                <select id="Location2-filter" class="form-control"ng-change="changedValue(query.selectedLocation)"   ng-model="query.selectedLocation" ng-options="x.Location as x.Location for x in Accomodation2  | unique:'Location'"></select>
                            </th>
                            
                            <th>State
                               <select id="State2-filter" class="form-control" ng-change="changedValue(query.selectedState)"  ng-model="query.selectedState" ng-options="x.State as x.State for x in Accomodation2  | unique:'State'"></select>
                            </th>
                           
                            <th>Parking
                               <select id="Parking-filter" class="form-control"  ng-change="changedValue(query.selectedPark)" ng-model="query.selectedPark" ng-options="x.Parking as x.Parking for x in Accomodation2  | unique:'Parking'"></select>
                           </th>
            
                           <th>Wifi
                               <select id="Wifi-filter" class="form-control" ng-change="changedValue(query.selectedWifi)"   ng-model="query.selectedWifi" ng-options="x.Wifi as x.Wifi for x in Accomodation2   | unique:'Wifi'"></select>
                           </th>
              
                           <th>Bond
                               <select id="Bond-filter" class="form-control" ng-change="changedValue(query.selectedBond)"   ng-model="query.selectedBond" ng-options="x.Bond as x.Bond for x in Accomodation2   | unique:'Bond'"></select>
                           </th>
              
                           <th>
                              <button id="clear-Accom" class="btn btn-primary form-control" ng-click="OriginalVal()" type="button">Clear Filter</button>
                           </th>
                         </tr>
                     </thead>
 	          </table>
  	 
 		
 
        <div class="list-group-item" ng-repeat="x in filtered | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit|filter:( !!query.selectedLocation || !!query.selectedState || !!query.selectedPark || !!query.selectedWifi||!!query.selectedBond || undefined) && {Location:query.selectedLocation, State:query.selectedState, Parking:query.selectedPark, Wifi:query.selectedWifi, Bond:query.selectedBond}" >
    
           <h4 class="list-group-item-heading">{{ x.Title }}</h4>
             
              <p class="list-group-item-text" ><img src="{{ x.Image }}" alt="Image of accomodation" onerror="this.src='images/noImage.png'"/></p>
      
              <table class="Title">
                 <tr><td>Location:</td><td> {{ x.Location }}</td></tr>
                 <tr><td>State:</td><td> {{ x.State }}</td></tr>
                 <tr><td>Parking:</td><td> {{ x.Parking }}</td></tr>
                 <tr><td>Wifi:</td><td> {{ x.Wifi }}</td></tr>
                 <tr><td>bond:</td><td> &#36;{{ x.Bond }}</td></tr>   
              </table>
              
              
              <span class=" align-right" ><span class="page-header">Description:</span><br/>{{ x.Description }}</span>
                    
              <div class="contactdetails">
                  
                  <h5>Get in touch</h5>
                    <p>Tel: {{ x.Phone }}</p>
                    <p>Email: {{ x.Email }}</p>
                  
                          
			           <div class="ChatService">
	                          <button class="ChatService btn btn-primary" id="{{x.Permission}}">Check for Chat Service</button>
	                           <p hidden>{{ x.Fname }}</p>
                              <div class="Chat"></div>
                          </div>
                          
	         </div><!--contactdetails div-->
             <div class="clearfix"></div>
      </div><!--list-group-item div-->
      
     <div class="pages"> <pagination data-boundary-links="true" data-num-pages="noOfPages" data-current-page="currentPage" max-size="maxSize" data-previous-text="&laquo;" data-next-text="&raquo;"></pagination></div>
 
      </div><!-- Accom2Ctrl div-->
  </div><!-- list-group div-->
</div><!--mainContent div-->

     <div class="col-lg-12 header-hide">
	            
	                <?php
       	                if(( $_SESSION['FNad']) == "3" || ($_SESSION['FNad']) == "4" )
       	                {
		      	          $error="no ads";
		      	        } 
		      	        else 
		      	        {
			      	      echo '<div class="Clickimages">
		                   <p><img src="images/ads/ad3.png" alt="Advertisement" /></p>
	                    </div>';
			      	    }
		      	     ?>
	        
                <h2 class="section-header">Recently added</h2>
            </div>
   
 		   	
       <div class="col-md-4 col-sm-6 list-group-1">
 		
 	       <div ng-controller="jobs2Ctrl" >
              <a href="#" class="list-group-item ad" ng-repeat="Jobs2 in Jobs2" ng-if="$index < 3">
              <h4 class="list-group-item-heading">{{ Jobs2.Title }}</h4>
              <p class="list-group-item-text" >{{ Jobs2.Description }}</p>
              </a>
           </div>
       </div>

       <div class="col-md-4 col-sm-6 list-group-1">
 		
 	       <div ng-controller="Trans2Ctrl" >
              <a href="#" class="list-group-item ad" ng-repeat="x in TransportList2" ng-if="$index < 3">
              <h4 class="list-group-item-heading">{{ x.Make }} {{ x.Model }}</h4>
              <p class="list-group-item-text" >{{ x.Description }}</p>
              </a>
           </div>
       </div>

  	    <div class="col-md-4 col-sm-6 list-group-1">
 	        <div ng-controller="Accom2Ctrl" >
               <a href="#" class="list-group-item ad" ng-repeat="Accomodation2 in Accomodation2" ng-if="$index < 3">
               <h4 class="list-group-item-heading">{{ Accomodation2.Title }}</h4>
               <p class="list-group-item-text" >{{ Accomodation2.Description }}</p>
               </a>
           </div>
       </div>
     
 </div><!--data2App div-->
        
    