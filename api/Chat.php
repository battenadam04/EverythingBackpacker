<?php
		session_start();
		$msg=Array();                     
		                    $perm=$_POST["perm"];
		                    $email=$_POST["Email"];
		                    $Fname=$_POST["Fname"];
		                    
		                    $_SESSION['recip-email'] = $email;
		                    $_SESSION['recip-fname'] = $Fname;
		                     
		                    $msg["email"]=$_SESSION['Email'];
		                    $msg["fname"]=$_SESSION['recip-fname'];
		                     
		                     
		                     if ($perm == "undefined")
		                     { 
			                     $msg["no"]= 1;
		                     }
	                        
		                    
		                    
		                    // when clicking on chat service through advert, determine if the user has permissions for chat service or if it is their own advert 
			                if((( $_SESSION['FNad']) == "1") || (( $_SESSION['FNad']) =="2"))
			                {
		                       $msg["no"]=2;
	                        }
	
	            
	                        if(((( $_SESSION['FNad']) == "3") || (( $_SESSION['FNad']) =="4")) &&  ($perm == "3" || $perm == "4" ))
	                        {
		                       $msg["no"]=3;
		                    }
		                    else
		                    {
			                    $msg["no"]=4;
		                    }
		                    
		                    if ($_SESSION['Email'] == $email)
		                     {  
			                     $msg["no"]= 5;
		                     }
		                    
		                
		                    echo json_encode($msg);                   
?>