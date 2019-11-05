<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css//bootstrap.min.css?v={<?php echo time() ?>}">
<link rel="stylesheet" href="assets/css/index.css?v={<?php echo time() ?>}">



<?php
/**
 * Partner_main_db Page
 * Created by Michael
 * Date: 2018/12/09
 */

//session_start();
//connect the database
include_once 'dba.php';
mysqli_set_charset($conn, 'utf8');

      
// check the connection with the database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    exit();
}

    
//read and display projects
$sql = "SELECT ID,Name,Picture,Description FROM PartnersEx";
$result = mysqli_query($conn, $sql);


echo "<br><br>";
echo "<div class='storylist'>";
echo "<ul>";
echo "<li></li>";
            
while ($row = mysqli_fetch_array($result)) {
$id=$row['ID'];
$picture=$row['Picture'];
$name=$row['Name'];
$description=$row['Description'];

echo "<li style='margin-bottom:30px'>";
echo "<div>";
echo "<img src='$picture' alt='' class='img-thumbnail'/>";
echo "</div>";
    
echo "<div class=content>";
echo "<div class=header>";
echo "<a href=\"partnerdetails_ex.php?pid=$id\">" . $name . "</a>";
echo "</div>";

echo "<p>" . substr($description, 0, 80) . "...</p>";

echo "<div class=read>";
echo "<a href=\"partnerdetails_ex.php?pid=$id\">Read More></a>";
echo "<br>";
echo "</div>";

echo "</div>";
echo "</li>";

    
}
echo "</ul>";
echo "</div>";
echo "<br><br>";
        

$conn->close();
?>
