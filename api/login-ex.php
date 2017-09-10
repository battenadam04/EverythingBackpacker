<?php 
	
	session_start();

    require('connect.php');
 
    $Email=$_POST["Email"];
    $Password=$_POST["Password"];
	
	//VALIDATE USER LOGIN DETAILS ELSE ERROR
	function validate($mysqli,$Email = '',$Pass = '')
	{
		$errors = array();
		
		//CHECK IF USERNAME FIELD IS EMPTY
		if(empty($Email))
		{
			$errors[] = 'Enter your email address';
		}
		else
		{
			$e = mysqli_real_escape_string($mysqli,trim($Email));
		}
				
		//CHECK IF PASSWORD FIELD IS EMPTY
		if(empty($Pass))
		{
			$errors[] = 'Enter your password';
		}
		else
		{
			$p = mysqli_real_escape_string($mysqli,trim($Pass));
		}


    //STORE ERROR MESSAGE IF USERNAME AND PASSWORD ARE NOT FOUND
	if(empty($errors))
	{

	// SQL Query

	$query ="SELECT * FROM backpacker WHERE Email='".$Email."' and Password='".$Pass."';";
	$query .="SELECT * FROM Advertiser WHERE Email='".$Email."' and Password='".$Pass."'";
		
		
		 if (mysqli_multi_query($mysqli,$query))
		 {
           do{
               
               if ($result=mysqli_store_result($mysqli))
               {
                  while ($row=mysqli_fetch_array($result))
                  {
                     //printf("%s\n",$row[0]);
               	     return array(true,$row);
                  }
                     //mysqli_free_result($row);
               }
         
             }
          
              while (mysqli_next_result($mysqli));
         }

        
         else
         {
		    $errors[] = 'Username/email address and password not found.';
		 }
         
  
 	}//closing if empty errors
		return array(false,$errors);
	}//closing function
	
	
	list($check,$data) = validate($mysqli,$Email,$Password);	
 	$status = array();
 	
	if($check)
	{
	   $_SESSION['FN'] = $data['Fname'];
	   $_SESSION['FNad'] =$data['Permission'];
	   $_SESSION['Email'] =$data['Email'];
	   $_SESSION['ID'] =  $data['ID'];
	
		$message = array( 'Success');
		array_push($status, $message);			
	}
	
		
	else 
	{
		$message = array('username or password wrong');
	    array_push($status, $message);	
	}
		
	
echo json_encode($status);// echo data to be used in AJAX through JSON
mysqli_close($mysqli);

