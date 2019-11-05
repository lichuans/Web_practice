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
    if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file_pic)) {
        echo "The project picture ". basename( $_FILES["pic"]["name"]). " has been uploaded. 
        ";
    } else {
        echo "Upload failed: ". $_FILES["pic"]["error"]." 
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

//update project info
$sql_insertProject = "UPDATE Project SET Name='".$_POST['ProjectName']."', Category='".$_POST['Category']."', StartDate='".$_POST['StartDate']."', EndDate='".$_POST['EndDate']."', Description='".$_POST['Description']."',Picture='$target_file_pic' 
WHERE ID='".$_POST['ID']."'";



//echo $sql_insertApplicant; //test code


$sql_insertProjectSkills ='';
$pid = "SET @pid = LAST_INSERT_ID(); ";

//update skills
if(isset($_POST['skills'])){
    $skills = explode(';',$_POST['skills']);
    foreach ($skills as $skill){
        $skillvalue = $skill.'_value';
        $skillid = $skill.'_id';
        if(isset($_POST[$skillvalue]) && $_POST[$skillvalue] != ""){
            $sql_insertProjectSkills .= "UPDATE ProjectSkill SET SkillID= '".$_POST[$skillid]."', Proficiency= '".$_POST[$skillvalue]."' WHERE ProjectID='".$_POST['ID']."'";

        }
    }
}

//echo 'sql:'.$sql_insertProjectSkills; //test code

$insertsql=$sql_insertProject.$sql_insertProjectSkills;
//echo 'sql:'. $insertsql; //test code
$result1 = $conn->multi_query( $insertsql); //if only insert one record, use: $conn->query( $insertsql)
//$result2 = $conn->query( $sql_insertApplicantProjects);
//$result_prj = $conn->query( $sql_insertApplicantSkills);

// debug code
if($result1 === TRUE){
echo "<script> alert('Update Successfully.'); </script>"; 
echo "<meta http-equiv='Refresh' content='0;URL=project_list2.php?type=NEW'>"; 


} else {
    echo "Error: ".$insertsql."<br>".mysqli_error($conn);
}

$conn->close();

?>

