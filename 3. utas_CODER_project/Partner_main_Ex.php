<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css//bootstrap.min.css?v={<?php echo time() ?>}">
<link rel="stylesheet" href="assets/css/index.css?v={<?php echo time() ?>}">


<?php
/**
 * Partner_main Page
 * Created by Michael
 * Date: 2018/12/09
 */

//load header of the page
include_once 'header.html';
$title = $_GET['type'];
?>


<!-- One -->
<style>
.wrapper-style3 {
width: 100%;  
height: 480px; 
background-image: url(images/banner13.jpg);
background-repeat:no-repeat;
background-size:100% 100%;
margin:-40px 0 0 0px;
}
</style>

<section id="One" class="wrapper-style3">
    <div align="center">
        <header>
            <h2> EXTERNAL PARTNERS</h2>
   <a href="Partner_Application.php" class="btn btn-info" style="font-family:myriad pro;">Apply Partnership</a>  
        </header>
    </div>
</section>



<!-- Two -->
            <?php
            include_once 'Partner_main_Ex_readfromdb.php';
            ?>




<!-- Footer -->
<?php
include_once 'footer.html';
?>



