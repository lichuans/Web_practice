<!DOCTYPE html>
<html>
<body>

<center>
<h2>Update Product Details</h2>

<?php
session_start();
include('db_conn.php');

if($_SESSION['access']==1)
{
$query = "SELECT * FROM KIT502_product ORDER BY ID ASC";
$result = $mysqli->query($query);

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Price</th>
<th>Description</th>
</tr>";

while($row = $result->fetch_assoc())
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
<tr><th><input type="submit" name="update" value="update"/>  <input type="reset" name="reset" value="reset"/></th></tr>
<tr><th><input type="button" name="back" value="Go back to Main" onclick="window.location.href='tute5_main.php'"/></th> </tr>
</table>
</form>
<?php

if (isset($_POST['update'])){
 $ID = $_POST['ID'];
 $Name = $_POST['Name'];
 $Price = $_POST['Price'];
 $Description = $_POST['Description'];
 
$query = "UPDATE `KIT502_product` SET `Name`='$Name', `Price`='$Price', `Description`='$Description' WHERE `ID`='$ID'";
 $mysqli ->query($query);
header("location:tute5_update.php"); 
}

$mysql_free_result($result);
$mysqli->close();



}
else
{

?>
Sorry , You have no access to do.
<form action="tute5_main.php" >
<input type="submit" name="Go back to Main" value="Go back to Main" />
</form>
<?php

}

?>


</center>
</body>
</html>