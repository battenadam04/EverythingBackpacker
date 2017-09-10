<?php
	
	
	$link=$_POST["link"];
	
	
            if(file_exists($link) && filesize($link) >= 0)
            {
             $handle = fopen($link, "r"); // open file
             $contents = fread($handle, filesize($link)); // read the contents
             fclose($handle); // close the connection 
             echo json_encode($contents); // echo the results through json to be displayed to user interface
            }
            
           
?>