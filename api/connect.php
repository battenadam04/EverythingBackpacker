<?php

   //database connection
   $mysqli = new mysqli("localhost", "root", "", "EverythingBackpacker");
   //$mysqli = new mysqli("adambatten.com.mysql","adambatten_com", "jcpg9hnZ","adambatten_com");

   if (mysqli_connect_errno()) 
   {
	printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
   }

?>