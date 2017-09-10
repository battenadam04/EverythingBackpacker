<?php
	session_start();

    $oldPass="";
    $newPass="";
    $errflag = true;
    $data=false;
    $error=Array();

  if (empty($_POST["oldPass"])) 
   {
     $errflag=false;
   } 
   
   else 
   {
     $oldPass = test_input($_POST["oldPass"]);
     $data=true;
   }
   
  if (empty($_POST["newPass"])) 
   {
     $errflag=false;
   } 
   
   else 
   {
     $newPass = test_input($_POST["newPass"]);
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
	
	$Email= $_SESSION["Email"];
	$table=Array();
			
	$sql="SELECT * FROM backpacker WHERE Password = '".$oldPass."' AND Email = '".$Email."';";
    $sql.="SELECT * FROM Advertiser WHERE Password = '".$oldPass."' AND Email = '".$Email."' ";

	 if (mysqli_multi_query($mysqli,$sql))
	 {
      do{
         if ($result=mysqli_store_result($mysqli))
         {
	         
	          if($result->num_rows === 0)
              {
                 $errflag = false;
              }	
    
              while ($row=mysqli_fetch_row($result))
              {
                $errflag = true;
               	$fieldinfo=mysqli_fetch_fields($result);

                 foreach ($fieldinfo as $val) 
                 {
                   $table[]=($val->table);
                 }
        
              }
            
            mysqli_free_result($result);
       }
    
     } while (mysqli_next_result($mysqli));
   }
 
    if ($errflag == true)
   {

         if ($table[0] == "Advertiser")
         {
	     // SQL Query

	        $query ="UPDATE Advertiser SET Password='".$newPass."' WHERE Email = '".$Email."'";

	          if (!mysqli_query($mysqli,$query))
 	           {
 		          die('Error: ' . mysqli_error($mysqli));	
 	           }

 	             $error[]=true;     
 	      }
 	      
 	      
 	      if($table[0] == "backpacker")
 	      {
	 	      
	 	      
	        $query ="UPDATE backpacker SET Password='".$newPass."' WHERE Email = '".$Email."'";

	          if (!mysqli_query($mysqli,$query))
 	           {
 		          die('Error: ' . mysqli_error($mysqli));	
 	           }

 	             $error[]=true;
  
 	      }
    }
  

    else
   {
      $error[]= false;
   }

echo json_encode($error);
mysqli_close($mysqli);

?>