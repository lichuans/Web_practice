<html>    

<?php
//connect the database
include_once 'dba.php';
mysqli_set_charset($conn, 'utf8');
mysql_select_db ("seearch_test") or die ("could not find db!");

// check the connection with the database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else

$output = '';

//collect
//if(isset($_POST['search'])){
//    
//    $searchq = $_POST['search'];
//    $searchq = preg_replace ("#[^0-9a-z]#i","",$searchq);
//    
//    $query = mysql_query("SELECT * FROM projects WHERE name LIKE '%$searchq%' OR lastname LIKE '%$searchq%'") or die("could not search!");
//    $count = mysql_num_rows($query);
//    if($count == 0){
//        $output = 'There was no search results!';
//    }else{
//        while($row = mysql_fetch_array($query)){
//            $fname = $row['firstname'];
//            $lanme = $row['lastname'];
//            $id = $row['id'];
//            
//            $output .='<div>'.$fname.''.$lastname.'</div>';
//        }
//    }
//}
//    
?>
<body>
    <form action="search.php" method="post">
        <input type="text" name="search" placeholder="Searchfor members..."/>
        <input type="submit" value=">>" />

    </form>

    <?php print("$output"); ?>
    
</body>
</html>