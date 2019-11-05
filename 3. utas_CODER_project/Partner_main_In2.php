<link rel="stylesheet" href="assets/css/index.css?v={<?php echo time()?>}">
<?php
/**
 * Partner_main Page
 * Created by Michael
 * Date: 2018/12/09
 */

//load header of the page
include_once 'header2.html';
$title = $_GET['type'];
?>


<!-- One -->
<style>
.wrapper-style3 {
width: 100%;  
height: 480px; 
background-image: url(images/banner19.jpg);
background-repeat:no-repeat;
background-size:100% 100%;
margin:-40px 0 0 0px;
}
</style>

<section id="One" class="wrapper-style3">
    <div align="center">
        <header>
            <h2> INTERNAL PARTNERS</h2>
   <a href="PartnerCreation_In.php" class="alt" >Create an Internal Partner</a>  
        </header>
    </div>
</section>



<!-- Two -->
            <?php
            include_once 'Partner_main_In_readfromdb2.php';
            ?>




<!-- Footer -->
<?php
include_once 'footer.html';
?>



