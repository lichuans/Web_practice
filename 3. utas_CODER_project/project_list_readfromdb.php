<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css//bootstrap.min.css?v={<?php echo time() ?>}">
<link rel="stylesheet" href="assets/css/index.css?v={<?php echo time() ?>}">




<?php
/**
 * Generate Project list dynamically
 * Created by Jing Effie Liu
 * Date: 2018/11/18
 */

//connect the database
include_once 'dba.php';
mysqli_set_charset($conn, 'utf8');
$projects = '';


// define how many results per page
$results_per_page = 9;
                
      
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

echo "<br><br>";
echo "<div class='projectlist'>";
echo " <ul>";
echo "<li></li>";

$number_of_results = mysqli_num_rows($result);
      
// daterminenumber of total pages available
$number_of_pages = ceil($number_of_results/$results_per_page);

// determine which page number visitor is currently on
if (!isset($_GET['page'])) {
    $page = 1;
}  else {
    $page = $_GET['page'];
}          
             
// determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1) * ($results_per_page);
            
// retrieve selected results from databse and display them on page
$sql = "SELECT ID, Name, StartDate, EndDate, Description, Picture, Category FROM Project LIMIT " . $this_page_first_result . ',' . $results_per_page;
$result = mysqli_query($conn, $sql);
            
while ($row = mysqli_fetch_array($result)) {

$picture=$row['Picture'];
$name=$row['Name'];
$description=$row['Description'];
$startdate=$row['StartDate'];
$enddate=$row['EndDate'];
$id=$row['ID'];


echo "<li style='margin-bottom:30px'>";
echo "<div>";
echo "<img src='$picture' alt='$name' class='img-thumbnail'/>";
echo "<br><br>";
echo "</div>";

echo "<div class='projectcontent'>";
echo "<header> ";
echo "<h2>" . $name . "</h2>";
echo "</header>";
echo "<p>" . substr($description, 0, 161) . "...</p>";
echo "<footer>";
echo "<br>";
echo "<p1>" . $startdate . ' ～ ' . $enddate . "</p1> ";
echo "<br><br>";
echo "<a href=\"project_details.php?pid=$id\" class='btn btn-info' style='font-family:myriad pro;'>Learn More</a>";
echo "<br><br>";
echo "</footer>";
echo "</div>";

echo "</li>";

 }
          
echo "</ul>";
echo "</div>";       
        }
    }
}

echo "<br><br>";

// display the links to the pages
echo "<div class='pagination justify-content-center'>"; 
for ($page=1;$page<=$number_of_pages;$page++) {
    echo '<a class="page-link" href="project_list.php?page=' . $page . '">' . $page . '</a> ';



}

echo "</div>"; 

echo "<br><br>";
      
$conn->close();


      
      
?>



