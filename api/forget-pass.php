<?php


require('connect.php');


$Email=$_POST["Email"];

$errflag = true;
$data=false;
$error=Array();

// run mutliple queries to check for User Email in both tables
$sql="SELECT * FROM backpacker WHERE Email = '".$Email."';";
$sql.="SELECT * FROM Advertiser WHERE Email = '".$Email."'";


     //once email address is validated in query then create an email and send to user with their current password
	 if (mysqli_multi_query($mysqli,$sql))
	 {
      do{
         if ($result=mysqli_store_result($mysqli))
         {
            while ($row=mysqli_fetch_row($result))
            {

               	$errors[] ="Success";
               	$msg="";
                $from_add = "ab@adambatten.com"; 
                $to_add = $Email; //<-- put your email address here
                $subject = "Password reminder";
                $name=$row[1];
                $msg1= $_POST="This is a reminder for your password. If you did not ask for this then ignore this email. Your current password is'".$row[5]."'";
                $message ="$name \r\n $email \r\n\r\n $msg1 ";
	            $headers = "From: $from_add \r\n";
	            $headers .= "Reply-To: $from_add \r\n";
	            $headers .= "Return-Path: $from_add\r\n";
	            $headers .= "X-Mailer: PHP \r\n";
	
	            if(mail($to_add,$subject,$message,$headers)) 
	            {
		          $msg = "success";
	            } 
	
	            else 
	            {
 	              $errors[] ="sending email failed";
 	            }
           }
           
            mysqli_free_result($result);
         }
         
       }
     
         while (mysqli_next_result($mysqli));
    } //close if mysqli mutli query

     else
     {
	   $errors[] = 'email address and password not found.';
	 }
         
echo json_encode($errors);// echo data to be used in AJAX through JSON

mysqli_close($mysqli);
?>