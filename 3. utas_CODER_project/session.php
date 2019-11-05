<?php

session_start();
include("dba.php");
//if the session for username has not been set, initialise it
if(!isset($_SESSION['Username'])){
		$_SESSION['Username']="";
}

if(!isset($_SESSION['edit'])){
		$_SESSION['edit']="";
}

if(!isset($_SESSION['delete'])){
		$_SESSION['delete']="";
}




//save username in the session 
$session_username=$_SESSION['Username'];
$session_edit=$_SESSION['edit'];
$session_delete=$_SESSION['delete'];


?>