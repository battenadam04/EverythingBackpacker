
<?php // Initialize variables to null.
$name =""; // Sender Name
$email =""; // Sender's email ID
$purpose =""; // Subject of mail
$message =""; // Sender's Message
$nameError ="";
$emailError ="";
$purposeError ="";
$messageError ="";
$JsonMsg=Array();
$successMessage =""; 
 

    if (empty($_POST["name"]))
    {
       $JsonMsg[]= "Name is required";
    }

    else
    {
       $name = test_input($_POST["name"]); // check name only contains letters and whitespace
         
         if (!preg_match("/^[a-zA-Z ]*$/",$name))
         {
            $JsonMsg[]="Only letters and white space allowed in Name";
         }
    }
 
 // Checking null values inthe message.
    
    if (empty($_POST["email"]))
    {
        $JsonMsg[]= "Email is required";
     
    }
    
    else
    {
        $email = test_input($_POST["email"]);
    } 


   if (empty($_POST["purpose"]))
   {
       $JsonMsg[]=  "Purpose is required";
    }

    else
   {
       $purpose = test_input($_POST["purpose"]);
   } 

   
   if (empty($_POST["message"]))
   {
       $JsonMsg[]=  "Message is required";
   }

    else
    {
       $message = test_input($_POST["message"]);
    } 




    if( !($name=='') && !($email=='') && !($purpose=='') &&!($message=='') )
    { // Checking valid email.
       if (preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
       {
           $header= $name."<". $email .">";
           $headers = "EverythingBackpacker.com"; /*  prepare the message for the e-mail */
           $msg = "Hello! $name Thank you...! For Contacting us.
           Name: $name
           E-mail: $email
           Purpose: $purpose
           Message: $message
           This is a Contact Confirmation mail. I Will contact You as soon as possible.";
           $msg1 = " $name Contacted Us. Here is some information about $name.
           Name: $name
           E-mail: $email
           Purpose: $purpose
           Message: $message "; /* Send the message using mail() function */
  
          if(mail($email, $headers, $msg ) && mail("adambatten@live.co.uk", $header, $msg1 ))
          {        
               $successMessage = "Message sent successfully.......";
               $JsonMsg[]= "Success";

          }
        }

        else
        { 
	        $emailError = "Invalid Email";
            $JsonMsg[]=$emailError;
         }
    }


// Function for filtering input values.

   function test_input($data)
   {
      $data = trim($data);
      $data =stripslashes($data);
      $data =htmlspecialchars($data);
      return $data;
   }

    echo json_encode($JsonMsg);

?>