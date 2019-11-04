<?php
session_start();
include("db_conn.php");

$id=$_POST['id'];
$sql= "SELECT * FROM guestbook WHERE ID='$id'";
$result=$mysqli->query($sql);
$row=$result->fetch_array(MYSQLI_ASSOC);

$post="";

if (isset($_POST['edit'])){

    if($id== $row['ID']){

          $session_id=$row['ID'];
          $_SESSION['id']=$session_id;
          $session_edit=$_POST['edit'];
          $_SESSION['edit']=$session_edit;
          $post=$_POST['edit'];
          unset($_SESSION['delete']);
         
             
    }else{
          $session_id="";
          echo "<script>alert('Edit: Wrong ID!'); </script>";
    }
}

if(isset($_POST['delete'])){

    if($id== $row['ID']){
          $session_id=$row['ID'];
          $_SESSION['id']=$session_id;
          $session_delete=$_POST['delete'];
          $_SESSION['delete']=$session_delete;
          $post=$_POST['delete'];
          unset($_SESSION['edit']);
          

    }else{
          $session_id="";
          echo "<script>alert('Delete: Wrong ID!''); </script>";
    }
}

?>





<html>
<head>
	<title>Guestbook</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>
        <h1>Authentication :</h1>
        [<a href="./list.php">Go Back to list</a>]

        <form action="" method="post">
        <table id="form">


	<tr> 
	<!-- you should let the user know which activity (edit or delete) they do-->
    	<td colspan="2"> Enter the password to <?php echo $post//put the mode here ?> the comment.</td>
  	</tr>
	

        <tr> 
	<!-- you should show the ID number of the selected comment in the disabled textfield. Disabled textfield is not clickable-->
      	<td class="details">ID</td>
     	<td><input name="id" value="<?php echo $id//put the id of selected comments***** ?>" disabled />
               <input type="hidden" name="id" value="<?php echo $id?>"></td>
        </tr>
        

        <tr>
        <!--password field for authenticating-->
    	<td class="details">Password</td>
      	<td><input name="password" type="password"></td>
        </tr>
    

        <tr>
   	<td class="submit" colspan="2"><input type="submit" name="auth_submit" value="Submit"><input type="reset" value="Reset"></td>
        </tr>

        </table>
        </form>

<?php

if(isset($_POST['auth_submit'])){
  
    $id=$_POST['id'];
    $password=$_POST['password'];
    $sql="SELECT * FROM guestbook WHERE ID='$id';";
    $result=$mysqli ->query($sql);
    $row=$result->fetch_array(MYSQLI_ASSOC);
   
    if($row['ID']== $id && $row['password'] == MD5($password)){
          
         if(isset($_SESSION['edit'])){
          
              $session_id=$_POST['ID'];
              $_SESSION['edit']="edit"; 
              $_SESSION['name']=$row['name'];                       
              $_SESSION['password']=$row['password'];                       
              $_SESSION['email']=$row['email'];                          
              $_SESSION['url']=$row['url'];                         
              $_SESSION['comments']=$row['comments'];
             
              header('Location: form.php');
          }
          elseif(isset($_SESSION['delete'])){
            
              
              $_SESSION['delete']=$session_delete;

              $deletequery="DELETE FROM guestbook WHERE ID = '$id'";
              $result=$mysqli ->query($deletequery);

              echo "<script>alert('Delete completely!')</script>";
              header('Location: list.php');
          }
    }else{
            echo "<script>alert('Invaild password!')</script>"; 
          }
}
?>


</body>
</html>
