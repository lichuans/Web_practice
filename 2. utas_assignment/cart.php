<html>
<body>
<center>

<link rel="stylesheet" href="css/reset.css?v={<?php echo time()?>}">
<link rel="stylesheet" href="css/carts.css?v={<?php echo time()?>}">


<div class="top-box">
<div class="heading">
<h1>Cart</h1>
</div>
</div>


<?php
include('session.php'); 
include('db_conn.php');



 if($_SESSION['assigned_cafe']=='lazenbys'){
          ?>	
<div class="tablepages">
<table>
<tr>
<th><a href="index.php" class="am-icon-sort-asc">Home</a></th>
<th><a href="Lazenbys.php" class="am-icon-sort-asc">Lazenbys Menu</a></th>
<th><a href="logout.php" class="logout">Logout</a></th> 
</tr>
</table>
</div>
     <?php
   }


if($_SESSION['assigned_cafe']=='ref'){
          ?>	
<div class="tablepages">
<table>
<tr>
<th><a href="index.php" class="am-icon-sort-asc">Home</a></th>
<th><a href="Ref.php" class="am-icon-sort-asc" >Ref Cafe</a></th>
<th><a href="logout.php" class="logout">Logout</a></th> 
</tr>
</table>
</div>
     <?php
   }



if($_SESSION['assigned_cafe']=='tradetable'){	
?>	
<div class="tablepages">
<table>
<tr>
<th><a href="index.php" class="am-icon-sort-asc">Home</a></th>
<th><a href="TradeTable.php" class="am-icon-sort-asc" >TradeTable Cafe</a></th>
<th><a href="logout.php" class="logout">Logout</a></th> 
</tr>
</table>
</div>
<?php
   }



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

?>






<?php
$cust_id = $_SESSION['ID'];
$cart_id=$_SESSION['cart_id'];

if($_SESSION['paid']=='N'){

if(isset($_POST['edit'])){
$cust_id = $_SESSION['ID'];
$foodid = $_POST['foodid'];
$amount= $_POST['amount'];
$price= $_POST['price'];
$cart_id=$_SESSION['cart_id'];
$sum_price=$price*$amount;
$query5 = "UPDATE `tb_transaction` SET `ordered_amount`= $amount, `sum_price`= $sum_price WHERE `foodid` = $foodid AND `cart_id` = $cart_id";
$mysqli->query($query5); 


$query= "SELECT sum(ordered_amount) as sum, sum(sum_price) as sum2  FROM `tb_transaction` WHERE `cart_id` = $cart_id";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_NUM);
$totalamount=$row[0];
$totalprice=$row[1];
$query4 = "UPDATE `tb_cart` SET `total_amount`= $totalamount, `total_price`= $totalprice WHERE `cart_id` = $cart_id";
$mysqli->query($query4);

}


if(isset($_POST['remove'])){
$cust_id = $_SESSION['ID'];
$foodid = $_POST['foodid'];
$cart_id=$_SESSION['cart_id'];
$query = "DELETE FROM `tb_transaction` WHERE `foodid`=$foodid AND `cart_id` = $cart_id";
$mysqli ->query($query); 


$query= "SELECT sum(ordered_amount) as sum, sum(sum_price) as sum2  FROM `tb_transaction` WHERE `cart_id` = $cart_id";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_NUM);
$totalamount=$row[0];
$totalprice=$row[1];
$query4 = "UPDATE `tb_cart` SET `total_amount`= $totalamount, `total_price`= $totalprice WHERE `cart_id` = $cart_id";
$mysqli->query($query4);
}















if(isset($_POST['give_comment'])){
$foodid = $_POST['foodid'];
$comment = $_POST['comment'];
$query = "UPDATE `tb_transaction` SET `comment`=  '$comment' WHERE `foodid` = $foodid AND `cart_id` = $cart_id";
$mysqli->query($query);  
}

}


if($_SESSION['paid']=='Y'){
echo"<script>alert('Transaction was Completed.Do not edit agian.');</script>";
}
?>












<?php
$cart_id=$_SESSION['cart_id'];
$query = "SELECT * FROM `tb_transaction` WHERE `cart_id`=$cart_id";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);

if($row['foodid']=="")
   {
echo "<br><br>";
echo "No item in your cart.";
   }

else {

echo "<section class='cartMain'>";
echo "<div class='cartMain_hd'>";
echo "<ul class='order_lists cartTop'>";
echo "<li class='list_con'>Item</li>";
echo "<li class='list_price'>Unit Price</li>";
echo "<li class='list_amount'>Amount</li>";
echo "<li class='list_sum'>Price</li>";
echo "<li class='list_info'>Comment</li>";
echo "<li class='list_op'>Operation</li>";
echo "</ul>";
echo "</div>";

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

echo "<div class='order_content'>";
echo "<ul class='order_lists'>";

echo "<li class='list_con'><div class='list_img'><p><img src='img/$foodid.jpg'  width='70' height='70'/></p></div>";
echo "<div class='list_text'>";
echo "<p>" . $item . "</p>";
echo "</div>";
echo "</li>";

echo "<li class='list_price'>";
echo "<p class='price'>" . $price . "</p>";
echo "</li>";

echo "<li class='list_amount'>";
echo "<div class='amount_box'>";
echo "<form action='' name='' method='post'>";
echo "<input type='hidden' name='foodid' value='$foodid'>";
echo "<input type='hidden' name='price' value='$price'>";
echo "<input name='amount' value='$amount'>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<input type='submit' name='edit' value='Edit'>";
echo "</form>";
echo "</div>";
echo "</li>";

echo "<li class='list_sum'>";
echo "<p class='sum_price'>$" . $price*$amount . "</p>";
echo "</li>";


echo "<li class='list_info'>";
echo "<div class='amount_box'>";
echo "<form action='' name='' method='post'>";
echo "<input type='hidden' name='foodid' value='$foodid'>";
echo "<input name='comment' value='$comment'>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<input type='submit' name='give_comment' value='Submit'>";
echo "</form>";
echo "</div>";
echo "</li>";

echo "<li class='list_op'>";
echo "<form action='' name='' method='post'>";
echo "<input type='hidden' name='foodid' value='$foodid'>";
echo "<input class='del' type='submit' name='remove' value='Remove'>";
echo "</form>";
echo "</li>";
echo "</ul>";
  
echo "</div>";
echo "</div>";

}
}
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

echo "<div class='bar-wrapper'>";
echo "<div class='bar-right'>";

echo "<div class='balance'>Your Balance: <strong class='yourbalance'>$" . $balance . "</strong></div>";
echo "<div class='balanceleft'>After Transaction: <strong class='yourbalance'>$" . $balanceleft . "</strong></div>";
echo "<div class='paystatus'>Payment Status: <strong class='yourbalance'>" . $paid . "</strong></div>";

echo "<div class='piece'>Selected<strong class='piece_num'>" . $totalamount . "</strong>items</div>";

echo "<div class='totalMoney'>All: <strong class='total_text'>$" . $totalprice . "</strong></div>";
echo "<div class='totalMoney'>Discount Rate: <strong class='total_text'>" . $discount . "</strong></div>";
echo "<div class='totalMoney'>Total after Discount: <strong class='total_text'>$" . $totalprice*$discount . "</strong></div>";
echo "<div class='calBtn'>";
echo "<form action='pay.php' name='' method='post'>";
echo "<input type='submit' name='checkout' value='Check out'>";
echo "</form>";

echo "</div>";

echo "</div>";
echo "</div>";
echo "</section>";
 }
?>







</body>
</html>