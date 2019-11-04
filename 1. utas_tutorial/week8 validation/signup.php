<html>
<body>
<center>

<h1>Sign Up</h1>
	
<form method='post' action=''>
<table>
 <tr>
    <td>Username :</td>
    <td><input type='text' name='username'required></td>
    <td>
    <?php
    if(isset($_GET['error1'])) {echo "Username has already existed.";}
    ?>
    </td>
 </tr>


<tr>
<td>Password :</td>
<td><input type='password' name='password' required></td>
</tr>



<tr>
    <td>Retype Password :</td>
    <td><input type='password' name='retype'required></td>
    <td>
    <?php
       if(isset($_GET['error2']))
       {$errormessage=$_GET['error2'];
       echo "Password is not same as typed above.";
       }
    ?>
    </td>
</tr>     



<tr>
    <td><a href="tute5_main.php">Back to main page</a></td>
    <td><div align="right"><input type='submit' name='signup' value='Sign Up'></div></td>
</tr>

</table>
</form>



<?php
session_start();
include("db_conn.php");

if(isset($_POST['signup']))
{
  $user=$_POST['username'];
  $password=$_POST['password'];
  $retype=$_POST['retype'];
  $query = "SELECT * FROM users WHERE username='$user'";
  $result = $mysqli->query($query);
  $row=$result->fetch_array(MYSQLI_ASSOC);


   if($row['username']!=$user)
   {
      if($retype==$password) 
      {
      $query="INSERT INTO users (username, password, access) VALUES ('$_POST[username]','$_POST[password]','2')";
      $result = $mysqli->query($query);

      $_SESSION['user']=$_POST['username'];
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

</center>
</body>
</html>
