<html>
<body>
<center>
<link rel="stylesheet" href="css/index.css?v={<?php echo time()?>}"> 

<div class="top-box">
<div class="heading"><h1>Lazenbys Cafe</h1></div>
</div>

<div class="tablepages">
<table>
<tr>
<th><a href="index.php" class="am-icon-sort-asc">Login Now</a></th>
</tr>
</table>
</div>


<?php
session_start();
include('db_conn.php'); 
$query = "SELECT * FROM `cafe_time` WHERE `cafe`='lazenbys'";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);

echo "<div class='opentime'>";
echo "<table border='1' >";
echo "<tr>";
echo "<th>Opening Time:</th>";
echo "<td>" . $row['open_time'] . "</td>";
echo "<th>Closing Time:</th>";
echo "<td>" . $row['close_time'] . "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
?>

<?php
$query = "SELECT * FROM `foodlist` WHERE `lazenbys`=1";
$result = $mysqli->query($query);

echo "<table id='table-1' border='1'>
<tr>
<td>Food ID</td>
<td>Item</td>
<td>Picture</td>
<td>Price</td>
<td>Category</td>
</tr>";


while ($row = $result->fetch_array(MYSQLI_ASSOC)){
$foodid=$row['foodid'];
$item=$row['item'];
$price=$row['price'];
$category=$row['category'];

echo "<tr>";
echo "<td>" . $foodid . "</td>";
echo "<td>" . $item . "</td>";
echo "<td><img src='img/$foodid.jpg' width='70' height='70' /></td>";
echo "<td>" . $price . "</td>";
echo "<td>" . $category . "</td>";
echo "</tr>";
}
echo "</table>";
?>



</body>
</center>
</html>
