<?php
	include('db_conn.php');
		
	//get the q parameter from URL
	$city=$_REQUEST['city'];
	$city=trim($city);
	$query = "SELECT * FROM countries WHERE `City` LIKE '$city'";
  $result = $mysqli->query($query);
	$row = $result->fetch_array(MYSQLI_ASSOC);

		// $row is the array, which key(index) is a column name of the table since we used 
		// MYSQLI_ASSOC. To print out the value of the array, we should echo $array['ket name']
		echo $row['Population']; 
?> 