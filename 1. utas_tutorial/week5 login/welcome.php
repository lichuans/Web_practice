<html>
<body>
<?php
 $mysqli=new mysqli("localhost","lichuans","492487","lichuans");
 
if (isset($_POST['submit'])){
 $user = $_POST['username'];
 $password = $_POST['password'];
 
 echo "you have successfully registered your account <br/>";
 echo "username:";
 echo "$user";
 echo "<br>";
 echo "password:";
 echo "$password";
 
 $insertquery = "INSERT INTO `users` (`username`, `password`) VALUES ('$user','$password')";
 $mysqli ->query($insertquery);
 echo mysql_error();
}
?>
</body>
</html>
