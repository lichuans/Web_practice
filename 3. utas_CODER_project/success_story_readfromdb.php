<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/index.css?v={<?php echo time() ?>}">

<?php
/**
 * Generate Success Story dynamically
 * Created by Webber
 * Date: 2018/11/22
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
$sql = "SELECT ID, Name,Picturel,Description FROM SuccessStory";
$result = mysqli_query($conn, $sql);

echo "<br>";
echo "<div class='storylist'>";
echo "<ul>";
echo "<li></li>";
while ($row = mysqli_fetch_array($result)) {
$id=$row['ID'];
$picture=$row['Picturel'];
$name=$row['Name'];
$timestart=$row['Timestart'];
$timefinish=$row['Timefinish'];
$members=$row['Members'];
$description=$row['Description'];

echo "<li style='margin-bottom:30px'>";
echo "<div>";
echo "<img src='$picture' alt=''/>";
echo "</div>";
echo "<div class=content>";

echo "<div class=header>";
echo "<a href=\"SuccessStory_detail.php?pid=$id\">" . $name . "</a>";
echo "</div>";

echo "<p>" . substr($description, 0, 80) . "...</p>";

echo "<div class=read>";
echo "<a href=\"SuccessStory_detail.php?pid=$id\">Read More></a>";
echo "</div>";

echo "</div>";
echo "</li>";

    
}
echo "</ul>";
echo "</div>";
$conn->close();
?>
