
<?php
/**
 * Add a Partners and save the data to database
 * Created by Michael
 * Date: 2018/12/11
 */


##################### 2. Submit to database #############################################
include_once 'dba.php';
mysqli_set_charset($conn,'utf8');
// 判断当前连接是否成功
if ($conn->connect_error) {
    die("Connection failed:: " . $conn->connect_error);
    exit();
}

//insert a record of the applicant
$sql_insertProject = "INSERT INTO PartnersEx (Name, Picture, Description, ClientName, ClientPosition, ClientEmail, Website, ClientDescription, ClientPicture) VALUE ('".
    $_POST['ParterName']."', 
    '".$target_file_pic."',
    '".$_POST['PartnerDescription']."', 
    '".$_POST['ClientName']."', 
    '".$_POST['ClientPosition']."', 
    '".$_POST['ClientEmail']."', 
    '".$_POST['Website']."',
    '".$_POST['ClientDescription']."',
    '".$target_file_pic."'
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
echo "<meta http-equiv='Refresh' content='0;URL=Partner_main_Ex2.php'>"; 


} else {
    echo "Error: ".$insertsql."<br>".mysqli_error($conn);
}


$target_dir = 'attachments/Partners/';
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

