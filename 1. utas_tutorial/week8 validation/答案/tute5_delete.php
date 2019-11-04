<html>
<body>

<center>
<h2>Delete Product Details</h2>
</center>
<?php
include('db_conn.php'); //db connection
include('session.php');  

if($_SESSION['access']==1)
{
if(isset($_POST['delete']))
{
    $query = "DELETE FROM KIT202_product  
    WHERE ID='$_POST[id]';";
    $result = $mysqli->query($query);
}
	$query="SELECT * FROM `KIT202_product`";
	//execute the query
	
	$result=$mysqli->query($query);
	
	//opening table tag
	echo "<table border=1>";
	
	echo "<tr><th>ID</th><th>Name</th><th>Price</th><th>Description</th></tr>";

	//result should be converted to the associative array. It is one row 
	
	
	while($row=$result->fetch_array(MYSQLI_ASSOC))
{
	$id=$row['ID'];
	$name=$row['Name'];
	$price=$row['Price'];
	$description=$row['Description'];
	
	
	//starting new row in the table
	echo "<tr>";
	
	echo "<td>$id</td>";
	echo "<td>$name</td>";
	echo "<td>$price</td>";
	echo "<td>$description</td>";
	
	//finishing the row in the table
	echo "</tr>";
}
	//closing table tag
	echo "</table>";


?>

<form action="" method="post">
ID: <input type="text" name="id" /><br />

<input type="submit" name="delete" value="delete" />
<input type="reset" name="reset" value="reset" />
</form>

<form action="tute5_main.php" >
<input type="submit" name="Go back to Main" value="Go back to Main" />
</form>

<?php
}
else
{
?>
Sorry , You have no access to do.
<form  action="tute5_main.php" >
<input type="submit" name="Go back to Main" value="Go back to Main" />
</form>

<?php
}
$mysqli->close();
?>


</body>
</html>