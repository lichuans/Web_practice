<html>
<body>
<center>
<link rel="stylesheet" href="css/index.css?v={<?php echo time()?>}"> 

<div class="top-box">
<div class="heading"><h1>Order List</h1></div>
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

if($_SESSION['assigned_cafe']=='lazenbys'){
$today=date('Y-m-d');
$query = "SELECT * FROM `tb_cart` WHERE `paid`='Y' and `assigned_cafe`='lazenbys' and `ordered_datetime`= '$today' and `pick_status`='pending' ORDER BY cart_id DESC";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
if($row['cart_id']=="")
   {
echo "<br>";
echo "<div class='reminder'>";
echo "<h2>No pending order today in Lazenbys.</h2>";
echo "</div>";
   }
else {


echo "<table border='1' id='table-1'>
<div class='reminder'><h2>The Lazenbys Pending Order</h2></div>
<tr>
<th>Order ID</th>
<th>Customer ID</th>
<th>Order Pick Time</th>
<th>Order Detail</th>
<th>Order Status</th>
<th>Operation</th>
</tr>";
$today=date('Y-m-d');
$query = "SELECT * FROM `tb_cart` WHERE `paid`='Y' and `assigned_cafe`='lazenbys' and `ordered_datetime`= '$today' and `pick_status`='pending' ORDER BY cart_id DESC";
$result = $mysqli->query($query);
while ($row = $result->fetch_array(MYSQLI_ASSOC)){
$cart_id=$row['cart_id'];
$cust_id=$row['cust_id'];
$mealtime=$row['meal_time'];		
$pick_status=$row['pick_status'];	

echo "<tr>";
echo "<td>" . $cart_id . "</td>";
echo "<td>" . $cust_id . "</td>";
echo "<td>" . $mealtime . "</td>";
echo "<td id='function'>";
echo "<form action='order_detail.php' name='' method='post'>";
echo "<input type='hidden' name='cart_id' value='$cart_id'>";
echo "<input type='submit' name='edit' value='Order Detail'>";
echo "</form>";
echo "</td>";
echo "<td>" . $pick_status . "</td>";
echo "<td id='function'>";
echo "<form action='' name='' method='post'>";
echo "<input type='hidden' name='cart_id' value='$cart_id'>";
echo "<input type='submit' name='pick' value='Pick'>";
echo "</form>";
echo "</td>";
echo "</tr>";
}
echo "</table>";
}







$today=date('Y-m-d');
$query = "SELECT * FROM `tb_cart` WHERE `paid`='Y' and `assigned_cafe`='lazenbys' and `ordered_datetime`= '$today' and `pick_status`='picked' ORDER BY cart_id DESC";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
if($row['cart_id']=="")
   {
echo "<br>";
echo "<div class='reminder'>";
echo "<h2>No order picked in Lazenbys.</h2>";
echo "</div>";
   }
else {


echo "<table border='1' id='table-1'>
<br><br><br>
<div class='reminder'><h2>Picked Order Today</h2></div>
<tr>
<th>Order ID</th>
<th>Customer ID</th>
<th>Order Pick Time</th>
<th>Order Detail</th>
<th>Order Status</th>

</tr>";
$today=date('Y-m-d');
$query = "SELECT * FROM `tb_cart` WHERE `paid`='Y' and `assigned_cafe`='lazenbys' and `ordered_datetime`= '$today'and `pick_status`='picked' ORDER BY cart_id DESC";
$result = $mysqli->query($query);
while ($row = $result->fetch_array(MYSQLI_ASSOC)){
$cart_id=$row['cart_id'];
$cust_id=$row['cust_id'];
$mealtime=$row['meal_time'];		
$pick_status=$row['pick_status'];	

echo "<tr>";
echo "<td>" . $cart_id . "</td>";
echo "<td>" . $cust_id . "</td>";
echo "<td>" . $mealtime . "</td>";
echo "<td id='function'>";
echo "<form action='order_detail.php' name='' method='post'>";
echo "<input type='hidden' name='cart_id' value='$cart_id'>";
echo "<input type='submit' name='edit' value='Order Detail'>";
echo "</form>";
echo "</td>";
echo "<td>" . $pick_status . "</td>";
echo "</tr>";
}
echo "</table>";
}
}











