<html>
<body>
<center>
<link rel="stylesheet" href="css/index.css?v={<?php echo time()?>}"> 

<div class="top-box">
<div class="heading"><h1>Order Collection Time Set</h1></div>
</div>

<div class="tablepages">
<table>
<tr>
<th><a href="my_order.php" class="am-icon-sort-asc">Back to Order List</a></th>
<th><a href="logout.php" class="logout">Logout</a></th>    
</tr>
</table>
</div>


<?php
session_start();
include('db_conn.php'); 
$cafe=$_SESSION['assigned_cafe'];
$query = "SELECT * FROM `cafe_time` WHERE `cafe`='$cafe'";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);

echo "<div class='opentime'>";
echo "<table border='1' >";

echo "<tr>";
echo "<th> The " . $cafe . "</th>";
echo "<th>Opening Time:</th>";
echo "<td>" . $row['open_time'] . "</td>";
echo "<th>Closing Time:</th>";
echo "<td>" . $row['close_time'] . "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
?>




<?php
$cart_id=$_POST['cart_id'];

?>
<div class="form-box">
<form action="" method="POST" id="form">
<input type="hidden" name="cart_id" value="<?php echo $cart_id;?>"  />
<table id='table-1' border='1'>
<tr>
<th>Order Pick Time: </th>
<th><input type="time" name="meal_time" step="900"  /></th>
<th><input type="submit" name="submit" value="Submit"></th>
</tr>
</table>
</form>
</div>
<?php


$cafe=$_SESSION['assigned_cafe'];

if(isset($_POST['submit'])){
$meal_time=$_POST['meal_time'];
$cart_id=$_POST['cart_id'];
$query = "SELECT * FROM `cafe_time` WHERE `cafe`= '$cafe'";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
$open_time=$row[open_time];
$close_time=$row[close_time];

$open_time = date("Y-m-d", time()). " " . $open_time. ":00";
$close_time = date("Y-m-d", time()). " " . $close_time. ":00";
$meal_time = trim($meal_time);
$meal_time = date("Y-m-d", time()). " " . $meal_time. ":00";
	
$opentime = strtotime($open_time);
$closetime = strtotime($close_time);
$mealtime = strtotime($meal_time);

$bg_min_time = 30*60;
$bg_max_time = 60*60;
$if_meal = $mealtime - $opentime - $bg_min_time;
$if_meal2 = $closetime - $mealtime - $bg_max_time;

if ($if_meal < 0) {
echo"<script>alert('Order Collection Time must be at least 30 minutes after Opening');</script>";
} 
else {		
if ($if_meal2 < 0) {
echo"<script>alert('Order Collection Time must be at least 60 minutes before closing.');</script>";
} 
else {
$data["meal_time"] = "'". trim($_POST["meal_time"]) ."'"; 
$query = "UPDATE `tb_cart` SET `meal_time`=  '$meal_time' WHERE `cart_id` = $cart_id";
$mysqli->query($query);	
header("location:my_order.php");
}
}
	
}
?>

</center>
</body>
</html>