<?php

session_start();
//if the session for username has not been set, initialise it
if(!isset($_SESSION['id'])){
		$_SESSION['id']="";
}

if(!isset($_SESSION['checkout'])){
		$_SESSION['checkout']="";
}

//save username in the session 
$session_id=$_SESSION['id'];
$session_checkout=$_SESSION['checkout'];

?>