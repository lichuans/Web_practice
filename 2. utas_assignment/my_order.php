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
$ID=$_SESSION['ID']; 
$today=date('Y-m-d');
$query = "SELECT * FROM `tb_cart` WHERE `paid`='Y' and `ordered_datetime`= '$today' and `cust_id`= '$ID'";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
if($row['cart_id']=="")
   {
echo "<br><br>";
echo "<div class='reminder'>";
echo "<h2>You have not ordered today.</h2>";
echo "</div>";
   }

else {

echo "<table border='1' id='table-1'>
<tr>
<th>Order ID</th>
<th>Paid Amount</th>
<th>Cafe Name</th>
<th>Order Pick Time</th>
<th>Operation</th>
<th>Order Detail</th>

</tr>";
$today=date('Y-m-d');
$query = "SELECT * FROM `tb_cart` WHERE `paid`='Y' and `ordered_datetime`= '$today' and `cust_id`= '$ID'ORDER BY cart_id DESC";
$result = $mysqli->query($query);
while ($row = $result->fetch_array(MYSQLI_ASSOC)){
$cart_id=$row['cart_id'];
$_SESSION['cart_id']=$cart_id;
$paid=$row['paid'];
$cafename=$row['assigned_cafe'];
$mealtime=$row['meal_time'];		
$total_price=$row['total_price'];	

echo "<tr>";
echo "<td>" . $cart_id . "</td>";
echo "<td>$" . $total_price . "</td>";
echo "<td>" . $cafename . "</td>";
echo "<td>" . $mealtime . "</td>";
echo "<td id='function'>";
echo "<form action='meal_time.php' name='' method='post'>";
echo "<input type='hidden' name='cart_id' value='$cart_id'>";
echo "<input type='submit' name='edit' value='Choose Order Pick Time'>";
echo "</form>";
echo "</td>";

echo "<td id='function'>";
echo "<form action='order_detail.php' name='' method='post'>";
echo "<input type='hidden' name='cart_id' value='$cart_id'>";
echo "<input type='submit' name='edit' value='Order Detail'>";
echo "</form>";
echo "</td>";
echo "</tr>";
}
echo "</table>";
}
?>







<?php
echo "<br><br><br><br>";
$ID=$_SESSION['ID']; 
$query = "SELECT * FROM `tb_cart` WHERE `paid`='Y' and `cust_id`= '$ID' ORDER BY cart_id DESC";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
if($row['cart_id']=="")
   {
echo "<br><br>";
echo "<div class='reminder'>";
echo "<h2>You have no order history.</h2>";
echo "</div>";
   }

else {
echo "<div class='reminder'>";
echo "<h1>Order History</h1>";
echo "</div>";
echo "<table border='1' id='table-1'>
<tr>
<th>Order ID</th>
<th>Paid Amount</th>
<th>Cafe Name</th>
<th>Order Date</th>
<th>Order Pick Time</th>
<th>Order Detail</th>

</tr>";
$today=date('Y-m-d');
$query = "SELECT * FROM `tb_cart` WHERE `paid`='Y' and `cust_id`= '$ID' ORDER BY cart_id DESC";
$result = $mysqli->query($query);
while ($row = $result->fetch_array(MYSQLI_ASSOC)){
$cart_id=$row['cart_id'];
$_SESSION['cart_id']=$cart_id;
$paid=$row['paid'];
$cafename=$row['assigned_cafe'];
$mealtime=$row['meal_time'];		
$total_price=$row['total_price'];	
$ordered_datetime=$row['ordered_datetime'];

echo "<tr>";
echo "<td>" . $cart_id . "</td>";
echo "<td>$" . $total_price . "</td>";
echo "<td>" . $cafename . "</td>";
echo "<td>" . $ordered_datetime . "</td>";
echo "<td>" . $mealtime . "</td>";

echo "<td id='function'>";
echo "<form action='order_detail.php' name='' method='post'>";
echo "<input type='hidden' name='cart_id' value='$cart_id'>";
echo "<input type='submit' name='edit' value='Order Detail'>";
echo "</form>";
echo "</td>";
echo "</tr>";
}
echo "</table>";
 }
?>



</center>
</body>
</html>