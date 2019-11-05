<link rel="stylesheet" href="assets/css/index.css?v={<?php echo time() ?>}">
<?php
/**
 * Projects Page Display
 * Created by Jing Effie Liu.
 * Date: 2018/11/18
 */

include 'session.php';


	


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
margin:-24px 0 0 0px;
}
       </style>
<section id="One" class="wrapper-style3">
    <div calign="center">
        <header>
            <h2>Edit the <?php echo $title ?> Projects</h2>
   <a href="ProjectInformation.php" class="alt" >Create A New Project</a>  

        </header>
    </div>
</section>




<!-- Two -->
<?php
include_once 'project_list_readfromdb3.php';
?>



<!-- Footer -->
<?php
include_once 'footer.html';
?>
