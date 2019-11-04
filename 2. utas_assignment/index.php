<html>
<body>
<center>
<link rel="stylesheet" href="css/index.css?v={<?php echo time()?>}"> 
<body background="img/home.jpg" style=" background-repeat:no-repeat ; background-size:100% 100%; background-attachment: fixed;"> 


<div class="top-box">
<div class="heading">
<h1>Y.E.O.M</h1>
</div>
</div>

<?php
session_start();
include('db_conn.php');

if(isset($_POST['register']))
{header('Location: Register.php');
}

if(isset($_POST['login']))
{
  $ID=$_POST['ID'];
  $password=$_POST['password']; 

  $query = "SELECT * FROM cafeusers WHERE ID='$ID'";
  $result = $mysqli->query($query);
  $row=$result->fetch_array(MYSQLI_ASSOC);

if($row['ID']!=$ID || $ID=="")
     {
     header('Location: ./index.php?error');
     }
 
else {
       if($row['password']== MD5($password)){
        $_SESSION['ID']=$row['ID']; 
        $_SESSION['role']=$row['role'];
        $_SESSION['assigned_cafe']=$row['assigned_cafe'];
        $_SESSION['Username']=$row['Username'];
       header('Location: ./index.php');} 

       else{
       header('Location: ./index.php?error');}
     }
}
?>  
  
  

<?php

   if($_SESSION['ID']=="")
   {
	     if(isset($_GET['error']))
             {
           echo"<script>alert('Invalid ID or password.');</script>";
             }

         ?>

     <div class="tablepages">
     <table>
     <tr>
 <th><a href="Lazenbys_preorder.php" class="am-icon-sort-desc">Lazenbys Menu</a></th> 
 <th><a href="Ref_preorder.php" class="am-icon-sort-desc">The Ref Menu</a></th> 
 <th><a href="TradeTable_preorder.php" class="am-icon-sort-desc">The Trade Table Menu</a></th> 
     <th><a href="Register.php" class="am-icon-sort-desc">Register Now</a></th> 
     </tr>
     </table>
     </div>


	
         <h2 style='font-size:17px;color:white;font-weight:bold;'><br><br>Please login</h2>         
         <div class="container">
         <div class="login">

         <form method="post" action="">
<table id='table-2'  style="font:Verdana;color:grey;font-size:16px;text-align:left">
<tr><th>ID</th><td><input type="text" name="ID" value="" placeholder="student or staff ID"></th></tr>
<tr><th>Password</th><td><input type="password" name="password" value="" placeholder="Password"></th></tr>
</table>
                       <input type="submit" name="login" value="Login">   
       </form>
       </div>
       </div>
       </body>
        <?php		
   }


