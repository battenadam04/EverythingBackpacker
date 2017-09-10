 <p class="WelcomMsg" > <i class="fa fa-facebook-square fa-2x " aria-hidden="true"> <i class="fa fa-twitter-square" aria-hidden="true"></i>
</i></p>
		          
              <nav class="navbar navbar-inverse">

                  <div class="container-fluid">

                     <div class="logo"><a href="login.php"><img src="images/logo.png" alt="Home" /></a><span>Everything Backpacker</span></div> 
 
                         <ul class="nav navbar-nav navbar-right loginnav">
	                        <li class="Sign-up"><a href="#"><span class="glyphicon glyphicon-user "></span> Sign Up</a></li>
                            <li class="login"><a href="#"><span class="glyphicon glyphicon-log-in "></span> Login</a></li>
                        </ul>
  
                 </div><!-- close the container-fluid div -->
                 
                 <form action="#" method="POST" class="logIn" id="logIn"  enctype="multipart/form-data">
                    <ul id="loginform">
	                   <li><input type='text' value='Email' class="form-control" name="Email" id="Email"/></li>
                       <li><input type='password' value='password'class="form-control" name="Password" id="Password" /></li>
                       <li><a href="#" id="PassForget" title="forgotten your password">Forgotten my password</a></li>
                       <li><button class='btn btn-primary' class="form-control" id="login-Ex">GO</button></li>
                   </ul>
                </form>
  
                <!-- the hidden div is to allow user to click anywhere on screen and hide the messagepop div below -->
                <div class="hiddendiv">
                <p>hidden div</p>
                </div><!-- close the hiddendiv div -->
                
                <div class="messagepop">
                    <div class="arrow-up"></div>
  
                     <form method="post" action="#" enctype="multipart/form-data"  id="forgot-pass">
                        <p><label for="email">Your email</label> <input type="text" size="30" name="Email" id="Email" /></p>
                        <p><input type="submit" value="Send Message" name="commit"class="btn btn-primary" id="message_submit"/> or <a class="btn btn-primary" href="#" id="message_cancel">Cancel</a></p>
                    </form>
                </div><!--close the messagepop div-->
                
                <div id="testInfo" class="testInfo">
	                 <div class="arrow-up"></div>
	                 <table>
	                <tr><th>Use the following testing details to log in</th></tr>
	                <tr><td>Usernames</td></tr>
	                <tr><td>adambattenda@live.co.uk - advertiser with paid subscription</td></tr>
	                <tr><td>adam23@live.co.uk - advertiser with free subscription</td></tr>
	                 <tr><td>adambatten@live.co.uk - backpacker with free subscription</td></tr>
	                  <tr><td>jbatten@live.co.uk - backpacker with paid subscription</td></tr>
	                <tr><td>Password: all passwords are "password"</td></tr>
	                
	                 </table>
                </div><!-close the testInfo div--> 

    
               <table id="Member" class="table-responsive">
    
                  <tr><th colspan="2">What would you like to do as a member?</th></tr>
                  <tr><td><span class="fa fa-search fa-5x icon" aria-hidden="true"></span></td><td class="signup-td"><span class="fa fa-laptop fa-5x icon" aria-hidden="true"></span></td></tr>
                  <tr><td><button type="button" class="btn btn-primary form-control" >Look for work, accomodation and/or transport</button></td><td class="signup-td">
                  <button type="button" class="btn btn-primary form-control">Advertise work, Accomodation and/or transport</button></td></tr>
              </table>
    
    
               <div id="SignUp-bp">
   
                  <form action="#" method="POST" class="SignUp-bp-Form" id="payment-form" >
          
                       <div class="commErrors" class="form-group row" ></div>
     
							     <h3 class="page-header">Personal Details</h3>
							      
							        <div class="form-group row">
							    <label for="inputFname" class="col-sm-2 form-control-label">First Name</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control"  name="Fname" id="inputFname" required placeholder="First Name">
							    </div>
							  </div>
							  
							      <div class="form-group row">
							    <label for="inputSname" class="col-sm-2 form-control-label"> Surname</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" name="Sname" id="inputSname" required placeholder="Surname">
							    </div>
							  </div>
							  
							  <div class="form-group row">
							    <label for="inputEmail" class="col-sm-2 form-control-label">Email</label>
							    <div class="col-sm-10">
							      <input type="email" class="form-control" name="Email" id="inputEmail" required placeholder="Email">
							    </div>
							  </div>
							  
							   <div class="form-group row">
							    <label for="inputPhone" class="col-sm-2 form-control-label">Mobile</label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" name="Phone" id="inputPhone" required placeholder="Mobile">
							    </div>
							  </div>
							  
							  <div class="form-group row">
							    <label for="inputPassword" class="col-sm-2 form-control-label">Password</label>
							    <div class="col-sm-10">
							      <input type="password" class="form-control" name="Password" id="inputPassword" required placeholder="Password">
							    </div>
							  </div>
  
  
							     <h3 class="page-header">Terms and Conditions</h3>
							  <p><input type="checkbox" name="TandC" id="TandC" value="true"/> I have read Just4Backpackers Terms and Conditions and fully understand what they entail. <a href="#" title="" >Terms and Conditions</a></p>
							 
							 
							     <h3 class="page-header">Subscription Type</h3>
							 <label>What type of subscription would you like?</label>
							 
							 <p>You do not have to pay for this service straight away. Try it for 3 months free of charge. You may get more advertisements and less features but you should still be delighted with what the basic package offers.</p>
							 
							  <p><input type="radio" name="Term" value="3" class="freeSub Sub"/> $0 for 3 months </p>
							  <p><input type="radio" name="Term" value="6" class="Paidsub Sub"/> $30 for 6 months </p>
							  <p><input type="radio" name="Term" value="12" class="Paidsub Sub"/> $60 for 12 months </p>
							
							<div class="Payment">
							     <label for="card-element">
							      Credit or debit card
							    </label>
							    <p>TESTING - use card number 4242424242424242 to test payment, you can make up the rest.</p>
							    <div id="card-element">
							      <!-- a Stripe Element will be inserted here. -->
							    </div>
							<span class="payment-errors"></span>
							<div id="card-errors" role="alert"></div>
							</div>
							  <input  type="submit" class=" form-control submit btn btn-primary"  value="Sign up">

                 </form>
           </div><!-- close the SignUp-bp div-->
     
     
           <div id="SignUp-ad">
     
              <form action="#" method="POST" class="SignUp-bp-Form" id="payment-form-ad">
       
                   <div class="commErrors" class="form-group row" ></div>
     
					      <h3 class="page-header">Personal Details</h3>
					        <div class="form-group row">
					    <label for="inputFname" class="col-sm-2 form-control-label">First Name</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control"  name="Fname-ad" id="inputFname1" placeholder="First Name">
					    </div>
					  </div>
					  
					      <div class="form-group row">
					    <label for="inputSname" class="col-sm-2 form-control-label"> Surname</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" name="Sname-ad" id="inputSname1" placeholder="Surname">
					    </div>
					  </div>
					  
					    <div class="form-group row">
					    <label for="inputBname" class="col-sm-2 form-control-label"> Business Name</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" name="Bname-ad" id="inputBname1" placeholder="Business Name">
					    </div>
					  </div>
					  
					  <div class="form-group row">
					    <label for="inputEmail3" class="col-sm-2 form-control-label">Email</label>
					    <div class="col-sm-10">
					      <input type="email" class="form-control" name="Email-ad" id="inputEmail1" placeholder="Email">
					    </div>
					  </div>
					  
					   <div class="form-group row">
					    <label for="inputPhone" class="col-sm-2 form-control-label">Mobile</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" name="phone-ad" id="inputPhone1" placeholder="Mobile">
					    </div>
					  </div>
					  
					  <div class="form-group row">
					    <label for="inputPassword3" class="col-sm-2 form-control-label">Password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" name="Password-ad" id="inputPassword1" placeholder="Password">
					    </div>
					  </div>
  
				       <h3 class="page-header">Terms and Conditions</h3>
				    <p><input type="checkbox" name="TandC-ad" value="Yes"/> I have read Just4Backpackers Terms and Conditions and fully understand what they entail. <a href="#" title="" >Terms and Conditions</a></p>
				 
				 <h3 class="page-header">Subscription Type</h3>
				 <label>What type of subscription would you like?</label>
				 
				 <p>You do not have to pay for this service straight away. Try it for 3 months free of charge. You may get more advertisements and less features but you should still be delighted with what the basic package offers.</p>
				 
				  <p><input type="radio" name="Term-ad" value="3" class="freeSub"/> $0 for 3 months </p>
				  <p><input type="radio" name="Term-ad" value="6" class="Paidsub"/> $30 for 6 months </p>
				  <p><input type="radio" name="Term-ad" value="12" class="Paidsub"/> $60 for 12 months </p>
				
				
				<div class="Payment">
				     <h3 class="page-header">Payment Details</h3>
				     <label for="card-element-ad">
				      Credit or debit card
				    </label>
				    <p>TESTING - use card number 4242424242424242 to test payment, you can make up the rest.</p>
				    <div id="card-element-ad">
				      <!-- a Stripe Element will be inserted here. -->
				    </div>
				
				<div id="card-errors-ad" role="alert"></div>
				</div>
				  <input   type="submit" class=" form-control submitAd btn btn-primary"  value="Sign up">

           </form>
        </div><!-- close the SignUp-ad div-->
     </nav> 
