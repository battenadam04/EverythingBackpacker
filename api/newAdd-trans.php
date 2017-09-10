<?php 

session_start();

    $Price="";
	$Make ="";
	$Model = "";
	$Year = "";
	$Description = "";
	$Location= "";
	$State="";
	$Fuel="";
	$KM="";
	$Email=$_SESSION['Email'];
    $errflag = true;
    $data=false;
    $error=Array();
    $sourcePath="";
    $targetPath="";


    if (empty($_FILES["Image"]["type"])) 
    {
      $error[] = "Image is required";
      $errflag=false;
    } 
    
    else 
    {
      $data=true;
    }
  

    if(empty($_POST["Price1"])) 
   {
     $error[] = "Price is required"; 
     $errflag=false;
   }
  
   else 
   {
     $Price = test_input($_POST["Price1"]);
     $data=true;
   }
  
   if(empty($_POST["Make1"])) 
   {
     $error[] = "Make required";
     $errflag=false;
   } 
  
   else 
   {
     $Make = test_input($_POST["Make1"]);
     $data=true;
   }
  
   if(empty($_POST["Model1"])) 
   {
     $error[] = "Model required";
     $errflag=false;
   } 
   
   else 
   {
     $Model = test_input($_POST["Model1"]);
     $data=true;
   }
  
   if(empty($_POST["Year1"])) 
   {
     $error[] = "Year required";
     $errflag=false;
   }
   
   else 
   {
    $Year = test_input($_POST["Year1"]);
    $data=true;
   }
  
   if(empty($_POST["Description1"])) 
  {
     $error[] = "Description required";
     $errflag=false;
  } 
  
  else 
  {
    $Description = test_input($_POST["Description1"]);
    $data=true;
  }
  
  if (empty($_POST["Location1"])) 
  {
     $error[] = "Location required";
     $errflag=false;
  }
  
  else 
  {
    $Location = test_input($_POST["Location1"]);
    $data=true;
  }
  
  if (empty($_POST["State1"])) 
  {
     $error[] = "State required";
     $errflag=false;
  } 
  
  else 
  {
    $State = test_input($_POST["State1"]);
    $data=true;
  }
  
  if (empty($_POST["Fuel1"])) 
  {
     $error[] = "Fuel required";
     $errflag=false;
  }
  
  else 
  {
    $Fuel = test_input($_POST["Fuel1"]);
    $data=true;
  }
  

  if (empty($_POST["KM1"])) 
  {
     $error[] = "KM required";
     $errflag=false;
  } 
  else
   {
    $KM = test_input($_POST["KM1"]);
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

      if(isset($_FILES["Image"]["type"]))
      {
          $validextensions = array("jpeg", "jpg", "png");
          $temporary = explode(".", $_FILES["Image"]["name"]);
          $file_extension = end($temporary);

              if ((($_FILES["Image"]["type"] == "image/png") || ($_FILES["Image"]["type"] == "image/jpg") || ($_FILES["Image"]["type"] == "image/jpeg")
) && ($_FILES["Image"]["size"] < 300000)//Approx. 300kb files can be uploaded.
&& in_array($file_extension, $validextensions)) 
              {

                if ($_FILES["Image"]["error"] > 0)
               {
                  $error[]= "Return Code: " . $_FILES["Image"]["error"] . "<br/><br/>";
                  $errflag=false;
               }
               
               else
               {
                  if (file_exists("../images/transport/" . $_FILES["Image"]["name"])) {
                  $error[]=$_FILES["Image"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
                  $errflag=false;
               }
      else
      {
	   
           $sourcePath = $_FILES['Image']['tmp_name']; // Storing source path of the file in a variable
           $targetPath = "../images/transport/".$Make $Email.".".$file_extension; // Target path where file is to be stored
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

	  $query ="INSERT INTO Transport (ID,Price,Make, Model,Year,Description, Location, State,Image, FuelType, KM, IDad) VALUES ('','".$Price."','".$Make."','".$Model."','".$Year."','".$Description."','".$Location."','".$State."','".$targetPath."','".$Fuel."','".$KM."','".$IDad."' )";

	
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