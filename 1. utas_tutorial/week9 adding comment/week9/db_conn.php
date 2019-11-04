<?php
//connect to mysql
$mysqli = new mysqli('localhost', 'lichuans', '492487', 'lichuans');

if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
?>