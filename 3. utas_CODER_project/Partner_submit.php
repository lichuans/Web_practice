<?php
include_once 'dba.php';
mysqli_set_charset($conn,'utf8');
// 判断当前连接是否成功
if ($conn->connect_error) {
    die("Connection failed:: " . $conn->connect_error);
    exit();
}

//insert a record of the applicant

    $sid = $_POST['sid'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $position = $_POST['position'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $project = $_POST['project'];
    $description = $_POST['description'];
    $skills = $_POST['skills'];
    $target_file_cv = $_POST['target_file_cv'];

   $sql_insertApplicant = "INSERT INTO Partners (Organisation, FirstName, LastName, Position, ContactNumber, Email, ProjectName, Description, skills, CV) VALUES ('$sid', '$firstname', '$lastname','$position', '$contact', '$email', '$project', '$description', '$skills', '$target_file_cv')";


$result1 = mysqli_query($conn, $sql_insertApplicant);


// debug code
if($result1 === TRUE){
    echo "Thank you for application, we will contact you soon";
} else {
    echo "Error: ".$insertsql."<br>".mysqli_error($conn);
} 

//header("Location: ../coder/index.php?signup=success");



$conn->close();

?>