<html>
<body>
<center>
<h2>Products Management</h2>



<?php
session_start();
include('db_conn.php');

if(isset($_POST['signin']))
{
  $user=$_POST['username'];
  $password=$_POST['password']; 

  $query = "SELECT * FROM users WHERE username='$user'";
  $result = $mysqli->query($query);
  $row=$result->fetch_array(MYSQLI_ASSOC);

if($row['username']!=$user || $user=="")
     {
     header('Location: ./tute5_main.php?error');
     }
 
else {
       if($row['password']==$password){
        $_SESSION['user']=$row['username']; 
        $_SESSION['access']=$row['access'];
       header('Location: ./tute5_main.php');} 

       else{
       header('Location: ./tute5_main.php?error');}
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
	     echo "<h2>Invalid username or password.</h2>";
             }

             ?>	
             <!--show the following login form if the user hasn't logged in-->
             <h2>Please login to the system</h2>
             <form method='post'>
             <table>
             <tr><td>Username :</td><td><input type='text' name='username'></td></tr>
             <tr>
             <td>Password :</td><td><input type='password' name='password'></td>
             <td><input type='submit' name='signin' value='Sign In'></td>
             </tr>     
             <tr><td><a href='signup.php'>Sign Up</a></td></tr>
             </table>
             </form>
             <?php		
    }
 


else{ 
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

</center>
</body>
</html>