else{ 
     if($_SESSION['role']=='director')
     {
      
      ?>	
     <div class="tablepages">
     <table>
     <tr>
     <th><a href="ListPage.php" class="am-icon-sort-desc">Master Food List</a></th>
     <th><a href="staff_list.php" class="am-icon-sort-desc">User Management</a></th>
     <th><a href="logout.php" class="logout">Logout</a></th>    
     </tr>
     </table>
   </div>
     <?php
 echo "<h3 style='font-size:17px;color:white;font-weight:bold;'><br><br>Welcome Director ".$_SESSION['ID'];
    echo "<Br>Now you can edit the list page.";
      }

 
    if($_SESSION['role']=='manager'){ 
 
 if($_SESSION['assigned_cafe']=='lazenbys'){
         ?>	
     <div class="tablepages">
    <table>
    <tr>
    <th><a href="order_list.php" class="am-icon-sort-asc">Order List</a></th>
     <th><a href="ListPage2.php" class="am-icon-sort-desc">Cafe Menu Management</a></th>
     <th><a href="logout.php" class="am-icon-sort-desc">Logout</a></th>      
    </tr>
    </table>
     </div>
     <?php
    echo "<h3 style='font-size:17px;color:white;font-weight:bold;'><br><br>Welcome Manager".$_SESSION['ID'];
    echo "<Br>Now you can manage your Cafe Lazenbys.";
} 

 if($_SESSION['assigned_cafe']=='ref'){
         ?>	
     <div class="tablepages">
    <table>
    <tr>
    <th><a href="order_list.php" class="am-icon-sort-asc">Order List</a></th>
     <th><a href="ListPage2.php" class="am-icon-sort-desc">Cafe Menu Management</a></th>
     <th><a href="logout.php" class="am-icon-sort-desc">Logout</a></th>      
    </tr>
    </table>
     </div>
     <?php
    echo "<h3 style='font-size:17px;color:white;font-weight:bold;'><br><br>Welcome Manager".$_SESSION['ID'];
    echo "<Br>Now you can manage your Cafe The Ref.";
} 
 if($_SESSION['assigned_cafe']=='tradetable'){
         ?>	
     <div class="tablepages">
    <table>
    <tr>
    <th><a href="order_list.php" class="am-icon-sort-asc">Order List</a></th>
     <th><a href="ListPage2.php" class="am-icon-sort-desc">Cafe Menu Management</a></th>
     <th><a href="logout.php" class="am-icon-sort-desc">Logout</a></th>      
    </tr>
    </table>
     </div>
     <?php
    echo "<h3 style='font-size:17px;color:white;font-weight:bold;'><br><br>Welcome Manager".$_SESSION['ID'];
    echo "<Br>Now you can manage your Cafe The Trade Table.";
} 


     }


if($_SESSION['role']=='staff'){      
          ?>	
     <div class="tablepages">
    <table>
    <tr>
    <th><a href="order_list.php" class="am-icon-sort-asc">Order List</a></th>
     <th><a href="logout.php" class="am-icon-sort-desc">Logout</a></th>      
    </tr>
    </table>
     </div>
     <?php
    echo "<h3 style='font-size:17px;color:white;font-weight:bold;'><br><br>Welcome ".$_SESSION['ID'];
    echo "<Br>Now you can care the order in Cafe Lazenbys.";
      }



       
 if($_SESSION['role']=='students'||$_SESSION['role']=='employees')
     {
 if($_SESSION['assigned_cafe']=='lazenbys'){
          ?>	
     <div class="tablepages">
    <table>
    <tr>
    <th><a href="Lazenbys.php" class="am-icon-sort-asc">Lazenbys Cafe</a></th>
    <th><a href="my_order.php" class="am-icon-sort-asc">My Order List</a></th>
    <th><a href="useraccount.php" class="am-icon-sort-asc">User Account</a></th>
    <th><a href="usermanage.php" class="am-icon-sort-asc">User Management</a></th>
    <th><a href="logout.php" class="logout">Logout</a></th>       
    </tr>
    </table>
     </div>
     <?php
    echo "<h3 style='font-size:17px;color:white;font-weight:bold;'><br><br>Welcome ".$_SESSION['ID'];
    echo "<Br>Now you can order in Cafe Lazenbys.";
    echo "<Br>If you want to change your Cafe, go User Manage Page.";     }


if($_SESSION['assigned_cafe']=='ref'){
         ?>	
     <div class="tablepages">
    <table>
    <tr>
    <th><a href="Ref.php" class="am-icon-sort-asc">Ref Cafe</a></th>
    <th><a href="my_order.php" class="am-icon-sort-asc">My Order</a></th>
    <th><a href="useraccount.php" class="am-icon-sort-asc">User Account</a></th>
    <th><a href="usermanage.php" class="am-icon-sort-asc">User Management</a></th>
    <th><a href="logout.php" class="logout">Logout</a></th>       
    </tr>
    </table>
     </div>
     <?php
    echo "<h3 style='font-size:17px;color:white;font-weight:bold;'><br><br>Welcome ".$_SESSION['ID'];
    echo "<Br>Now you can order in Cafe The Ref.";
    echo "<Br>If you want to change your Cafe, go User Manage Page.";
      }



if($_SESSION['assigned_cafe']=='tradetable'){
       ?>	
     <div class="tablepages">
    <table>
    <tr>
    <th><a href="TradeTable.php" class="am-icon-sort-asc">TradeTable Cafe</a></th>
    <th><a href="my_order.php" class="am-icon-sort-asc">My Order</a></th>
    <th><a href="useraccount.php" class="am-icon-sort-asc">User Account</a></th>
    <th><a href="usermanage.php" class="am-icon-sort-asc">User Management</a></th>
    <th><a href="logout.php" class="logout">Logout</a></th>       
    </tr>
    </table>
     </div>
     <?php
    echo "<h3 style='font-size:17px;color:white;font-weight:bold;'><br><br>Welcome ".$_SESSION['ID'];
    echo "<Br>Now you can order in Cafe The Tradetable.";
    echo "<Br>If you want to change your Cafe, go User Manage Page.";
      }


       }


  }
 ?>
</center>
</body>
</html>