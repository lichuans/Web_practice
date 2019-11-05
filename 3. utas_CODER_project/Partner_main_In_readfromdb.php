<link rel="stylesheet" href="assets/css/index.css?v={<?php echo time()?>}">

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
//$projects = '';
      
// check the connection with the database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    exit();
}else

    
//read and display projects
$sql = "SELECT ID,Name,Picture,Description FROM PartnersIn";
//    switch ($title) {
//        case 'EXTERNAL':
//            $sql .= 'WHERE Category = 0 ';
//            break;
//        case 'INTERNAL':
//            $sql .=  'WHERE Category = 1 '; ;
//            break;
//        case 'all':
//            break;
//    }
//    $sql .= " ORDER BY id DESC ";
    $result = mysqli_query($conn, $sql);
//    if (!$result) {
//        echo $sql;
//        printf("Error: %s\n", mysqli_error($conn));
//    } else {
//        if ($result->num_rows < 1) {
//            $projects = "no any ".$title." partners currently ";
//        } else 
//
//    {

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
echo "<img src='$picture' alt=''/>";
echo "</div>";
    
echo "<div class=content>";
echo "<div class=header>";
echo "<a href=\"partnerdetails_in.php?pid=$id\">" . $name . "</a>";
echo "</div>";

echo "<p>" . substr($description, 0, 80) . "...</p>";

echo "<div class=read>";
echo "<a href=\"partnerdetails_in.php?pid=$id\">Read More></a>";
echo "<br><br><br>";
echo "</div>";

echo "</div>";
echo "</li>";

    
}
echo "</ul>";
echo "</div>";
echo "<br><br>";
        
   // }
//}
$conn->close();
?>
