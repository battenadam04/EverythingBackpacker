<?php  
     session_start();
	// db connection
	include "connect.php";

	$data=Array();
	$SubEnd=Array();

	$sql="SELECT * FROM backpacker WHERE Email = '".$_SESSION['Email']."';";
        $sql.="SELECT * FROM Advertiser WHERE Email = '".$_SESSION['Email']."'";


     // make sure new users email address doesn't already exist in database
	 if (mysqli_multi_query($mysqli,$sql))
	 {
      do{
         if ($result=mysqli_store_result($mysqli)){
            while ($row = $result->fetch_array(MYSQLI_ASSOC)){
               
               
               //printf("%s\n",$row["Joined"]);
               
               array_push($data, $row);
               
               $Term=$row["Term"]."months";
               //$date=$row["Joined"];
               //$Date=date_create($date);
              
               //date_add($Date,date_interval_create_from_date_string($Term));
               //$newdate= date_format($Date,"Y-m-d");
               
               
               //$SubEnd["EndDate"]=$newdate;
            // $data["EndDate"][]=$newdate;
            
                 	
            }
            mysqli_free_result($result);
         }
         
        
          } while (mysqli_next_result($mysqli));
   }



mysqli_close($mysqli);
	// echo data as json
	echo json_encode($data);
?>