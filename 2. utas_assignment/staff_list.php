<html>
<body>
<center>
<link rel="stylesheet" href="css/index.css?v={<?php echo time()?>}"> 

<div class="top-box">
<div class="heading"><h1>Staff List</h1></div>
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
$query = "SELECT * FROM `cafeusers` WHERE role = 'staff' OR role = 'manager'";
$result = $mysqli->query($query);

echo "<table id='table-1' border='1'>
<tr>
<td>ID</td>
<td>Username</td>
<td>Email</td>
<td>Telephone</td>
<td>Role</td>
<td>Assigned Cafe</td>
<td>Operation</td>
</tr>";

while ($row = $result->fetch_array(MYSQLI_ASSOC)){
$ID=$row['ID'];
$Username=$row['Username'];
$Email=$row['Email'];
$Telephone=$row['Telephone'];
$role=$row['role'];
$assigned_cafe=$row['assigned_cafe'];


echo "<tr>";
echo "<td>" . $ID . "</td>";
echo "<td>" . $Username . "</td>";
echo "<td>" . $Email . "</td>";
echo "<td>" . $Telephone . "</td>";
echo "<td>" . $role . "</td>";
echo "<td>" . $assigned_cafe . "</td>";

echo "<td id='function' colspan='4'>";
echo "<form action='staff_edit.php' name='' method='post'>";
echo "<input type='hidden' name='id' value='$ID'>";
echo "<input type='submit' name='edit' value='edit'>";
echo "</form>";
echo "</td>";
echo "</tr>";
}
echo "</table>";

echo "<form action='creat_staff.php' name='' method='post'>";
echo "<input type='submit' name='creat' value='Register more Staff'>";
echo "</form>";

?>

</center>
</body>
</html>