if($_SESSION['assigned_cafe']=='ref'){
$today=date('Y-m-d');
$query = "SELECT * FROM `tb_cart` WHERE `paid`='Y' and `assigned_cafe`='ref' and `ordered_datetime`= '$today' and `pick_status`='pending' ORDER BY cart_id DESC";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
if($row['cart_id']=="")
   {
echo "<br>";
echo "<div class='reminder'>";
echo "<h2>No pending order today in Ref.</h2>";
echo "</div>";
   }
else {


echo "<table border='1' id='table-1'>
<div class='reminder'><h2>The Ref Pending Order</h2></div>
<tr>
<th>Order ID</th>
<th>Customer ID</th>
<th>Order Pick Time</th>
<th>Order Detail</th>
<th>Order Status</th>
<th>Operation</th>
</tr>";
$today=date('Y-m-d');
$query = "SELECT * FROM `tb_cart` WHERE `paid`='Y' and `assigned_cafe`='ref' and `ordered_datetime`= '$today' and `pick_status`='pending' ORDER BY cart_id DESC";
$result = $mysqli->query($query);
while ($row = $result->fetch_array(MYSQLI_ASSOC)){
$cart_id=$row['cart_id'];
$cust_id=$row['cust_id'];
$mealtime=$row['meal_time'];		
$pick_status=$row['pick_status'];	

echo "<tr>";
echo "<td>" . $cart_id . "</td>";
echo "<td>" . $cust_id . "</td>";
echo "<td>" . $mealtime . "</td>";
echo "<td id='function'>";
echo "<form action='order_detail.php' name='' method='post'>";
echo "<input type='hidden' name='cart_id' value='$cart_id'>";
echo "<input type='submit' name='edit' value='Order Detail'>";
echo "</form>";
echo "</td>";
echo "<td>" . $pick_status . "</td>";
echo "<td id='function'>";
echo "<form action='' name='' method='post'>";
echo "<input type='hidden' name='cart_id' value='$cart_id'>";
echo "<input type='submit' name='pick' value='Pick'>";
echo "</form>";
echo "</td>";
echo "</tr>";
}
echo "</table>";
}







$today=date('Y-m-d');
$query = "SELECT * FROM `tb_cart` WHERE `paid`='Y' and `assigned_cafe`='ref' and `ordered_datetime`= '$today' and `pick_status`='picked' ORDER BY cart_id DESC";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
if($row['cart_id']=="")
   {
echo "<br>";
echo "<div class='reminder'>";
echo "<h2>No order picked in Ref.</h2>";
echo "</div>";
   }
else {


echo "<table border='1' id='table-1'>
<br><br><br>
<div class='reminder'><h2>Picked Order Today</h2></div>
<tr>
<th>Order ID</th>
<th>Customer ID</th>
<th>Order Pick Time</th>
<th>Order Detail</th>
<th>Order Status</th>

</tr>";
$today=date('Y-m-d');
$query = "SELECT * FROM `tb_cart` WHERE `paid`='Y' and `assigned_cafe`='ref' and `ordered_datetime`= '$today'and `pick_status`='picked' ORDER BY cart_id DESC";
$result = $mysqli->query($query);
while ($row = $result->fetch_array(MYSQLI_ASSOC)){
$cart_id=$row['cart_id'];
$cust_id=$row['cust_id'];
$mealtime=$row['meal_time'];		
$pick_status=$row['pick_status'];	

echo "<tr>";
echo "<td>" . $cart_id . "</td>";
echo "<td>" . $cust_id . "</td>";
echo "<td>" . $mealtime . "</td>";
echo "<td id='function'>";
echo "<form action='order_detail.php' name='' method='post'>";
echo "<input type='hidden' name='cart_id' value='$cart_id'>";
echo "<input type='submit' name='edit' value='Order Detail'>";
echo "</form>";
echo "</td>";
echo "<td>" . $pick_status . "</td>";
echo "</tr>";
}
echo "</table>";
}

}





