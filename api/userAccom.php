<?php  
     session_start();
	// db connection
	include "connect.php";

	// SQL Query
	$query = "SELECT * FROM Advertiser INNER JOIN Accomodation on Advertiser.IDad = Accomodation.IDad WHERE Advertiser.IDad = '".$_SESSION['ID']."'";

	// Run SQL query and save results
	$result = $mysqli->query($query);

	// Place sql result in data array
	$data = array();

	while( $row = $result->fetch_array(MYSQLI_ASSOC))
	{
		
		array_push($data, $row);
	}

	// echo data as json
	echo json_encode($data);
?>