<?php
/**
 * Application Form - Server-end Functions:
 * 1. export the form data to a excel that will be saved on the server and sent to an email as an attachment
 * 2. send application form to a specific email account attaching the excel form exported and the CV upload by the applicant
 * 3. insert the application data to the database
 * Created by Jing Effie Liu.
 * Date: 2018/11/17
 */



##################### 1. upload the file ######################################################

//$name = $_FILES["pic"]["name"];
//$tmp_name = $_FILES["pic"]["tmp_name"];
//
//
////save the picture to the server
//
//
//if (isset ($name)){
//    if(!empty($name)){
//        
//        $target_dir = 'attachments/Projects/';
//        $target_file_pic = $target_dir . basename($_FILES["pic"]["name"]);
//        $imageFileType = strtolower(pathinfo($target_file_pic,PATHINFO_EXTENSION))
//                                    
//        if (move_uploaded_file($tmp_name, $target_dir.$name)){
//            echo "The project picture ". basename( $_FILES["pic"]["name"]). " has been uploaded. 
//            ";
//        } else {
//            echo "Upload failed: ". $_FILES["pic"]["error"]." 
//            ";
//        }
//    }
//}





##################### 2. Submit to database #############################################
include_once 'dba.php';
mysqli_set_charset($conn,'utf8');
// 判断当前连接是否成功
if ($conn->connect_error) {
    die("Connection failed:: " . $conn->connect_error);
    exit();
}

//insert a record of the applicant
$sql_insertProject = "INSERT INTO SuccessStory (Name, Members, ProjectName, Timestart, Timefinish, Description, Picturel, Video, StudentName, StudentRole, StudentPhone, StudentEmail, StudentDescription, StudentPicture) VALUE ('".
    $_POST['StoryName']."', 
    '".$_POST['Members']."', 
    '".$_POST['ProjectName']."', 
    '".$_POST['StartDate']."', 
    '".$_POST['EndDate']."', 
    '".$_POST['StoryDescription']."', 
    '".$target_file_pic."',
    '".$_POST['Video']."',
    '".$_POST['StudentName']."',

    '".$_POST['StudentRole']."',
    '".$_POST['StudentPhone']."',
    '".$_POST['StudentEmail']."',
    '".$_POST['StudentDescription']."',
    '".$target_file_pic2."'

);
    ";


//echo 'sql:'.$sql_insertProjectSkills; //test code

$insertsql=$sql_insertProject;
//echo 'sql:'. $insertsql; //test code
$result1 = $conn->multi_query( $insertsql); //if only insert one record, use: $conn->query( $insertsql)
//$result2 = $conn->query( $sql_insertApplicantProjects);
//$result_prj = $conn->query( $sql_insertApplicantSkills);

// debug code
if($result1 === TRUE){
echo "<script> alert('create successfully.'); </script>"; 
echo "<meta http-equiv='Refresh' content='0;URL=SuccessStory2.php'>"; 


} else {
    echo "Error: ".$insertsql."<br>".mysqli_error($conn);
}


$target_dir = 'attachments/Projects/';
$target_file_pic = $target_dir . basename($_FILES["pic"]["name"]);
$uploadOk = 1;
if ($_FILES["pic"]["name"] ==''){
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


if ($uploadOk == 1){
    if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file_pic)){
        echo "The project picture ". basename( $_FILES["pic"]["name"]). " has been uploaded. 
        ";
    } else {
        echo "Upload failed: ". $_FILES["pic"]["error"]." 
        ";
    }
}

$conn->close();

?>

