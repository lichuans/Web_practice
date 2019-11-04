<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>k</title>
</head>

<body>

<!--show the following login form if the user hasn't logged in-->
<h2>Sign Up</h2>
	
<form method='post' action='signup.php'>
<table>
<tr><td>Username :</td><td><input type='text' name='username'></td><td>
<?php
if(isset($_GET['error1']))
{
$errormessage=$_GET['error1'];
//show error message using javascript alert
echo "Username has already existed, please change.";
}
?></td></tr>

<tr>
<td>Password :</td><td><input type='password' name='password' required></td><td>

<?php
if(isset($_GET['error2']))
{
$errormessage=$_GET['error2'];
//show error message using javascript alert
echo "Password is not same as typed above.";
}
?></td></tr>
<tr><td>Retype Password :</td><td><input type='password' name='retype'></td></tr>     
<tr>
<td><a href="tute5_main.php">Back to main page</a></td>
<td><div align="right"><input type='submit' name='signup' value='Sign Up' align="right"/></div></td></tr>
</table>
</form>



<?php
include("session.php");

include("db_conn.php");

if(isset($_POST['signup']))
{
  $user=$_POST['username'];
  $password=$_POST['password'];
  $retype=$_POST['retype'];
  $query = "SELECT * FROM users WHERE username='$user'";

  $result = $mysqli->query($query);

  $row=$result->fetch_array(MYSQLI_ASSOC);

if($row['username']!=$user || $user=="")
{
if($retype==$password) 
{

   $query="INSERT INTO users 
     (username, password, access)
   VALUES 
     ('$_POST[username]','$_POST[password]','2')";
  $result = $mysqli->query($query);

$session_user=$_POST['username'];
$_SESSION['user']=$session_user;
$_SESSION['access']=$row['access'];
header('Location:./tute5_main.php');
} 
else{

header('Location: ./signup.php?error2=Retype Password is not the same as Password');
}
}
else{
header('Location: ./signup.php?error1=Username has already existed');
}

}
?>  
</body>
</html>
