<html>
<body>
<center>
<link rel="stylesheet" href="css/index.css?v={<?php echo time()?>}"> 

<div class="top-box">
<div class="heading">
<h1>Master Food List</h1>
</div>
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
session_start();
include('db_conn.php'); 
$query = "SELECT * FROM foodlist";
$result = $mysqli->query($query);

echo "<br><table border='1' id='table-1'>
<tr>
<th>Food ID</th>
<th>Item</th>
<th>Price</th>
<th>Category</th>
<th>Picture</th>
</tr>";

while ($row = $result->fetch_array(MYSQLI_ASSOC)){
$foodid=$row['foodid'];
$item=$row['item'];
$price=$row['price'];
$category=$row['category'];
$url=$row['url'];

echo "<tr>";
echo "<td>" . $foodid . "</td>";
echo "<td>" . $item . "</td>";
echo "<td>" . $price . "</td>";
echo "<td>" . $category . "</td>";
echo "<td><img src='img/$foodid.jpg' width='70' height='70' /></td>";
echo "</tr>";
}
echo "</table>";





?>
<br>
<div class='reminder'>
<h2> Edit the Menu</h2>
</div>
<form method="post" action="">
<table id='table-1'>
<tr><th>Number: </th> <th><input type="text" name="number"/></th></tr>
<tr><th>Item:</th><th><input type="text" name="item"/></th></tr>
<tr><th>Price:</th><th><input type="text" name="Price"/></th></tr>
<tr><th>Category:</th>
<th>
<select name="category">
<option value="drink">drink</option>
<option value="food">food</option>
</select>  
</th>
</tr>
</table>
<tr><th><input type="submit" name="insert" value="insert"/></th></tr>
<tr><th><input type="submit" name="delete" value="delete"/></th></tr>
<tr><th><input type="submit" name="update" value="update"/></th></tr>
<tr><th><input type="submit" name="reset" value="reset"/></th></tr>

</form>


<?php
if (isset($_POST['delete'])){
$number = $_POST['number'];
$query = "DELETE FROM `foodlist` WHERE `foodid`=$number";
$mysqli ->query($query); 
header("location:ListPage.php");
}

if (isset($_POST['update'])){
 $number = $_POST['number'];
 $item = $_POST['item'];
 $Price = $_POST['Price'];
 $category = $_POST['category'];
 $url= $_POST['url'];

 
$query = "UPDATE `foodlist` SET `item`='$item', `price`='$Price', `category`='$category', `url`='$url' WHERE `foodid`='$number'";
echo"$query"; 
$mysqli ->query($query); 
header("location:ListPage.php");
}

if (isset($_POST['insert'])){
 $number = $_POST['number'];
 $item = $_POST['item'];
 $Price = $_POST['Price'];
 $category = $_POST['category'];
 $url= $_POST['url'];
 
$insertquery = "INSERT INTO `foodlist` (`foodid`, `item`, `Price`, `category`, `url`) VALUES ('$number','$item','$Price', '$category', '$url')";
echo"$insertquery";
$mysqli ->query($insertquery); 
header("location:ListPage.php");
}
?>




</center>
</body>
</html>

