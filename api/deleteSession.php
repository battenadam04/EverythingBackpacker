<?php
        session_start();

           // need to remove this cookie-session so that it doesnt create new file in AllConvos.php when user clicks on Messages in Nav
           unset($_SESSION['recip-email']);
           
          if(empty($_SESSION['recip-email']))
          {
	           echo "true";
          }
          
          else
          {
	          echo"false";
          }
          

?>