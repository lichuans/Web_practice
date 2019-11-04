<html>
<body>
<center>
<link rel="stylesheet" href="css/index.css?v={<?php echo time()?>}"> 

<div class="top-box">
<div class="heading"><h1>User Management</h1></div>
</div>

<div class="tablepages">
<table>
<tr>
<th><a href="index.php" class="am-icon-sort-asc">Home</a></th>
     <th><a href="logout.php" class="logout">Logout</a></th>    
</tr>
</table>
</div>

<?php
include('db_conn.php'); 
include('session.php'); 
$ID=$_SESSION['ID']; 

$query = "SELECT * FROM `cafeusers` WHERE ID = '$ID'";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
$Email=$row['Email'];
$Telephone=$row['Telephone'];

?>

<table id='table-1'>
<div class='reminder'>
<h2>Update Your Information</h2>
</div>
<form action="" id="form" method="post">
<tr>
<td>Password</td>
<td><input type="password" name="password" id="p1"></td>
</tr>

<tr>
<td>Retype Password</td>
<td><input type="password" name="repassword" id="p2"></td>
<td><input type="submit" name="updatepassword" value="Update Password"></td>
</tr>
</form>

<form action="" id="form2" method="post">
<tr>
<td>Mobile Number</td>
<td><input type="text" name="telephone"  value="<?php echo $Telephone;?>"></td>
<td><input type="submit" name="updatetelephone" value="Update Telephone"></td>
</tr>

<tr>
<td>Email</td>
<td><input type="text" name="Email" value="<?php echo $Email;?>"></td>
<td><input type="submit" name="updateemail" value="Update Email"></td>
</tr>

<tr>
<td>Most visit Cafe</td>
<td>
<select name="assigned_cafe">
<option value="lazenbys">Lazenbys</option>
<option value="ref">The ref</option>
<option value="tradetable">The tradetable</option>
</select> 
</td>
<td><input type="submit" name="updatecafe" value="Update Cafe"></td>
</tr>
</form>

</table>

<?php	


 if (isset($_POST['updatepassword'])){
$password = $_POST['password'];
  $encrypt_password=MD5($password); 
$query = "UPDATE `cafeusers` SET `password`='$encrypt_password' WHERE `ID`='$ID'";
$mysqli ->query($query); 
echo"<script>alert('Information Update successfully');</script>";
       }
 if (isset($_POST['updatetelephone'])){
$telephone = $_POST['telephone'];
$query = "UPDATE `cafeusers` SET `Telephone`='$telephone' WHERE `ID`='$ID'";
$mysqli ->query($query); 
header('Location: ./usermanage.php');
echo"<script>alert('Information Update successfully');</script>";
       }
 if (isset($_POST['updateemail'])){
$Email= $_POST['Email'];
$query = "UPDATE `cafeusers` SET `Email`='$Email' WHERE `ID`='$ID'";
$mysqli ->query($query); 
header('Location: ./usermanage.php');
echo"<script>alert('Information Update successfully');</script>";
       }
 if (isset($_POST['updatecafe'])){
$cafe = $_POST['assigned_cafe'];
$query = "UPDATE `cafeusers` SET `assigned_cafe`='$cafe' WHERE `ID`='$ID'";
$mysqli ->query($query); 
echo"<script>alert('Information Update successfully');</script>";
session_destroy();
header('Location: ./index.php');
       }

echo "<h3 style='font-size:17px;color:white;font-weight:bold;'>If you change your Cafe, you need to login again.";



?>
<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        var submit = $('#submit');        
        $('#form').submit(function() {
            var p1 = $('#p1').val();
            var p2 = $('#p2').val();
            if(p1 != p2) {
                alert('Two passwords are inconsistent');
                return false;
            }
           
            var reg1 = /[a-z]/;
            var reg2 = /[A-Z]/;
            var reg3 = /[~ ! # $]/;
            var reg4 = /[0-9]/;
            var len = p1.length;

            if(!reg1.test(p1)) {
                alert('Include at least one lowercase letter');
                return false;
            }
            if(!reg2.test(p1)) {
                alert('Include at least one uppercase letter');
                return false;
            }
            if(!reg3.test(p1)) {
                alert('Contains at least one special character');
                return false;
            }
            if(!reg4.test(p1)) {
                alert('Include at least one number');
                return false;
            }
            if(len < 6 || len > 12) {
                alert('6-12 characters in length');
                return false;
            }
            location.href="index.php";
        });
    </script>


</center>
</body>
</html>