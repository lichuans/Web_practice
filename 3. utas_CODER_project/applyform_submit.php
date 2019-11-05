<?php
/**
 * Application Form - Server-end Functions:
 * 1. export the form data to a excel that will be saved on the server and sent to an email as an attachment
 * 2. send application form to a specific email account attaching the excel form exported and the CV upload by the applicant
 * 3. insert the application data to the database
 * Created by Jing Effie Liu.
 * Date: 2018/11/17
 */

##################### 1. Save Application Form data to Excel ############################
require_once 'assets/js/thirdParty/PHPExcel.php';

//create PHPExcel object
$excel = new PHPExcel();

//insert some data to PHPExcel object
$excel -> setActiveSheetIndex(0)
    -> setCellValue('A1','StudentID')
    -> setCellValue('B1','FirstName')
    -> setCellValue('C1','LastName')
    -> setCellValue('D1','Project Preference 1')
    -> setCellValue('E1','Project Preference 2')
    -> setCellValue('F1','Project Preference 3')
    -> setCellValue('G1','Study Area')
    -> setCellValue('H1','Degree')
    -> setCellValue('I1','Study Year')
    -> setCellValue('J1','Campus')
    -> setCellValue('K1','Experience')
    -> setCellValue('L1','CV')
    -> setCellValue('M1','Programming Skills')


    -> setCellValue('A2',$_POST['sid'])
    -> setCellValue('B2',$_POST['firstname'])
    -> setCellValue('C2',$_POST['lastname'])
    -> setCellValue('D2',$_POST['prjprefer1_value'])
    -> setCellValue('E2',$_POST['prjprefer2_value'])
    -> setCellValue('F2',$_POST['prjprefer3_value'])
    -> setCellValue('G2',$_POST['studyarea'])
    -> setCellValue('H2',$_POST['degree'])
    -> setCellValue('I2',$_POST['year'])
    -> setCellValue('J2',$_POST['campus'])
    -> setCellValue('K2',$_POST['experience'])
    -> setCellValue('M2',$_POST['otherskills'])
    ;

$target_dir = "attachments/Applicants";
$target_file_applyform = "Coder_ApplicationForm_".$_POST['sid']."_".$_POST['firstname']."_".$_POST['lastname'].".xlsx";
/* remove it, now won't upload until save to the database
//write the result to a file
$file = PHPExcel_IOFactory::createWriter($excel,'Excel2007');
//output to filename directly
$file->save($target_dir.$target_file_applyform);
*/

##################### End 1 #############################################################

##################### 2. upload CV ######################################################
$target_file_cv = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file_cv,PATHINFO_EXTENSION));
/* Check if file already exists
if (file_exists($target_file_cv)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

##################### 4. Submit to database #############################################
include_once 'dba.php';
mysqli_set_charset($conn,'utf8');
// 判断当前连接是否成功
if ($conn->connect_error) {
    die("Connection failed:: " . $conn->connect_error);
    exit();
}
//insert a record of the applicant
$sql_insertApplicant = "INSERT INTO Volunteer (StudentID, FirstName, LastName, StudyArea, Degree, StudyYear, Campus, OtherSkills, Experience, CV) VALUE ('".
    $_POST['sid']."', '".
    $_POST['firstname']."', '".
    $_POST['lastname']."', '".
    $_POST['studyarea']."', '".
    $_POST['degree']."', '".
    $_POST['year']."', '".
    $_POST['campus']."', '".
    $_POST['otherskills']."', '".
    $_POST['experience']."', '".
    $target_file_cv
    ."');
    ";

//echo $sql_insertApplicant; //test code

$sql_insertApplicantProjects ='';
//insert records for the relation table 'volunteer prefers to the projects'
for($i = 1; $i<4; $i++) {
    $prj = 'prjprefer'.$i.'_id';
    if (isset($_POST[$prj]) && $_POST[$prj] != "") {
        $sql_insertApplicantProjects .= "INSERT INTO StudentPreferredPrjocts VALUE ('" .
            $_POST['sid'] . "', '" .
            $_POST[$prj]
            . "');
            ";
    }
}
//echo $sql_insertApplicantProjects; //test code

$sql_insertApplicantSkills ='';
$cell_ascii=ord('N'); //fill the excel cell from N1
//insert records for the relation table 'volunteer skills'
if(isset($_POST['skills'])){
    $skills = explode(';',$_POST['skills']);
    foreach ($skills as $skill){
        $skillvalue = $skill.'_value';
        $skillid = $skill.'_id';
        if(isset($_POST[$skillvalue]) && $_POST[$skillvalue] != ""){
            $sql_insertApplicantSkills .= "INSERT INTO StudentSkills (StudentID, SkillID, Proficiency) VALUE ('".
                $_POST['sid']."', '".
                $_POST[$skillid]."', '".
                $_POST[$skillvalue]
                ."');
                ";
            //fill the excel
            $cell=chr($cell_ascii);
            $excel -> setActiveSheetIndex(0)
             -> setCellValue($cell.'1',$skill)
            -> setCellValue($cell.'2',$_POST[$skillvalue]);
            $cell_ascii++;
        }
    }
}

//echo $sql_insertApplicantSkills;

$insertsql=$sql_insertApplicant.$sql_insertApplicantProjects.$sql_insertApplicantSkills;
//echo $insertsql; test code
$result1 = $conn->multi_query( $insertsql); //if only insert one record, use: $conn->query( $insertsql)
//$result2 = $conn->query( $sql_insertApplicantProjects);
//$result_prj = $conn->query( $sql_insertApplicantSkills);

// debug code
if($result1 === TRUE){
    echo "insert successfully";
} else {
    echo "Error: ".$insertsql."<br>".mysqli_error($conn);
}

$conn->close();
##################### End 4 #############################################################

##################### 3. Send an email to specific account ##############################
require_once ('assets/js/thirdParty/PHPMailer-5.2-stable/PHPMailerAutoload.php');

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure='STARTTLS';
$mail->Host='smtp-mail.outlook.com';
$mail->Port='587';
$mail->isHTML();
$mail->Username = 'XXXX@utas.edu.au'; //sender email account
$mail->Password = 'XXXX'; //sender email account password
$mail->SetFrom('jliu40@utas.edu.au'); //sung.hjt@gmail.com
$mail->Subject=$target_file_applyform;
$mail->Body="FYI";
$mail->addAddress('jliu40@utas.edu.au'); // test email sung.hjt@gmail.com
//attach CV
if ($uploadOk == 0){
    $excel -> setActiveSheetIndex(0) -> setCellValue('L2','No');
} else if ($uploadOk == 1){
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file_cv)) {
        echo "Your CV ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $excel -> setActiveSheetIndex(0) -> setCellValue('L2','Yes');
    } else {
        echo "Sorry, there was an error uploading your CV.";
        $excel -> setActiveSheetIndex(0) -> setCellValue('L2','No');
    }
    $mail->addAttachment($target_file_cv, $target_file_cv,'base64',"mime/type");
}
//write the result to a file
$file = PHPExcel_IOFactory::createWriter($excel,'Excel2007');
//output to filename directly
$file->save($target_dir.$target_file_applyform);
//attach application form
$mail->addAttachment($target_dir.$target_file_applyform,$target_file_applyform,'base64',"mime/type");

$mail->Send();

##################### End 2&3 ###########################################################



?>

