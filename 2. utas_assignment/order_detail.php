<html>
<body>
<center>
<link rel="stylesheet" href="css/index.css?v={<?php echo time()?>}"> 

<div class="top-box">
<div class="heading"><h1>Order Detail</h1></div>
</div>



<?php
include('db_conn.php'); 
include('session.php'); 

 if($_SESSION['role']=='students'||$_SESSION['role']=='employees')
     {
?>
<div class="tablepages">
<table>
<tr>
<th><a href="my_order.php" class="am-icon-sort-asc">My Order List</a></th>
<th><a href="logout.php" class="logout">Logout</a></th>    
</tr>
</table>
</div>
 <?php
}


 if($_SESSION['role']=='manager'||$_SESSION['role']=='staff')
     {
?>
<div class="tablepages">
<table>
<tr>
<th><a href="order_list.php" class="am-icon-sort-asc">Cafe Order List</a></th>
<th><a href="logout.php" class="logout">Logout</a></th>    
</tr>
</table>
</div>
 <?php
}


?>









<?php
$ID=$_SESSION['ID']; 
$cart_id=$_POST['cart_id'];

$today=date('Y-m-d');

echo "<table border='1' id='table-1'>
<tr>
<th>Transaction ID</th>
<th>Food ID</th>
<th>Picture</th>
<th>Food Name</th>
<th>Food Price</th>
<th>Quantity</th>
<th>Comment</th>
</tr>";

$query2 = "SELECT * FROM `tb_transaction` WHERE `ordered_datetime`= '$today' and `cart_id`= '$cart_id' ";
$result2 = $mysqli->query($query2);
while ($row = $result2->fetch_array(MYSQLI_ASSOC)){
$foodid=$row['foodid'];
$quantity=$row['ordered_amount'];
$comment=$row['comment'];
$transaction_id=$row['transaction_id'];
	

$query3 = "SELECT * FROM `foodlist` WHERE `foodid`= '$foodid'";
$result3 = $mysqli->query($query3);
while ($row = $result3->fetch_array(MYSQLI_ASSOC)){
$item=$row['item'];	
$price=$row['price'];

echo "<tr>";
echo "<td>" . $transaction_id . "</td>";
echo "<td>" . $foodid . "</td>";
echo "<td><img src='img/$foodid.jpg' width='70' height='70' /></td>";
echo "<td>" . $item . "</td>";
echo "<td>$" . $price . "</td>";
echo "<td>" . $quantity . "</td>";
echo "<td>" . $comment . "</td>";
echo "</tr>";
}
}
echo "</table>";
?>

</center>
</body>
</html>