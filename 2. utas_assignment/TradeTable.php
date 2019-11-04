<html>
<body>
<center>
<link rel="stylesheet" href="css/index.css?v={<?php echo time()?>}"> 

<div class="top-box">
<div class="heading"><h1>The Trade Table Cafe</h1></div>
</div>

<div class="tablepages">
<table>
<tr>
<th><a href="index.php" class="am-icon-sort-asc">Home</a></th>
<th><a href="cart.php" class="am-icon-sort-asc">Cart</a></th>
<th><a href="logout.php" class="logout">Logout</a></th>  
</tr>
</table>
</div>

<?php
session_start();
include('db_conn.php'); 
$query = "SELECT * FROM `cafe_time` WHERE `cafe`='tradetable'";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);

echo "<div class='opentime'>";
echo "<table border='1'>";
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
echo "<div class='reminder'>";
echo "<p>";
echo "<h2>Choose your Collection Times after Payment at My Order List.</h2>";
echo "</p>";
echo "</div>";
?>

<?php
$query = "SELECT * FROM `foodlist` WHERE `tradetable`=1";
$result = $mysqli->query($query);

echo "<table id='table-1' border='1'>
<tr>
<td>Food ID</td>
<td>Item</td>
<td>Picture</td>
<td>Price</td>
<td>Category</td>
<td>Operation</td>
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

echo "<td id='function' colspan='4'>";
echo "<form action='' name='menu' method='post'>";
echo "<input type='hidden' name='foodid' value='$foodid'>";
echo "<input type='submit' name='added' value='Add into Cart'>";
echo "</form>";
echo "</td>";
echo "</tr>";
}
echo "</table>";
?>


<?php
if(isset($_POST['added'])){
$cust_id = $_SESSION['ID'];
$foodid = $_POST['foodid'];
addstock($_POST['foodid'],$_SESSION['ID']);
}

function addstock($foodid,$cust_id){
global $mysqli;
global $cust_id;
global $foodid;

$query = "SELECT * FROM `foodlist` WHERE `foodid`=$foodid";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_NUM);
$price=$row[5];
$cart_id=checkCart($cust_id);

$_SESSION['cart_id']=$cart_id;
$_SESSION['paid']='N';

$query = "SELECT * FROM `tb_transaction` WHERE `cart_id`=$cart_id AND `foodid`=$foodid";
$result = $mysqli->query($query);

if($result->num_rows == 0){               
 $now=date('Y-m-d H:i:s');
 $query = "INSERT INTO `tb_transaction`(`foodid`,`ordered_amount`,`ordered_datetime`,`cart_id`,`sum_price`) VALUES ('$foodid','1','$now','$cart_id','$price')";
 $mysqli->query($query);



$cart_id=$_SESSION['cart_id'];
$query= "SELECT sum(ordered_amount) as sum, sum(sum_price) as sum2  FROM `tb_transaction` WHERE `cart_id` = $cart_id";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_NUM);
$totalamount=$row[0];
$totalprice=$row[1];
$query4 = "UPDATE `tb_cart` SET `total_amount`= $totalamount, `total_price`= $totalprice WHERE `cart_id` = $cart_id";
$mysqli->query($query4);




            echo"<script>alert('Add a new item.');</script>";                    
            }
            else{   
             echo"<script>alert('This item is already in your cart.');</script>";
            }
}


function checkCart($cust_id){
global $mysqli;
global $cust_id;
$query = "SELECT `cart_id`, `paid` FROM `tb_cart` WHERE `cust_id` LIKE '$cust_id' AND `paid` = 'N';";
$result = $mysqli->query($query);

if($row=$result->fetch_array(MYSQLI_ASSOC)){
           $cart_id=$row['cart_id'];
           return $cart_id;
           }else{
           $today=date('Y-m-d');
           $query = "INSERT INTO `tb_cart`(`cust_id`, `paid`, `ordered_datetime`, `pick_status`) VALUES ('$cust_id','N','$today','pending')";
            $mysqli->query($query);
           $query = "SELECT MAX(cart_id) FROM `tb_cart`;";
           $result = $mysqli->query($query);
           $row=$result->fetch_array(MYSQLI_NUM);
           $cart_id=$row[0];
           $_SESSION['cart_id']=$cart_id;
                             $_SESSION['paid']='N';

           return $cart_id;
           }



}
?>

</body>
</center>
</html>
