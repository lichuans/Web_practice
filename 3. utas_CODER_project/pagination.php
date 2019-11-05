<link rel="stylesheet" href="assets/css/index.css?v={<?php echo time()?>}"> 

/**
 * Created by Micahel Yang
 * Date: 2018/12/6
https://www.youtube.com/watch?v=6dBgA7wiwgg
https://www.youtube.com/watch?v=gdEpUPMh63s
 */

<html>
<body>
<style>
    .all{
        width:50%;
        margin:0 auto;
        margin-top:55px;
    }
    
    .pagination a{
        color:black ;
        float:left;
        padding:8px 16px;
        text-decoration:none;
        transition:background-color .3s;
    }
    
    .pagination a.active{
        background-color:#4CAF50;
        color:#fff;
    }
    
    .pagination {
        margin-top:30px;    
    }
    .pagination a:hover;not(.active){
        background-color:#ddd;
    }
</style>

    
    

      
<div class="all">

<?php
//connect the database
include 'dba.php';
mysqli_set_charset($conn,'utf8');
// 判断当前连接是否成功
if ($conn->connect_error) {
    die("Connection failed:: " . $conn->connect_error);
    exit();
}

    
//count total project from table
$total="SELECT * FROM Project";
$count = mysqli_query($total);
$nr=mysqli_num_rows($count);
echo $nr;

$items_per_page = 3 ;  // change with any number
$totalpages=ceil($nr/$items_per_page);
    if(isset($_GET['page']) && !empty($_GET['page']))
    {
        $page = $_GET['page'];
        if($page > $totalpages)
            //$page=1; //or
        header("Location:/pagination.php?page=1");
    }
    else
        $page = 1;
    $offset=($page-1) *$items_per_page;
    $sql="SELECT * FROM Project LIMIT $items_per_page OFFSET $offset";
    $result = mysqli_query($sql);
    $row_count=mysqli_num_rows($result);
    while($row=mysqli_fetch_assoc($result))
        echo ' * '.$row['Name'].'<br/>';
    echo "<div class='pagination'>";
    for ($i=1;$i<=$totalpages;$i++)
    {
        if($i==$page) // actual link
        echo '<a class="active">'.$i.'</a>';
        else
            echo '<a href="/pagination.php?page='.$i.'">'.$i.'</a> '
    }
?>
</div>
</body>
</html>