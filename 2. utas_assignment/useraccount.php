<html>
<body>
<center>
<link rel="stylesheet" href="css/index.css?v={<?php echo time()?>}"> 

<div class="top-box">
<div class="heading"><h1>User Account</h1></div>
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

$query = "SELECT * FROM `cafeusers` WHERE ID = '$ID'";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
$balance=$row['Credit_balance'];

?>
<br>
<form action="" name="" method="post">
<table id='table-1'>
<tr>
<td>Your Credit Balance</td>
<td><?php echo $balance;?></td>
</tr>

<tr>
<td>Top Up</td>
<td><input type="text" name="money">
</td>
</tr>

</table>
<input type="submit" name="topup" value="Top Up">
</form>
<?php	


 if (isset($_POST['topup'])){
$money = $_POST['money'];
$Credit_balance = $money+$balance;
$query = "UPDATE `cafeusers` SET `Credit_balance`='$Credit_balance' WHERE `ID`='$ID'";
$mysqli ->query($query); 
header("location:useraccount.php");
echo"<script>alert('Top Up successfully');</script>";
       }

?>

</center>
</body>
</html>