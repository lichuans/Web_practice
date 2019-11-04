<!DOCTYPE html>
<html>
<body>
<center>
<h2>Search Product Details</h2>

<?php
include('db_conn.php'); //db connection

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
<tr><th><input type="submit" name="search" value="search"/>  <input type="reset" name="reset" value="reset"/></th></tr>
<tr><th><input type="button" name="back" value="Go back to Main" onclick="window.location.href='tute5_main.php'"/></th> </tr>
</table>
</form>


<?php
$ID = $_POST['ID'];
$query = "SELECT * FROM `KIT502_product` WHERE `ID`='$ID'";
$result = $mysqli->query($query);

while($row = $result->fetch_assoc())
{
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Price</th>
<th>Description</th>
</tr>";
echo "<tr>";
echo "<td>" . $row['ID'] . "</td>";
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['Price'] . "</td>";
echo "<td>" . $row['Description'] . "</td>";
echo "</tr>";
}
echo "</table>";
?>


</center>
</body>
</html>