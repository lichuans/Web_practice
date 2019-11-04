<?php

session_start();
include("db_conn.php");
//if the session for username has not been set, initialise it
if(!isset($_SESSION['id'])){
		$_SESSION['id']="";
}

if(!isset($_SESSION['edit'])){
		$_SESSION['edit']="";
}

if(!isset($_SESSION['delete'])){
		$_SESSION['delete']="";
}




//save username in the session 
$session_id=$_SESSION['id'];
$session_edit=$_SESSION['edit'];
$session_delete=$_SESSION['delete'];


?>