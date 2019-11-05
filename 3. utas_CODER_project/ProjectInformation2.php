<link rel="stylesheet" href="assets/css/index.css?v={<?php echo time()?>}">
<?php
$id=$_POST['id'];
/**
 * Add a project and save the data to database
 * Created by Jing Effie Liu.
 * Date: 2018/11/25
 */

//load header of the page
include_once 'header2.html';

//connect the database
include_once 'dba.php';
mysqli_set_charset($conn, 'utf8');
// 判断当前连接是否成功
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {





//read and display the project
$sql = "SELECT * FROM Project Where ID = '$id'";
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
$sql_skills = "SELECT Skills.Name FROM ProjectSkill LEFT JOIN Skills ON ProjectSkill.SkillID=Skills.ID WHERE ProjectSkill.ProjectID = '$id'";

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
$sql_mem = "SELECT Volunteer.FirstName, Volunteer.LastName  FROM ProjectTeam LEFT JOIN Volunteer ON ProjectTeam.VolunteerID=Volunteer.StudentID WHERE ProjectTeam.ProjectID = '$id'";

$result_mem = mysqli_query($conn, $sql_mem);

if (!$result_mem) {
    echo $sql_mem;
    printf("Error: %s\n", mysqli_error($conn));

}

while ($row = mysqli_fetch_array($result_mem)) {
    $project_team.=$row['FirstName'].' '.$row['LastName'].'. ';
}


































//read and display skills
    $sql_skill = "SELECT ID, Name FROM Skills";
    $result_skill = mysqli_query($conn, $sql_skill);
    $skill_table = ''; //for drawing a table and displaying on the page
    $skills = ''; // for recording the skills read as a hidden text
    while ($row_skill = mysqli_fetch_array($result_skill)) {
        $selectid = $row_skill['Name'];
        $skill_table .= '<tr>
                    <td width="30%"><span>' . $row_skill['Name'] . '</span></td>
                    <td><select name = "' . $selectid . '" key="' . $row_skill['ID'] . '" onchange="selectedSkill(\'' . $selectid . '\')">
                            <option value="0"></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option> 
                         </select> 
                         <input name="' . $selectid . '_id" type="text" style="display: none"> <!--skill id-->
                         <input name="' . $selectid . '_value" type="text" style="display: none"> <!--skill proficiency-->
                     </td>
                 </tr>
                 ';
        $skills .= $row_skill['Name'] . ";";
    }
    $skills = '<tr style="display: none"><td colspan="2"><input name="skills" value="' . $skills . '" type="text" ></td> </tr>';
}







?>

<!-- One -->
<style>  
       .wrapper-style3 {
width: 100%;  
height: 480px; 
background-image: url(images/banner19.jpg);
background-repeat:no-repeat;
background-size:100% 100%;
margin:-24px 0 0 0px;
}
</style>
<section id="One" class="wrapper-style3">
    <div align="center">
        <header>
            <h2>Project Info Update</h2>
            <p>Update in the project information here</p>
        </header>
    </div>
</section>

<!-- Two -->
<section id="two" class="wrapper-style2">
    <div class="inner">
        <div class="box3">
            <div class="content3">
                <div align="center"><br></div>
                <form class="application-form" action="ProjectInfor_update.php" method="post" target="_blank"
                      enctype="multipart/form-data">
                    <table>
                        <tr style="visibility: collapse">
                            <th width="10%" style="color: white">field</th>
                            <th width="30%" style="color: white">Name</th>
                            <th width="10%" style="color: white">field</th>
                            <th width="30%" style="color: white">Name</th>
                        </tr>
                        <tr style="background-color: white">
                            <td>Project Name:</td>
                            <td><input type="text" name="ProjectName" value="<?php echo $project_name; ?>"/></td>
                        

                         
                        <td>Category:</td>
                        
                            <td>

                                <select name = "Category">
                                   <option value="0" <?php echo $project_cate=="0" ?  "selected"  :  "" ?> > New Project </option>

                                   <option value="1"  <?php echo $project_cate=="1" ?  "selected"  :  "" ?> >Current Project </option>
                                    
<option value="2"  <?php echo $project_cate=="2" ?  "selected"  :  "" ?> >Past Project </option>
                                </select>
                            </td>
                            </tr>


                        <tr style="background-color: white">
                            <td>Start Date:</td>
                            <td><input type="date" name="StartDate" value="<?php echo $project_start; ?>"></td>
                            <td>End Date:</td>
                            <td><input type="date" name="EndDate"value="<?php echo $project_end; ?>"></td>
                        </tr>
                        <tr style="background-color: white" valign="top">
                            <td colspan="2">Programming Skills Required:<br>
                                <table>
                                    <?php echo $skills; ?>
                                    <?php echo $skill_table; ?>
                                </table>
                            </td>
                            <td colspan="2">Project Description:<br><textarea name="Description" style="height: 380px;vertical-align:top;"><?php echo $project_dscp; ?></textarea></td>
                        </tr>
                        <tr style="background-color: white">
                            <td>Project Picture</td>     
                            <td colspan="3">
                                <form action="" method="post">
                               <img src="<?php echo $project_pic; ?>" alt=""  width="250" height="250"/>
                                   <button type="submit" name="delete">Delete</button>
                                 </form>
                            </td>
                        </tr>
                           <tr style="background-color: white">
                            <td>Upload new Pictures</td>                          
                            <td colspan="3">
                                <input id="pic" type="file" name='pic' accept="image/*" onchange="selectFile()"/>
                                <div id="picpreview"></div>
                            </td>
                        </tr>
                    </table>

                    <div align="center">
                          <input type="hidden" name="ID" value="<?php echo $id; ?>">
                        <button type="submit" name="submit" class="btn-link">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>







<!-- Scripts -->
<script>
    function selectedSkill(id) {
        var x = document.getElementsByName(id)[0];
        document.getElementsByName(id + '_id')[0].value = x.attributes['key'].value;
        document.getElementsByName(id + '_value')[0].value = x.value;
    }

    /*** for picture preview ***/
    //var files = document.getElementById('pic').files;
    var form = new FormData();//通过HTML表单创建FormData对象
    var url = '127.0.0.1:8080/'

    function selectFile() {
        var files = document.getElementById('pic').files;
        console.log(files[0]);
        if (files.length == 0) {
            return;
        }
        var file = files[0];
        //把上传的图片显示出来
        var reader = new FileReader();
        // 将文件以Data URL形式进行读入页面
        console.log(reader);
        reader.readAsBinaryString(file);
        reader.onload = function (f) {
            var result = document.getElementById("picpreview");
            var src = "data:" + file.type + ";base64," + window.btoa(this.result);
            result.innerHTML = '<img src ="' + src + '"/>';
        }
        console.log('file', file);
        ///////////////////
        form.append('file', file);
        console.log(form.get('file'));
    }

</script>



<?php
$conn->close();
include_once 'footer.html';
?>
