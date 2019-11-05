<?php
/**
 * Project Details Display
 * Created by Jing Effie Liu.
 * Date: 2018/11/18
 */

//load header of the page
include_once 'header.html';

//connect the database
include_once 'dba.php';
mysqli_set_charset($conn, 'utf8');

// check the connection with the database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    exit();
}

//read and display the project
$sql = "SELECT * FROM Project Where ID = ".$_GET['pid'];
$result = mysqli_query($conn, $sql);
$project_name ='';
$project_start='';
$project_end='';
$project_dscp='';
$project_pic='';
$project_skills='';
$project_team='';
$project_cate='';

if (!$result) {
    echo $sql;
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

while ($row = mysqli_fetch_array($result)) { //万一有多行数据 则默认取最后一行的
    $project_name = $row['Name'];
    $project_start= $row['StartDate'];
    $project_end = $row['EndDate'];
    $project_pic = $row['Picture'];
    $project_dscp = $row['Description'];
    $project_cate = $row['Category'];
}

//read and display the project required skills
$sql_skills = "SELECT Skills.Name FROM ProjectSkill LEFT JOIN Skills ON ProjectSkill.SkillID=Skills.ID WHERE ProjectSkill.ProjectID = ".$_GET['pid'];
$result_skills = mysqli_query($conn, $sql_skills);

if (!$result_skills) {
    echo $sql_skills;
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

while ($row = mysqli_fetch_array($result_skills)) {
    $project_skills.=$row['Name'].'. ';
}

//read and display the project members
$sql_mem = "SELECT Volunteer.FirstName, Volunteer.LastName  FROM ProjectTeam LEFT JOIN Volunteer ON ProjectTeam.VolunteerID=Volunteer.StudentID WHERE ProjectTeam.ProjectID = ".$_GET['pid'];
$result_mem = mysqli_query($conn, $sql_mem);

if (!$result_mem) {
    echo $sql_mem;
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

while ($row = mysqli_fetch_array($result_mem)) {
    $project_team.=$row['FirstName'].' '.$row['LastName'].'. ';
}

$conn->close();
?>

<!-- One -->
<section id="One" class="wrapper style3">
    <div class="inner">
        <header class="align-center">
            <p><a href="applyform.php" class="alt" >Apply for a project coder</a></p> <!-- 后面可以考虑 打开的申请页面 默认选择当前项目为Preference -->
            <h2><?php echo $project_name;
            switch ($project_cate){
                case '0':
                    echo " (New Project)";
                    break;
                case '1':
                    echo " (Current Project)";
                    break;
                case '2':
                    echo " (Past Project)";
                    break;
            }
            ?></h2>
        </header>
    </div>
</section>

<!-- Two -->
<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content">
                <p><?php echo $project_dscp; ?></p>
                <p> Start Date: <u><?php echo $project_start; ?></u> <br>
                      End Date: <i><?php echo $project_end; ?></i>
                </p>
                <p> Required Skills: <i><?php echo $project_skills; ?></i></p>
                <p> Team Members: <i><?php echo $project_team; ?></i></p>
            </div>
            <div align="center" >
                <img src="<?php echo $project_pic; ?>" >
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php
include_once 'footer.html';
?>

