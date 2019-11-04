<?php
	$city = $_REQUEST['city'];
	$mysqli = mysqli_connect('localhost', 'mingzhuw', '481805', 'mingzhuw');
    $sql1 = "SELECT * FROM countries WHERE City='$city'";
    $result1 = mysqli_query($mysqli,$sql1);
	while($row2 = mysqli_fetch_row($result1)){
         echo $row2[3];
   }

?>