<link rel="stylesheet" href="assets/css/index.css?v={<?php echo time()?>}">

<?php
/**
 * Generate Project list dynamically
 * Created by Lichuan sun
 * Date: 2018/12/03
 */

//connect the database
include_once 'dba.php';
mysqli_set_charset($conn, 'utf8');



// check the connection with the database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {


//read and display projects
    $sql = "SELECT ID, Name, StartDate, EndDate, Description, Picture, Category FROM Project ";
    switch ($title) {
        case 'NEW':
            $sql .= 'WHERE Category = 0 '; //WHERE utc_date() < StartDate ';
            break;
        case 'CURRENT':
            $sql .=  'WHERE Category = 1 '; // 'WHERE utc_date() BETWEEN StartDate AND EndDate ';
            break;
        case 'PAST':
            $sql .=  'WHERE Category = 2 '; // 'WHERE utc_date() > EndDate ';
            break;
        case 'all':
            break;
    }
    $sql .= " ORDER BY id DESC ";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo $sql;
        printf("Error: %s\n", mysqli_error($conn));
    } else {
        if ($result->num_rows < 1) {
            $projects = "no any ".$title." project currently ";
        } else 

      {

echo "<div class='projectlist'>";
echo " <ul>";
echo "<li></li>";


while ($row = mysqli_fetch_array($result)) {

$picture=$row['Picture'];
$name=$row['Name'];
$description=$row['Description'];
$startdate=$row['StartDate'];
$enddate=$row['EndDate'];
$id=$row['ID'];


echo "<li style='margin-bottom:30px'>";
echo "<div>";
echo "<img src='$picture' alt='$name'/>";
echo "<br>";
echo "</div>";

echo "<div class='projectcontent'>";
echo "<header> ";
echo "<h2>" . $name . "</h2>";
echo "</header>";
echo "<p>" . substr($description, 0, 161) . "...</p>";
echo "<footer>";
echo "<p1>" . $startdate . ' ～ ' . $enddate . "</p1> ";
echo "<br><br>";

echo "</footer>";
echo "</div>";

echo "<div class='projectedit'>";
echo "<div style='float:left;width:100px;'>";
echo "<form action='ProjectInformation2.php' name='authform' method='post'>";
echo "<input type='hidden' name='id' value='$id'>";
echo "<input type='submit' name='edit' value='Update'style='width:90px;height:40px;color: white; '>";
echo "</form>";
echo "</div>";

echo "<div style='float:left;width:100px;'>";
echo "<form action='' name='authform2' method='post'>";
echo "<input type='hidden' name='id' value='$id'>";
echo "<input type='submit' name='delete' value='delete'style='width:90px;height:40px;color: white; '>";
echo "</form>";
echo "</div>";
echo "</div>";

echo "</li>";

 }

echo "</ul>";
echo "</div>";
        }
    }
}



if(isset($_POST['delete'])){
$did=$_POST['id'];
              $deletequery="DELETE FROM Project WHERE ID = '$did'";
              $result=$conn ->query($deletequery);

              echo "<script>alert('Delete completely!')</script>";
  }

$conn->close();

?>



