<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css//bootstrap.min.css?v={<?php echo time() ?>}">
<link rel="stylesheet" href="assets/css/index.css?v={<?php echo time() ?>}">
<?php
/**
 * Created by Lichuan sun.
 * Date: 2018/12/2
 */


//connect the database
include 'dba.php';
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


       .wrapper-style6 {
width: 100%;  
height: 100%; 
background-image: url(images/banner19.jpg);
background-repeat:no-repeat;
background-size:100% 100%;
margin:-24px 0 0 0px;
}

/*
 body {
    font-size: 120%;
    background: #f8f8ff;
}
.content {
        align-content: center;
    display: flex;
    }
*/
    
form {
    width: 30%;
    margin: 0px auto;
    padding: 20px;
    border: 1px solid #b0c4de;
    background: white;
    border-radius: 0px 0px 10px 10px;
}

.input-group {
    margin: 10px 0px 10px 0px;
}

.input-group label {
    display: block;
    text-align: left;
    margin: 3px;
    font-family: myriad pro;
}

.input-group input {
    height: 30px;
    width: 93%;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 10x solid gray;
}

.btn {
    padding: 10px;
    font-size: 15px;
    color: white;
    background: #afb1b5;
    border: none;
    border-radius: 5px;
    font-family: myriad pro;
}
</style>




<?php
session_start();

if(isset($_POST['login']))
{
  $username=$_POST['username'];
  $password=$_POST['password']; 

  $query = "SELECT * FROM Users WHERE username='$username'";
  $result = $conn->query($query);
  $row=$result->fetch_array(MYSQLI_ASSOC);

if($row['username']!=$username || $username=="")
     {
     header('Location: ./login.php?error');
     }
 
else {
       if($row['password']== $password){
        $_SESSION['Username']=$row['username'];
       header('Location: ./login.php');} 

       else{
       header('Location: ./login.php?error');}
     }
}
?>  






<?php

   if($_SESSION['Username']=="")
   {
	     if(isset($_GET['error']))
             {
           echo"<script>alert('Invalid Username or Password.');</script>";
             }
//load header of the page
include_once 'header.html';     
   ?>  
<section id="One" class="wrapper-style3">
    <div align="center">
        <header>
            <h2>Admin Login</h2>
 <p>This page is for Administration login.</p>
        </header>
    </div>
</section>


      <br> 
      <br> 
         <div class="container" style="text-align:center;">
         <div class="login" align="center" class="form-inline">
 <form method="post" action="">
        <div class="input-group">
            <label for="">Username</label>
            <input type="text" name="username" placeholder="Enter Username">
        </div>
        <div class="input-group">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="Enter Password">
        </div>
        <div class="input-group">
            <button type="submit" name="login" class="btn">Login</button>
        </div>
    </form>
</div>
</div>
<!--
         <div class="container" style="text-align:center;">
         <div class="login" align="center" class="form-inline">

         <form method="post" action="" >
<table id="table-1" class="table" style="font:myriad pro;font-size:25px;text-align:left">
<tr><th>Username</th><th><input type="text" class="form-control" name="username" placeholder="Staff Username"></th>
<th>Password</th><th><input type="password" class="form-control" name="password" placeholder="Password"></th>
<th><input type="submit" name="login" value="Login" class="btn btn-info" style="font-family:myriad pro;"></th></tr>
</table>

                       
       </form>
       </div>
       </div>
-->
       </body>
        <?php		
     }


else{       
	
       include_once 'header2.html';


 ?>  
<section id="One" class="wrapper-style6">
    <div align="center">
        <header>
            <h2>Welcome</h2>
 <p>This page is for Administration Operation.</p>
        </header>
    </div>
</section>
 <?php

     }

 ?>


