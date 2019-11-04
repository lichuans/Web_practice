<!DOCTYPE html>
<html>
<body>
<center>
<h2>Insert Product Details</h2>

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
<tr><th>Name:</th><th><input type="text" name="Name"/></th></tr>
<tr><th>Price:</th><th><input type="text" name="Price"/></th></tr>
<tr><th>Description:</th> <th><input type="text" name="Description"/></th></tr>
<tr><th><input type="submit" name="insert" value="insert"/>  <input type="reset" name="reset" value="reset"/></th></tr>
<tr><th><input type="button" name="back" value="Go back to Main" onclick="window.location.href='tute5_main.php'"/></th> </tr>
</table>
</form>


<?php
if (isset($_POST['insert'])){
 $ID = $_POST['ID'];
 $Name = $_POST['Name'];
 $Price = $_POST['Price'];
 $Description = $_POST['Description'];
 
$insertquery = "INSERT INTO `KIT502_product` (`ID`, `Name`, `Price`, `Description`) VALUES ('$ID','$Name','$Price','$Description')";
 $mysqli ->query($insertquery); 
header("location:tute5_insert.php");
}

$mysql_free_result($result);
$mysqli->close();
?>

</center>
</body>
</html>