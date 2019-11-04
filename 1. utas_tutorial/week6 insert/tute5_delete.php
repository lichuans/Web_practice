<!DOCTYPE html>
<html>
<body>

<center>
<h2>Delete Product Details</h2>

<?php
include('db_conn.php'); 
$query = "SELECT * FROM KIT502_product";
$result = $mysqli->query($query);

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Price</th>
<th>Description</th>
</tr>";
while ($row = $result->fetch_array(MYSQLI_ASSOC))
{
echo "<tr>";
echo "<td>" . $row['ID'] . "</td>";
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['Price'] . "</td>";
echo "<td>" . $row['Description'] . "</td>";
echo "</tr>";
}
echo "</table>";
?>

<form method="post" action="">
<table>
<tr><th>ID: </th> <th><input type="number" name="ID"/></th></tr>
<tr><th><input type="submit" name="delete" value="delete"/>  <input type="reset" name="reset" value="reset"/></th></tr>
<tr><th><input type="button" name="back" value="Go back to Main" onclick="window.location.href='tute5_main.php'"/></th> </tr>
</table>
</form>

<?php
if (isset($_POST['delete'])){
$ID = $_POST['ID'];
$query = "DELETE FROM `KIT502_product` WHERE `ID`=$ID";
$mysqli ->query($query); 
header("location:tute5_delete.php");
}

$mysql_free_result($result);
$mysqli->close();
?>

</center>
</body>
</html>