<html>
<body>
<center>
<link rel="stylesheet" href="css/index.css?v={<?php echo time()?>}"> 

<div class="top-box">
<div class="heading"><h1>Check Out</h1></div>
</div>

<div class="tablepages">
<table>
<tr>
<th><a href="index.php" class="am-icon-sort-asc">Home</a></th>
<th><a href="my_order.php" class="am-icon-sort-asc">My Order List</a></th>
<th><a href="cart.php" class="am-icon-sort-asc">Back to Cart</a></th>
<th><a href="logout.php" class="logout">Logout</a></th>  
</tr>
</table>
</div>



<?php
include('session.php'); 
include("db_conn.php");
if($_SESSION['role']=='students'){
$discount=0.9;
echo "<div class='reminder'>";
echo "<h2>Hi Utas students, you can have 10% off.</h2>";
echo "</div>";
}
if($_SESSION['role']=='employees'){
$discount=1;
echo "<div class='reminder'>";
echo "<h2>Hi Utas employees, have a nice day.</h2>";
echo "</div>";
}

echo "<table id='table-1'>
<tr>
<th>Food</th>
<th>Name</th>
<th>Category</th>
<th>Price</th>
<th>Amount</th>
<th>Subtotal</th>
<th>Comment</th>
</tr>";


$cart_id=$_SESSION['cart_id'];
$query = "SELECT * FROM `tb_transaction` WHERE `cart_id`=$cart_id";
$result = $mysqli->query($query);
while ($row = $result->fetch_array(MYSQLI_ASSOC)){
$foodid=$row['foodid'];
$amount=$row['ordered_amount'];
$comment=$row['comment'];

	

$query2 = "SELECT * FROM `foodlist` WHERE `foodid`=$foodid";
$result2 = $mysqli->query($query2);
while ($row = $result2->fetch_array(MYSQLI_ASSOC)){
$item=$row['item'];
$price=$row['price'];
$category=$row['category'];

$query5 = "SELECT * FROM `tb_cart` WHERE `cart_id`=$cart_id";
$result5 = $mysqli->query($query5);
$row = $result5->fetch_array(MYSQLI_ASSOC);
$totalamount=$row['total_amount'];
$totalprice=$row['total_price'];
$paid=$row['paid'];

$ID=$_SESSION['ID'];
$query6 = "SELECT * FROM `cafeusers` WHERE `ID`=$ID";
$result6 = $mysqli->query($query6);
$row = $result6->fetch_array(MYSQLI_ASSOC);
$balance=$row['Credit_balance'];
$balanceleft=$balance-$totalprice*$discount;

echo "<tr>";
echo "<td><img src='img/$foodid.jpg' width='70' height='70' /></td>";
echo "<td>" . $foodid .  $item . "</td>";
echo "<td>" . $category . "</td>";
echo "<td>$" . $price . "</td>";
echo "<td>" . $amount . "</td>";
echo "<td>$" . $amount*$price . "</td>";
echo "<td>" . $comment . "</td>";
echo "</tr>";
}
}

echo "<tr>";
echo "<td> Total </td>";
echo "<td>$" . $totalprice . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td> Discount Rate </td>";
echo "<td>" . $discount . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td> Total after Discount </td>";
echo "<td>$" . $totalprice*$discount . "</td>";
echo "</tr>";


echo "<tr>";
echo "<td> Your Balance </td>";
echo "<td>$" . $balance . "</td>";
echo "</tr>";

echo "<tr>";
echo "<td> Your Balance (after transaction) </td>";
echo "<td>$" . $balanceleft . "</td>";
echo "</tr>";




echo "</table>";

echo "<form action='' name='' method='post'>";
echo "<input type='submit' name='pay' value='Pay Now'>";
echo "</form>";

?>







<?php

if(isset($_POST['pay'])){
$query5 = "SELECT * FROM `tb_cart` WHERE `cart_id`=$cart_id";
$result5 = $mysqli->query($query5);
$row = $result5->fetch_array(MYSQLI_ASSOC);
$totalprice=$row['total_price'];
$paid=$row['paid'];


$query7 = "SELECT * FROM `cafeusers` WHERE `ID`=$ID";
$result7 = $mysqli->query($query7);
$row = $result7->fetch_array(MYSQLI_ASSOC);
$balance=$row['Credit_balance'];
$balanceleft=$balance-$totalprice*$discount;


if($paid=='N'){

if($balanceleft<0){
echo"<script>alert('You do not have sufficient credit.');</script>";
}
if($balanceleft>=0){


global $mysqli;
$mysqli->query('SET autocommit = OFF;');
$mysqli->query('START TRANSACTION;');

$query = "UPDATE `cafeusers` SET `Credit_balance`=$balanceleft WHERE ID = '$ID';";

if(!$result=$mysqli->query($query)){
$mysqli->query('ROLLBACK;');
exit;
}

if($_SESSION['assigned_cafe']=='lazenbys'){
$query = "UPDATE `tb_cart` SET `paid`='Y',`assigned_cafe`='lazenbys' WHERE cart_id=$cart_id;";
$_SESSION['paid']='Y';
}
if($_SESSION['assigned_cafe']=='ref'){
$query = "UPDATE `tb_cart` SET `paid`='Y',`assigned_cafe`='ref' WHERE cart_id=$cart_id;";
$_SESSION['paid']='Y';
}

if($_SESSION['assigned_cafe']=='tradetable'){
$query = "UPDATE `tb_cart` SET `paid`='Y',`assigned_cafe`='tradetable' WHERE cart_id=$cart_id;";
$_SESSION['paid']='Y';
}

$mysqli->query($query);
if(!$result=$mysqli->query($query)){
$mysqli->query('ROLLBACK;');
exit;
}
else{
$mysqli->query('COMMIT;');
}


echo "<div class='reminder'><h2>";
echo "Thank you.<br/>";
echo "Transaction completed.<br/>";
echo "Go Order page to choose Pick time.";
echo "</h2></div>";
}


}
}

if($paid=='Y'){
echo"<script>alert('Transaction was Completed.Do not edit again.');</script>";

echo "<div class='reminder'><h2>";
echo "Transaction has completed.<br/>";
echo "go My Order to choose Pick time.";
echo "</h2></div>";


}

?>

























</center>
</body>
</html>
