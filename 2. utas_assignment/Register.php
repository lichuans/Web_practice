﻿<html>
<body>
<center>
<link rel="stylesheet" href="css/index.css?v={<?php echo time()?>}"> 

<div class="top-box">
<div class="heading"><h1>Register Now</h1></div>
</div>


<div class="tablepages">
<table>
<tr>
<th><a href="index.php" class="am-icon-sort-asc">Home</a></th>   
</tr>
</table>
</div>


<?php
echo "<div class='reminder'>";
echo "<p>";
echo "<h2>Password Length must within 6-12; Must Contains A-Z, a-z, number and one of 4 special letter(~!@#)</h2>";
echo "</p>";
echo "</div>";
?>


       <div class="main-box">
        <div class="right-box">
         <div class="form-box">
<form method='post' action='' id="form">
<table id='table-1'>
<tr>
<td>Role: </td>
<td>
<select name="role">
<option value="students">students</option>
<option value="employees">employees</option>
</select>                              
</td>
</tr>

<tr>
<td>Most visit Cafe: </td>
<td>
<select name="assigned_cafe">
<option value="lazenbys">Lazenbys</option>
<option value="ref">The ref</option>
<option value="tradetable">The tradetable</option>
</select>                              
</td>
</tr>

<tr>
<td>Name: </td>
<td>
<input type="text" name="username" />
</td>
</tr>
                        
                        <tr>
                       <td>Student/Staff ID: </td>
                        <td><input type="number" name="ID" required /></td>                            
                        </tr>
                        
                        <tr>
                            <td>Email: </td>
                            <td><input type="text" name="Email" /></td>
                        </tr>
                        <tr>
                            <td>Telephone: </td>
                                                            <td> <input type="number" name="Telephone"/></td>
                            
                        </tr>
                       
                        <tr>
                            <td><label>Password: </label></td>
                                                                        <td> <input type="password" name="password" id="p1" />                                                                         

                        </tr>
                        <tr>
                            <td><label>Retype password: </td>
                                                                        <td><input type="password" name="retype" id="p2" />
                            </td>
                        </tr>

 



<tr>
<td>Credit Card Type:</td>
<td>
<select name="cardtype">
<option value="master">master</option>
<option value="visa">visa</option>
<option value="AmEx">AmEx</option>
</select>                              
</td>
</tr>




<tr>
<td>Card Number</td> 
<td><input id=cardnumber name=cardnumber type=number /></td>
</tr>

<tr>
<td>Security Code</td>
<td><input id=secure name=securitycode type=number /></td>
</tr>

<tr>
<td>Expiry Date</td>
<td><input id=exdate name=expirydate type=number /></td>
</tr>

<tr>
<td>Name on Card</td>
<td><input id=namecard name=nameoncard type=text /></td>
</tr>              
                         
</table>
<input class="submit" type="submit" name="signup" value="Sign up" id="submit" />
</form>
</div>
</div>
</div>

<?php
session_start();
include("db_conn.php");

if(isset($_POST['signup']))
{
  $role=$_POST['role'];
  $assigned_cafe=$_POST['assigned_cafe'];
  $ID=$_POST['ID'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $encrypt_password=MD5($password); 
  $Email=$_POST['Email'];
  $Telephone=$_POST['Telephone'];
  $cardtype=$_POST['cardtype'];
  $cardnumber=$_POST['cardnumber'];
  $securitycode=$_POST['securitycode'];
  $expirydate=$_POST['expirydate'];
  $nameoncard=$_POST['nameoncard'];
  $retype=$_POST['retype'];

  $query = "SELECT * FROM cafeusers WHERE ID='$ID'";
  $result = $mysqli->query($query);
  $row=$result->fetch_array(MYSQLI_ASSOC);


   if($row['ID']!=$ID)
   {
      if($retype==$password) 
      {
      $query="INSERT INTO cafeusers (ID, username, Email, Telephone, password, Creditcardtype, Cardnumber, Securitycode, Expirydate, Nameoncard, access, role, assigned_cafe) VALUES ('$ID','$username','$Email','$Telephone','$encrypt_password','$cardtype','$cardnumber','$securitycode','$expirydate','$nameoncard','4','$role','$assigned_cafe')";
      $result = $mysqli->query($query);
        $_SESSION['ID']=$ID; 
        $_SESSION['role']=$role;
        $_SESSION['assigned_cafe']=$assigned_cafe;
      header('Location: index.php');
      } 
      else{
 echo"<script>alert('Retype Password is not the same as Password');</script>";
      }
      }
   else{
 echo"<script>alert('ID has already existed');</script>";
       }
}
?>  


<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        var submit = $('#submit');        
        $('#form').submit(function() {
            var p1 = $('#p1').val();
            var p2 = $('#p2').val();
            if(p1 != p2) {
                alert('Two passwords are inconsistent');
                return false;
            }
           
            var reg1 = /[a-z]/;
            var reg2 = /[A-Z]/;
            var reg3 = /[~ ! # $]/;
            var reg4 = /[0-9]/;
            var len = p1.length;

            if(!reg1.test(p1)) {
                alert('Include at least one lowercase letter');
                return false;
            }
            if(!reg2.test(p1)) {
                alert('Include at least one uppercase letter');
                return false;
            }
            if(!reg3.test(p1)) {
                alert('Contains at least one special character');
                return false;
            }
            if(!reg4.test(p1)) {
                alert('Include at least one number');
                return false;
            }
            if(len < 6 || len > 12) {
                alert('6-12 characters in length');
                return false;
            }
        });
    </script>



</body>
</html>