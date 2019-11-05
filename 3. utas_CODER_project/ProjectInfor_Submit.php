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
$sql_insertProject = "INSERT INTO Project (Name, Category, StartDate, EndDate, Description, Picture) VALUE ('".
    $_POST['ProjectName']."', '".
    $_POST['Category']."', '".
    $_POST['StartDate']."', '".
    $_POST['EndDate']."', '".
    $_POST['Description']."', '".
    $target_file_pic
    ."');
    ";

//echo $sql_insertApplicant; //test code


$sql_insertProjectSkills ='';
$pid = "SET @pid = LAST_INSERT_ID(); ";
//insert records for the relation table 'volunteer skills'
if(isset($_POST['skills'])){
    $skills = explode(';',$_POST['skills']);
    foreach ($skills as $skill){
        $skillvalue = $skill.'_value';
        $skillid = $skill.'_id';
        if(isset($_POST[$skillvalue]) && $_POST[$skillvalue] != ""){
            $sql_insertProjectSkills .= "INSERT INTO ProjectSkill (ProjectID, SkillID, Proficiency) VALUE (@pid, '".
                $_POST[$skillid]."', '".
                $_POST[$skillvalue]
                ."');
                ";

        }
    }
}

//echo 'sql:'.$sql_insertProjectSkills; //test code

$insertsql=$sql_insertProject.$pid.$sql_insertProjectSkills;
//echo 'sql:'. $insertsql; //test code
$result1 = $conn->multi_query( $insertsql); //if only insert one record, use: $conn->query( $insertsql)
//$result2 = $conn->query( $sql_insertApplicantProjects);
//$result_prj = $conn->query( $sql_insertApplicantSkills);

// debug code
if($result1 === TRUE){
echo "<script> alert('create successfully.'); </script>"; 
echo "<meta http-equiv='Refresh' content='0;URL=project_list2.php?type=NEW'>"; 


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

