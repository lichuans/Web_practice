<link rel="stylesheet" href="assets/css/index.css?v={<?php echo time()?>}"> 
<meta name="viewport" content="width=device-width, user-scalable=no">
<link rel="stylesheet" href="assets/css//bootstrap.min.css?v={<?php echo time() ?>}">

<?php
session_start();
include_once 'header.html';
//$title = $_GET['type'];


//connect the database
include_once 'dba.php';
mysqli_set_charset($conn, 'utf8');

// check the connection with the database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    exit();
}


//read and display projects
$sql = "SELECT * FROM SuccessStory Where ID = ".$_GET['pid'];
$result = mysqli_query($conn, $sql);
$project_name ='';
$project_start='';
$project_end='';
$project_dscption='';
$project_video='';
$project_team='';

if (!$result) {
    echo $sql;
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

while ($row = mysqli_fetch_array($result)) {
    $story_name = $row['Name'];
    $project_start= $row['Timestart'];
    $project_end = $row['Timefinish'];
    $project_video = $row['Video'];
    $project_dscp = $row['Description'];
    $project_pic = $row['Picturel'];
    $project_name = $row['ProjectName'];
    $project_team = $row['Members'];

    $student_name = $row['StudentName'];
    $student_role = $row['StudentRole'];
    $student_pho = $row['StudentPhone'];
    $student_ema = $row['StudentEmail'];
    $student_des = $row['StudentDescription'];


}
$sql_mem = "SELECT Volunteer.FirstName, Volunteer.LastName  FROM ProjectTeam LEFT JOIN Volunteer ON ProjectTeam.VolunteerID=Volunteer.StudentID WHERE ProjectTeam.ProjectID = ".$_GET['pid'];
$result_mem = mysqli_query($conn, $sql_mem);

if (!$result_mem) {
    echo $sql_mem;
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

while ($row = mysqli_fetch_array($result_mem)) {
    $project_team.=$row['FirstName'].' '.$row['LastName'].'. ';
}
$conn->close();


?>


<!-- One -->
<style>  
       .wrapper-style3 {
width: 100%;  
height: 480px; 
background-image: url(images/banner8.jpg);
background-repeat:no-repeat;
background-size:100% 100%;
margin:-24px 0 0 0px;
}
</style>
<section id="One" class="wrapper-style3">
    <div align="center">
        <header>
            <h2>Story Never Ends</h2>
<p>Believe in yourself, and you can achieve too.</p>
        </header>
    </div>
</section>



    <!-- Main -->


                 <div class="container" style="background-color:#f2f2f2;">
  <center>                               
                  <div class="col-md-8">
                      <br><br><br><h2><?php echo $story_name;?></h2>
                    <p style="text-align:justify;"><?php echo $project_dscp; ?></p>
                      <p class="text-left"> Project Name: <?php echo $project_name; ?></p>               
                    <p class="text-left"> Project Start Date: <?php echo $project_start; ?><br>
                        Project End Date: <?php echo $project_end; ?></p>
                    <p class="text-left"> Team Members: <?php echo $project_team; ?></p>                              
                  </div>

                 
                   <!-- video section --!>
                   <div style="height: 400px;background-color:#f2f2f2;">
                     <video width="450px" height="300px" controls="controls" align="center" class="video">
                        <source src="<?php echo $project_video; ?>" type="video/mp4" />
                        <source src="<?php echo $project_video; ?>" type="video/ogg" />
                        <source src="<?php echo $project_video; ?>" type="video/webm" />
                        <object data="<?php echo $project_video; ?>" width="320" height="240">
                            <embed src="<?php echo $project_video; ?>" width="320" height="240" />
                        </object>
                       </video>
                   </div>
</center>
                </div>

    

<!-- CV section --!>
<div class="container" style="background-color:#f2f2f2;">
<center>
<div class="col-md-8" style="background-image:url(images/CV.jpg);background-size: 100%;">
                   <div class="media" >

                    <div class="media-left">
                     <br><img src="<?php echo $student_pic; ?>"class="img-rounded" style="width:200px;"></div>  
                               
                        <div style="width:10%;"></div>    
                      <div class="media-body"style="text-align:left;" >
                     <br><h3 class="media-heading"><?php echo $student_name; ?></h3>
                       <p><?php echo $student_role; ?>
                      <br>Phone:<?php echo $student_pho; ?>
                        <br><?php echo $student_ema; ?></p>
                        <p><?php echo $student_des; ?></p>
                         </div>
                         </div>
</div>
<div style="background-color:#f2f2f2;height:100px;"></div>
</center>
</div>


    <!-- Footer -->
<?php
include_once 'footer.html';
?>