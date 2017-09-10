<?php
	 	// db connection
	include "connect.php";
	session_start();

	
	$IDad="";
	$ID="";
	$errflag = true;
    $data=false;
    $error=Array();
	
	 if (empty($_POST["IDad"])) 
   {
     $errflag=false;
   } 
   
   else 
   {
     $IDad = test_input($_POST["IDad"]);
     $data=true;
   }
    
    if (empty($_POST["ID"])) 
   {
     $errflag=false;
   } 
   
   else 
   {
     $ID = test_input($_POST["ID"]);
     $data=true;
   }


 
    function test_input($data1) 
  {
  $data1 = trim($data1);
  $data1 = stripslashes($data1);
  $data1 = htmlspecialchars($data1);
  return $data1;
  }
  

  if($errflag == true)
  {
	  
	  //delete the job advertisement where the column name IDad is equal to the users IDad
     $query ="DELETE FROM Jobs WHERE IDad = '".$IDad."' AND ID = '".$ID."'";

	          if (!mysqli_query($mysqli,$query))
 	           {
 		          die('Error: ' . mysqli_error($mysqli));	
 	           }

 	             $error[]=true;
 	             
   }
 	             
echo json_encode($error);
mysqli_close($mysqli);

	

?>