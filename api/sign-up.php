<?php 

	$Term="";
	$Fname="";
	$Sname ="";
	$Email = "";
	$Phone = "";
	$Password = "";
	$permission= "0";
    $errflag = true;
    $data=false;
    $error=Array();

    if (empty($_POST["Fname"])) 
    {
     $error[] = "Name is required";
     $errflag=false;
    } 
    
    else 
    {
     $Fname = test_input($_POST["Fname"]);
     $data=true;
    }
   
    if (empty($_POST["Sname"])) 
   {
     $error[] = "Surname required";
     $errflag=false;
   } 
   
   else 
   {
     $Sname = test_input($_POST["Sname"]);
     $data=true;
   }
  
   if (empty($_POST["Email"])) 
   {
     $error[] = "Email required";
     $errflag=false;
   } 
   
   else
    {
     $Email = test_input($_POST["Email"]);
     $data=true;
    }
  
   if (empty($_POST["Phone"])) 
   {
     $error[] = "Phone required";
     $errflag=false;
   } 
   else
   {
     $Phone = test_input($_POST["Phone"]);
     $data=true;
   }
  
   if (empty($_POST["Password"])) 
   {
     $error[] = "Password required";
     $errflag=false;
   }
   
   else 
   {
     $Password = test_input($_POST["Password"]);
     $data=true;
   }
  

   if (isset($_POST['Term'])) 
   {
	 $Term = test_input($_POST["Term"]);
     $data=true;  
   } 
 
  else 
   {
     $error[] = "A subscription is required";
     $errflag=false;
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
	
	
		$sql="SELECT * FROM backpacker WHERE Email = '".$Email."';";
        $sql.="SELECT * FROM Advertiser WHERE Email = '".$Email."'";

	
	    // make sure new users email address doesn't already exist in database
	 if (mysqli_multi_query($mysqli,$sql))
	 {
      do{
         if ($result=mysqli_store_result($mysqli)){
            while ($row=mysqli_fetch_row($result)){
               //printf("%s\n",$row[3]);
               	//return array(true,$row);
               	$error[] ="This email already exists, try logging in";
               	    	$errflag = false;
                 	
            }
            mysqli_free_result($result);
         }
         
        
          } while (mysqli_next_result($mysqli));
   }


    // check what subscription was selected
    if ($Term == "3")
   {
      $permission ="1";
   }

   else
  {  
     $permission="3";
  }
	
	
	  $newterm=$Term . "months";
      $date=date("Y-m-d");
      $Date=date_create($date);
              
      date_add($Date,date_interval_create_from_date_string($newterm));
      $newdate= date_format($Date,"Y-m-d");
      
	
	if ($errflag == true)
    {

      $error[]="true";


	// SQL Query
	$query ="INSERT INTO backpacker (Permission,Fname, Sname, Email, Phone, Password, ID, Term, Joined,EndDate) VALUES ('".$permission."','".$Fname."','".$Sname."','".$Email."','".$Phone."','".$Password."','','".$Term."',NOW(),,'".$newdate."' )";

	
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