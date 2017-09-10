<?php 

session_start();


  $Title="";
  $Description ="";
  $Employer = "";
  $Location = "";
  $State = "";
  $Visa= "";
  $Payrate="";
  $Email=$_SESSION['Email'];
  $errflag = true;
  $data=false;
  $error=Array();

   if (empty($_POST["Title"])) 
   {
     $error[] = "Title is required";
     $errflag=false;
   } 
  
  else
   {
     $Title = test_input($_POST["Title"]);
     $data=true;
   }
   
  if (empty($_POST["Desc"])) 
   {
     $error[] = "Description required";
     $errflag=false;
   } 
   
   else
   {
     $Description = test_input($_POST["Desc"]);
     $data=true;
   }
  
   if (empty($_POST["Employer"])) 
   {
     $error[] = "Employer required";
     $errflag=false;
   } 
   
  else 
  {
    $Employer = test_input($_POST["Employer"]);
    $data=true;
  }
  
  if (empty($_POST["Location"])) 
  {  
     $error[] = "location required";
     $errflag=false;
  } 
  
  else 
  {
    $Location = test_input($_POST["Location"]);
    $data=true;
  }
  
  if (empty($_POST["State"])) 
  {
     $error[] = "State required";
     $errflag=false;
  } 
  
  else 
  {
    $State = test_input($_POST["State"]);
    $data=true;
  }
  
  if (empty($_POST["Visa"])) 
  {
     $error[] = "Visa type required";
     $errflag=false;
  } 
  
  else 
  {
    $Visa = test_input($_POST["Visa"]);
    $data=true;
  }
  
  if (empty($_POST["Pay"])) 
  {
     $error[] = "Pay rate required";
     $errflag=false;
  }
  
   else 
  {
    $Payrate = test_input($_POST["Pay"]);
    $data=true;
  }
  

  
  function test_input($data1)
  {
  $data1 = trim($data1);
  $data1 = stripslashes($data1);
  $data1 = htmlspecialchars($data1);
  return $data1;
  }


	// db connection
	include "connect.php";
	
	$sql="SELECT IDad, Permission FROM Advertiser WHERE Email = '".$Email."'";
    $result = $mysqli->query($sql);

	// Place sql result in data array
	$IDadANDpermission = array();

	while( $row = $result->fetch_array(MYSQLI_ASSOC))
	{	
		array_push($IDadANDpermission, $row['IDad']);
		array_push($IDadANDpermission, $row['Permission']);
		//print_r($IDadANDpermission[0]);
	}

	if ($errflag == true)
    {
      $error[]="true";

	// SQL Query
	$query ="INSERT INTO Jobs (ID,Title,Description, Employer, Location, State, Visa, PayRate, IDad, Permission) VALUES ('','".$Title."','".$Employer."','".$Description."','".$Location."','".$State."','".$Visa."','".$Payrate."','".$IDadANDpermission[0]."','".$IDadANDpermission[1]."')";

	
	   if (!mysqli_query($mysqli,$query))
 	   {
 		  die('Error: ' . mysqli_error($mysqli));	
 	   }
   }
  

   else
   {
     $error[]= "Please complete these fields to continue";
   }

echo json_encode($error);// echo data to be used in AJAX through JSON
mysqli_close($mysqli);
?>