<?php
/**
 * Application Form - Server-end Functions:
 * 1. export the form data to a excel that will be saved on the server and sent to an email as an attachment
 * 2. send application form to a specific email account attaching the excel form exported and the CV upload by the applicant
 * 3. insert the application data to the database
 * Created by Weibo Chen.
 * Date: 2018/12/7
 */



##################### 1. upload the file ######################################################
//$target_dir = 'attachments/Projects/';
$target_dir = 'attachments/Parnters/';
$target_file_pic = $target_dir . basename($_FILES["Picture"]["name"]);
$uploadOk = 1;
if ($_FILES["Picture"]["name"] ==''){
    $uploadOk = 0;
}

$imageFileType = strtolower(pathinfo($target_file_pic,PATHINFO_EXTENSION));

/* Check file size
if ($_FILES["pic"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
*/

//save the picture to the server
$name = $_FILES["Picture"]["name"];
$tmp_name = $_FILES["Picture"]["tmp_name"];

if ($uploadOk == 1){
    if (move_uploaded_file($_FILES["Picture"]["tmp_name"], $target_file_pic)){
        echo "The project picture ". basename( $_FILES["Picture"]["name"]). " has been uploaded. 
        ";
    } else {
        echo "Upload failed: ". $_FILES["Picture"]["error"]." 
        ";
    }
}

$target_file_picm = $target_dir . basename($_FILES["Picturem"]["name"]);
$uploadOk = 1;
if ($_FILES["Picturem"]["name"] ==''){
    $uploadOk = 0;
}

$imageFileTypem = strtolower(pathinfo($target_file_picm,PATHINFO_EXTENSION));

//save the picture to the server
$namem = $_FILES["Picturem"]["name"];
$tmp_namem = $_FILES["Picturem"]["tmp_name"];

if ($uploadOk == 1){
    if (move_uploaded_file($_FILES["Picturem"]["tmp_name"], $target_file_picm)){
        echo "The project picture ". basename( $_FILES["Picturem"]["name"]). " has been uploaded. 
        ";
    } else {
        echo "Upload failed: ". $_FILES["Picturem"]["error"]." 
        ";
    }
}

##################### 2. Submit to database #############################################
include_once 'dba.php';
mysqli_set_charset($conn,'utf8');
// 判断当前连接是否成功
if ($conn->connect_error) {
    die("Connection failed:: " . $conn->connect_error);
    exit();
}

//insert a record of the applicant
$sql_insertProject = "INSERT INTO PartnersEx (Name, Picture, Description, Membername, Picturem, Memberposition,Memberdepart,Memberphone,Memberemail,Memberdescrip) VALUE ('".
    $_POST['Name']."', '".
    $_POST['Description']."', '".
    $_POST['Membername']."', '".
    $_POST['Memberposition']."', '".
    $_POST['Memberdepart']."', '".
    $_POST['Memberphone']."', '".
    $_POST['Memberemail']."', '".
    $_POST['Memberdescrip']."', '".
    $target_file_pic
    $target_file_picm
    ."');
    ";


// debug code
if($result1 === TRUE){
echo "<script> alert('create successfully.'); </script>"; 
echo "<meta http-equiv='Refresh' content='0;URL=project_list2.php?type=NEW'>"; 


} else {
    echo "Error: ".$insertsql."<br>".mysqli_error($conn);
}

$conn->close();

?>

