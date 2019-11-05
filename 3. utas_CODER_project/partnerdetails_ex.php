<link rel="stylesheet" href="assets/css/index.css?v={<?php echo time()?>}"> 
<meta name="viewport" content="width=device-width, user-scalable=no">
<link rel="stylesheet" href="assets/css//bootstrap.min.css?v={<?php echo time() ?>}">
<?php

///load header of the page
include_once 'header.html';

//connect the database
include_once 'dba.php';
mysqli_set_charset($conn, 'utf8');

// check the connection with the database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    exit();
}


//read and display projects
$sql = "SELECT * FROM PartnersEx Where ID = ".$_GET['pid'];
$result = mysqli_query($conn, $sql);
$partner_name ='';
$partner_dscption='';
$partner_memberName='';
$partner_picm='';
$partner_memberposition='';
$partner_memberdepart='';
$partner_memberphone='';
$partner_memberemail='';
$partner_memberdescrip='';

if (!$result) {
    echo $sql;
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

while ($row = mysqli_fetch_array($result)) {
    $partner_name = $row['Name'];
    $partner_pic = $row['Picture'];
    $partner_des = $row['Description'];

    $client_name = $row['ClientName'];
    $client_pos = $row['ClientPosition'];
    $client_ema = $row['ClientEmail'];
    $website = $row['Website'];
    $client_des = $row['ClientDescription'];
    $client_pic = $row['ClientPicture'];
    $client_pho = $row['ClientPhone'];
    $client_dep = $row['ClientDepartment'];

}





?>







    <!-- One -->

  <style>  
       .wrapper-style3 {
width: 100%;  
height: 480px; 
background-image: url(images/banner7.jpg);
background-repeat:no-repeat;
background-size:100% 100%;
margin:-24px 0 0 0px;
}
       </style>
<section id="One" class="wrapper-style3">
      <div align="center">
      <header>
      <h2><?php echo $partner_name;?></h2>
      <p>The Tasmania Organization that helps our students to gain access to industry.</p>
        </header>
    </div>
</section>




    <!-- Two -->
                <div class="container">
                <div class="row" style="background-color:#f2f2f2;">                  
                    <div class="col-md-2"></div>

                    <div class="col-md-8">
                    <br><br><h2><?php echo $partner_name;?></h2>
                    <p style="text-align:justify;"><?php echo $partner_des; ?></p>

                      
                     <div class="media">
                     <div class="col-md-12"></div>
                    <div class="media-left"><h4>Contact</h4>
                     <img src="<?php echo $client_pic; ?>" class="media-object rounded-circle" style="width:200px;height:200px;"></div>
                   <div class="col-md-1"></div>                     
                      <div class="media-body"style="text-align:left;" >
                     <br><br><br><br><h3 class="media-heading"><?php echo $client_name; ?></h3>
                       <p><?php echo $client_pos; ?>
                        <br><?php echo $client_dep; ?>
                        <br>Phone:<?php echo $client_pho; ?>
                        <br><?php echo $client_ema; ?></p>
                         </div>
                         </div>
                     <p style="text-align:justify;"><?php echo $client_des; ?></p>


                   </div>

            </div>
        </div>


<!-- logo section --!>
<div class="container" >
<div class="row" style="height: 250px;background-color:#f2f2f2;">
<img src="<?php echo $$partner_pic; ?>" class="mx-auto d-block" style="width:150px;height:150px;">
</div>
</div>



    <!-- Footer -->
<?php
$conn->close();
include_once 'footer.html';
?>