if($_SESSION['assigned_cafe']=='tradetable'){

$today=date('Y-m-d');
$query = "SELECT * FROM `tb_cart` WHERE `paid`='Y' and `assigned_cafe`='tradetable' and `ordered_datetime`= '$today' and `pick_status`='pending' ORDER BY cart_id DESC";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
if($row['cart_id']=="")
   {
echo "<br>";
echo "<div class='reminder'>";
echo "<h2>No pending order today in the Trade Table.</h2>";
echo "</div>";
   }
else {


echo "<table border='1' id='table-1'>
<div class='reminder'><h2>The Trade Table Pending Order</h2></div>
<tr>
<th>Order ID</th>
<th>Customer ID</th>
<th>Order Pick Time</th>
<th>Order Detail</th>
<th>Order Status</th>
<th>Operation</th>
</tr>";
$today=date('Y-m-d');
$query = "SELECT * FROM `tb_cart` WHERE `paid`='Y' and `assigned_cafe`='tradetable' and `ordered_datetime`= '$today' and `pick_status`='pending' ORDER BY cart_id DESC";
$result = $mysqli->query($query);
while ($row = $result->fetch_array(MYSQLI_ASSOC)){
$cart_id=$row['cart_id'];
$cust_id=$row['cust_id'];
$mealtime=$row['meal_time'];		
$pick_status=$row['pick_status'];	

echo "<tr>";
echo "<td>" . $cart_id . "</td>";
echo "<td>" . $cust_id . "</td>";
echo "<td>" . $mealtime . "</td>";
echo "<td id='function'>";
echo "<form action='order_detail.php' name='' method='post'>";
echo "<input type='hidden' name='cart_id' value='$cart_id'>";
echo "<input type='submit' name='edit' value='Order Detail'>";
echo "</form>";
echo "</td>";
echo "<td>" . $pick_status . "</td>";
echo "<td id='function'>";
echo "<form action='' name='' method='post'>";
echo "<input type='hidden' name='cart_id' value='$cart_id'>";
echo "<input type='submit' name='pick' value='Pick'>";
echo "</form>";
echo "</td>";
echo "</tr>";
}
echo "</table>";
}







$today=date('Y-m-d');
$query = "SELECT * FROM `tb_cart` WHERE `paid`='Y' and `assigned_cafe`='tradetable' and `ordered_datetime`= '$today' and `pick_status`='picked' ORDER BY cart_id DESC";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
if($row['cart_id']=="")
   {
echo "<br>";
echo "<div class='reminder'>";
echo "<h2>No order picked in the Trade Table.</h2>";
echo "</div>";
   }
else {


echo "<table border='1' id='table-1'>
<br><br><br>
<div class='reminder'><h2>Picked Order Today</h2></div>
<tr>
<th>Order ID</th>
<th>Customer ID</th>
<th>Order Pick Time</th>
<th>Order Detail</th>
<th>Order Status</th>

</tr>";
$today=date('Y-m-d');
$query = "SELECT * FROM `tb_cart` WHERE `paid`='Y' and `assigned_cafe`='tradetable' and `ordered_datetime`= '$today'and `pick_status`='picked' ORDER BY cart_id DESC";
$result = $mysqli->query($query);
while ($row = $result->fetch_array(MYSQLI_ASSOC)){
$cart_id=$row['cart_id'];
$cust_id=$row['cust_id'];
$mealtime=$row['meal_time'];		
$pick_status=$row['pick_status'];	

echo "<tr>";
echo "<td>" . $cart_id . "</td>";
echo "<td>" . $cust_id . "</td>";
echo "<td>" . $mealtime . "</td>";
echo "<td id='function'>";
echo "<form action='order_detail.php' name='' method='post'>";
echo "<input type='hidden' name='cart_id' value='$cart_id'>";
echo "<input type='submit' name='edit' value='Order Detail'>";
echo "</form>";
echo "</td>";
echo "<td>" . $pick_status . "</td>";
echo "</tr>";
}
echo "</table>";
}
}
?>




<?php
if(isset($_POST['pick']))
{
$cart_id = $_POST['cart_id'];
$query = "UPDATE `tb_cart` SET `pick_status`='picked' WHERE `cart_id`='$cart_id'";
echo"$query"; 
$mysqli ->query($query); 
header("location:order_list.php");
}
?>


</center>
</body>
</html>