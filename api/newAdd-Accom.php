<?php 

session_start();

    $Bond="";
    $Title="";
	$Wifi="";
	$Parking= "";
	$State= "";
	$Desc= "";
	$Location= "";
	$Email=$_SESSION['Email'];
    $errflag = true;
    $data=false;
    //$error=Array();
    $sourcePath="";
    $targetPath="";


   if(empty($_FILES["ImageAccom"]["type"])) 
   {
     $error[] = "Image is required"; 
     $errflag=false;
   } 
   
   else 
   {
    $data=true;
   }

   if (empty($_POST["Bond2"])) 
   {
     $error[] = "Bond is required"; 
     $errflag=false;
   } 
   
   else 
   {
    $Bond = test_input($_POST["Bond2"]);
    $data=true;
   }
   
   if(empty($_POST["Title2"])) 
  {
    $error[] = "Title is required";
    $errflag=false;
  }
  
  else 
  {
    $Title = test_input($_POST["Title2"]);
    $data=true;
  }
   
  if(empty($_POST["Wifi2"])) 
  {
    $error[] = "Wifi required";
    $errflag=false;
  } 
  
  else 
  {
    $Wifi = test_input($_POST["Wifi2"]);
    $data=true;
  }
  
  if (empty($_POST["Parking2"])) 
  {
    $error[] = "Parking required";
    $errflag=false;
  }
  
  else 
  {
    $Parking = test_input($_POST["Parking2"]);
    $data=true;
  }
  
  if(empty($_POST["State2"])) 
  {
    $error[] = "State required";
    $errflag=false;
  } 
  
  else 
  {
    $State = test_input($_POST["State2"]);
    $data=true;
  }
  
  if(empty($_POST["Description2"])) 
  {
    $error[] = "Description required";
    $errflag=false;
  } 
  else 
  {
    $Desc = test_input($_POST["Description2"]);
    $data=true;
  }
  
  if(empty($_POST["Location2"])) 
  {
    $error[] = "Location required";
    $errflag=false;
  } 
  
  else 
  {
    $Location = test_input($_POST["Location2"]);
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
     if(isset($_FILES["ImageAccom"]["type"]))
     {
       $validextensions = array("jpeg", "jpg", "png");
       $temporary = explode(".", $_FILES["ImageAccom"]["name"]);
       $file_extension = end($temporary);
       if ((($_FILES["ImageAccom"]["type"] == "image/png") || ($_FILES["ImageAccom"]["type"] == "image/jpg") || ($_FILES["ImageAccom"]["type"] == "image/jpeg")) && ($_FILES["ImageAccom"]["size"] < 300000)//Approx. 300kb files can be uploaded.
&& in_array($file_extension, $validextensions)){
	
     if($_FILES["ImageAccom"]["error"] > 0)
     {
       $error[]= "Return Code: " . $_FILES["ImageAccom"]["error"] . "<br/><br/>";
       $errflag=false;
     }

  else
 {
    if (file_exists("../images/accom/" . $_FILES["ImageAccom"]["name"])) 
    {
      $error[]=$_FILES["ImageAccom"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
      $errflag=false;
    }


     else
      {
	
        $sourcePath = $_FILES['Image']['tmp_name']; // Storing source path of the file in a variable
        $targetPath = "../images/accom/".$Email.".".$file_extension; // Target path where file is to be stored
        move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
        $data=true;
      }
  }
}


  else
 {
   $error[]= "<span id='invalid'>***Invalid file Size or Type***<span>";
   $errflag=false;
 }

}

 else
 {
   $error[]= "<span id='invalid'>***Invalid file Size or Type***<span>";
   $errflag=false;
 }
}


 $targetPath=substr($targetPath, 3);
	
    // db connection
	include "connect.php";
	
	$sql="SELECT IDad FROM Advertiser WHERE Email = '".$Email."'";

    $result = mysqli_query($mysqli, $sql);
    $IDad="2";

    if (!$result) 
    {
      echo "DB Error, could not query the database\n";
      echo 'MySQL Error: ' . mysqli_error();
      exit;
    }

    while ($row = mysqli_fetch_assoc($result)) 
    {
      $IDad=$row['IDad'];
    }
	
	if ($errflag == true)
   {
      $error[]="true";
	 
	    // SQL Query
	   $query ="INSERT INTO Accomodation (ID, Title, Description, Location, State, Image, Wifi, Parking,Bond, IDad) VALUES ('','".$Title."','".$Desc."','".$Location."','".$State."','".$targetPath."','".$Wifi."','".$Parking."','".$Bond."','".$IDad."' )";

	
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