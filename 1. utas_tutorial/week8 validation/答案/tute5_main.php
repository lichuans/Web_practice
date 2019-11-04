<html>
<body>
<center>
<h2>Products Management</h2>
</center>
<?php
//use session
include('session.php');
//the file for database connection
include('db_conn.php');

//if the 'sign in' submit button 
if(isset($_POST['signin']))
{
  $user=$_POST['username'];
  $password=$_POST['password'];
  
  $query = "SELECT * FROM users WHERE username='$user'";

  $result = $mysqli->query($query);

  $row=$result->fetch_array(MYSQLI_ASSOC);

if($row['username']!=$user || $user=="")
{
header('Location: ./tute5_main.php?error=invalid_username');
} 
else {
if($row['password']==$password) {

$session_user=$row['username'];
$_SESSION['user']=$session_user;
$_SESSION['access']=$row['access'];

header('Location: ./tute5_main.php');
} 
else{

header('Location: ./tute5_main.php?error=invalid_password');}
{echo " add your code about signin and set session variables";}
}
}
?>  
  
  




<?php
//if the user hasn't logged in
if($_SESSION['user']=="")
{

	//if there is any received error message
	if(isset($_GET['error']))
	{
		$errormessage=$_GET['error'];
		//show error message using javascript alert
		echo "<h2>Invalid username or password.</h2>";
	}
?>




	<!--show the following login form if the user hasn't logged in-->
	<h2>Please login to the system</h2>
	
 	<form method='post'>
		<table>
			<tr>
				<td>Username :</td><td><input type='text' name='username'></td>
			</tr>
			<tr>
				<td>Password :</td><td><input type='password' name='password'></td>
				<td><input type='submit' name='signin' value='Sign In'>
			</tr>     
			<tr>
				<!--go to Sign Up form-->
				<td><a href='signup.php'>Sign Up</a></td>
			</tr>
   		</table>
		</form>







<?php		
}
else{ //if the user has logged in
     //add errormessage
	//show welcome username
	echo "<h3>Welcome ".$_SESSION['user'];	
?>	


<a href="logout.php">Logout</a>
<form action="tute5_insert.php">
<input type="submit" value="Insert">
</form>
<form  action="tute5_update.php">
<input type="submit" value="Update">
</form>
<form  action="tute5_delete.php">
<input type="submit" value="Delete">
</form>
<form action="tute5_search.php">
<input type="submit" value="Search">
</form>
	
	
<?php
	}
?>




</body>
</html>