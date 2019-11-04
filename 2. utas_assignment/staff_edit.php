<html>
<center>
<link rel="stylesheet" href="css/index.css?v={<?php echo time()?>}"> 

<div class="top-box">
<div class="heading"><h1>Staff Edit Page</h1></div>
</div>

<div class="tablepages">
<table>
<tr>
     <th><a href="staff_list.php" class="am-icon-sort-desc">Back to Staff List</a></th>
     <th><a href="logout.php" class="logout">Logout</a></th>    
</tr>
</table>
</div>

<?php 
include('db_conn.php'); 
include('session.php'); 
$cart_id=$_SESSION['cart_id'];
$ID=$_POST['id'];
$query = "SELECT * FROM `cafeusers` WHERE ID = $ID";

$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
$Username=$row['Username'];
$role=$row['role'];
$assigned_cafe=$row['assigned_cafe'];
?>

<body>
<br>
<form action="" method="POST" id="form">
<input type="hidden" name="id" value="<?php echo $ID;?>"  />
<table id='table-1' border='1'>
<tr>
<td>Name:</td>
<td><input type="text" name="username" value="<?php echo $Username;?>" disabled /></td>
</tr>

<tr>
<td>Choose a cafe:</td>
<td>
<select name="assigned_cafe">
<option value="">Please Select</option>
<option value="lazenbys" <?php if($assigned_cafe="lazenby") echo "selected"; ?>>Lazenbys</option>
<option value="ref" <?php if($assigned_cafe="ref") echo "selected"; ?>>The Ref</option>
<option value="tradetable" <?php if($assigned_cafe="tradetable") echo "selected"; ?>>The Trade Table</option>
</select>
</td>
</tr>
                        
<tr>
<td>Position: </td>
<td>
<select name="role">
<option value="">Please Select</option>
<option value="manager" <?php if($role="manager") echo "selected"; ?>>manager</option>
<option value="staff" <?php if($role="staff") echo "selected"; ?>>staff</option>
</select>
</td>
</tr>


<td><input class="submit" type="submit" name="submit" value="Submit" id="submit" /></td>


</table>
</form>




<?php
if(isset($_POST['submit'])){
 $assigned_cafe = $_POST['assigned_cafe'];
 $role = $_POST['role'];

$query = "UPDATE `cafeusers` SET `assigned_cafe`='$assigned_cafe', `role`='$role' WHERE `ID`='$ID'";
echo"$query";
$mysqli ->query($query); 
header("location:staff_list.php");
}
?>




</center>
</body>
</html>