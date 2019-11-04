<html>
<center>
<center>
<link rel="stylesheet" href="css/index.css?v={<?php echo time()?>}"> 


<div class="top-box">
<div class="heading"><h1>Edit Your Cafe Menu</h1></div>
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
$cafe=$_SESSION['assigned_cafe']; 
$query = "SELECT * FROM `cafe_time` WHERE `cafe`='$cafe'";
$result = $mysqli->query($query);
$row = $result->fetch_array(MYSQLI_ASSOC);
$open_time=$row[open_time];
$close_time=$row[close_time];

?>
<div class='reminder'><h2>The <?php echo $cafe;?> Time</h2></div>
<form method="post" action="" id="timeform">
<table border='1' id='table-1'>
<tr>
<th>Open Time:</th>
<th><input type="time" step="900" name="open_time" value="<?php echo $open_time;?>"  /></th>
</tr>
<tr>
<th>Close Time:</th>
<th><input type="time" step="900" name="close_time" value="<?php echo $close_time;?>"   /></th>
</tr>
</table>
<input type="submit" name="update" value="Change Time">   
</form>
</div>

<?php

if (isset($_POST['update'])){
 $open_time = $_POST['open_time'];
 $close_time = $_POST['close_time'];
$query = "UPDATE `cafe_time` SET `open_time`='$open_time', `close_time`='$close_time' WHERE `cafe`='$cafe'";
$mysqli ->query($query); 
header("location:ListPage2.php");
echo"<script>alert('Time Changed.');</script>";

}

?>






<?php
$query = "SELECT * FROM foodlist";
$result = $mysqli->query($query);

echo "
<div class='reminder'><h2>Master Food List</h2></div>
<table border='1' id='table-1'>
<tr>
<th>Food ID</th>
<th>Item</th>
<th>Price</th>
<th>Category</th>
<th>Picture</th>
</tr>";
while ($row = $result->fetch_array(MYSQLI_ASSOC))
{
$foodid=$row['foodid'];
echo "<tr>";
echo "<td>" . $row['foodid'] . "</td>";
echo "<td>" . $row['item'] . "</td>";
echo "<td>" . $row['price'] . "</td>";
echo "<td>" . $row['category'] . "</td>";
echo "<td><img src='img/$foodid.jpg' width='70' height='70' /></td>";

echo "</tr>";
}
echo "</table>";

?>
<form method="post" action="">
<table>
<tr><th>Food ID: </th> <th><input type="text" name="foodid"/></th></tr>
<tr><th><input type="submit" name="insert" value="insert into your menu"/></th></tr>
</table>
</form>
<?php

?>

<?php
$ID=$_SESSION['ID'];
$cafe=$_SESSION['assigned_cafe'];

if($cafe=='lazenbys')
{
$query = "SELECT * FROM `foodlist` WHERE `lazenbys`=1";
$result = $mysqli->query($query);
echo "
<div class='reminder'><h2>The Lazenbys Food Menu</h2></div>
<table border='1' id='table-1'>
<tr>
<th>Food ID</th>
<th>Item</th>
<th>Price</th>
<th>Category</th>
<th>Picture</th>
</tr>";
while ($row = $result->fetch_array(MYSQLI_ASSOC))
{
$foodid=$row['foodid'];
echo "<tr>";
echo "<td>" . $row['foodid'] . "</td>";
echo "<td>" . $row['item'] . "</td>";
echo "<td>" . $row['price'] . "</td>";
echo "<td>" . $row['category'] . "</td>";
echo "<td><img src='img/$foodid.jpg' width='70' height='70' /></td>";

echo "</tr>";
}
echo "</table>";

if (isset($_POST['insert'])){
$foodid = $_POST['foodid'];
$query = "UPDATE `foodlist` SET `lazenbys`=1 WHERE `foodid`=$foodid";
$mysqli ->query($query);
header("location:ListPage2.php");
}

if (isset($_POST['delete'])){
$foodid = $_POST['foodid'];
$query = "UPDATE `foodlist` SET `lazenbys`=0 WHERE `foodid`=$foodid";
 $mysqli ->query($query);
header("location:ListPage2.php");
}
}

if($cafe=='ref')
{
$query = "SELECT * FROM `foodlist` WHERE `ref`=1";
$result = $mysqli->query($query);
echo "<div class='reminder'><h2>The Ref Food Menu</h2></div>
<table border='1' id='table-1'>
<tr>
<th>Food ID</th>
<th>Item</th>
<th>Price</th>
<th>Category</th>
<th>Picture</th>
</tr>";
while ($row = $result->fetch_array(MYSQLI_ASSOC))
{
$foodid=$row['foodid'];
echo "<tr>";
echo "<td>" . $row['foodid'] . "</td>";
echo "<td>" . $row['item'] . "</td>";
echo "<td>" . $row['price'] . "</td>";
echo "<td>" . $row['category'] . "</td>";
echo "<td><img src='img/$foodid.jpg' width='70' height='70' /></td>";
echo "</tr>";
}
echo "</table>";


if (isset($_POST['insert'])){
$foodid = $_POST['foodid'];
$query = "UPDATE `foodlist` SET `ref`=1 WHERE `foodid`=$foodid";
$mysqli ->query($query);
header("location:ListPage2.php");
}

if (isset($_POST['delete'])){
$foodid = $_POST['foodid'];
$query = "UPDATE `foodlist` SET `ref`=0 WHERE `foodid`=$foodid";
 $mysqli ->query($query);
header("location:ListPage2.php");
}
}

if($cafe=='tradetable')
{
$query = "SELECT * FROM `foodlist` WHERE `tradetable`= 1";
$result = $mysqli->query($query);

echo "
<div class='reminder'><h2>The Trade Table Food Menu</h2></div>
<table border='1' id='table-1'>
<tr>
<th>Food ID</th>
<th>Item</th>
<th>Price</th>
<th>Category</th>
<th>Picture</th>
</tr>";
while ($row = $result->fetch_array(MYSQLI_ASSOC))
{
$foodid=$row['foodid'];
echo "<tr>";
echo "<td>" . $row['foodid'] . "</td>";
echo "<td>" . $row['item'] . "</td>";
echo "<td>" . $row['price'] . "</td>";
echo "<td>" . $row['category'] . "</td>";
echo "<td><img src='img/$foodid.jpg' width='70' height='70' /></td>";
echo "</tr>";
}
echo "</table>";


if (isset($_POST['insert'])){
$foodid = $_POST['foodid'];
$query = "UPDATE `foodlist` SET `tradetable`=1 WHERE `foodid`=$foodid";
$mysqli ->query($query);
header("location:ListPage2.php");
}

if (isset($_POST['delete'])){
$foodid = $_POST['foodid'];
$query = "UPDATE `foodlist` SET `tradetable`=0 WHERE `foodid`=$foodid";
 $mysqli ->query($query);
header("location:ListPage2.php");
}
}
?>


<form method="post" action="">
<table>
<tr><th>Food ID: </th> <th><input type="text" name="foodid"/></th></tr>
<tr><th><input type="submit" name="delete" value="delete from your Menu"/></th></tr>
</table>
</form>

</center>
</body>
</html>

