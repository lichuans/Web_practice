<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="assets/css/index.css?v={<?php echo time() ?>}">
<link rel="stylesheet" href="assets/css//bootstrap.min.css?v={<?php echo time() ?>}">

<?php
/**
 * SuccessStory Page
 * Created by Weibo Chen
 * Date: 2018/11/24
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
            <h2>Success Story</h2>
  <p>Read about the impact our students are making when matched with industry.</p>          
        </header>
    </div>
</section>



<!-- Two -->
<?php
 include_once 'success_story_readfromdb.php';
?>




<!-- Footer -->
<?php
include_once 'footer.html';
?>



