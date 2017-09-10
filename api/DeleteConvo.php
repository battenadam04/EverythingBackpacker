<?php

  
    $data=$_POST["data"];
    $error="";
    
    if (file_exists($data))
    {
	   unlink($data); // use unlink to delete the file with filename found in $data
           
          if(empty($_SESSION['recip-email']))
          {
	           $error= "true";
          }
          
          else
          {
	          $error= "false";
          }
            
	    echo $error;
	    
	  
    }

?>