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
}




//read and display the project
$sql = "SELECT * FROM SuccessStory Where ID = '$id'";
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

while ($row = mysqli_fetch_array($result)) { 
    $story_name = $row['Name'];
    $project_start= $row['Timestart'];
    $project_end = $row['Timefinish'];
    $project_pic = $row['Picture1'];
    $story_des = $row['Description'];
    $project_member = $row['Members'];
     $video = $row['Video'];   

    $project_name = $row['ProjectName'];
     $student_name = $row['StudentName'];   
     $student_role = $row['StudentRole'];  
     $student_phone = $row['StudentPhone'];  
     $student_email = $row['StudentEmail'];   
     $student_des = $row['StudentDescription'];  
     $student_pic = $row['StudentPicture']; 


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
            <h2>Story Info Update</h2>
            <p>Update the information here</p>
        </header>
    </div>
</section>

<!-- Two -->
                <div class="container">
                <div align="center">
                <div class="m-auto">
                <br>
                <form class="application-form" action="SuccessUpdate_read.php" method="post" target="_blank"
                      enctype="multipart/form-data">

                    <table style="width:70%">
                        <tr style="visibility: collapse">
                            <th width="50px"></th>
                            <th width="500px"></th>
                        </tr>
                        <tr style="background-color: white">
                            <td>Story Name:</td>
                            <td><input type="text" name="StoryName" placeholder="Story Name" value="<?php echo $story_name; ?>"></td>
                        </tr>
                        <tr style="background-color: white" valign="top">
                            <td>Story Description:</td>
                       <td><textarea name="StoryDescription" style="height: 250px;vertical-align:top;" ><?php echo $story_des; ?></textarea></td>
                        </tr>
                        <tr style="background-color: white">
                            <td>Project Name:</td>
                            <td><input type="text" name="ProjectName" placeholder="Project Name" value="<?php echo $project_name; ?>"></td>
                        </tr>
                        <tr style="background-color: white">
                            <td>Project Start Date:</td>
                            <td><input type="date" name="StartDate" value="<?php echo $project_start; ?>" ></td>
                         </tr>
                        <tr style="background-color: white">                          
                            <td>Project End Date:</td>
                            <td><input type="date" name="EndDate" value="<?php echo $project_end; ?>" ></td>
                        </tr>
                        <tr style="background-color: white">
                            <td>Project Members:</td>
                            <td><input type="text" name="Members" placeholder="FirstName. SecondName;  FirstName. SecondName;" value="<?php echo $project_member; ?>"></td>
                        </tr>

                        <tr style="background-color: white">
                            <td>Project Picture</td>
                            <td><input id="pic" type="file" name='pic' accept="image/*" onchange="selectFile()"/>
                                <div id="picpreview"></div>
                            </td>
                        </tr>
                        <tr style="background-color: white">
                            <td>Project Video</td>
                            <td><input type="text" name="Video" placeholder="Project Video Link" value="<?php echo $video; ?>"></td>
                        </tr>

                        <tr style="background-color: white">
                            <td>Student Name</td>
                            <td><input type="text" name="StudentName" value="<?php echo $student_name; ?>"></td>
                        </tr>

                        <tr style="background-color: white">
                            <td>Student Role</td>
                            <td><input type="text" name="StudentRole" value="<?php echo $student_role; ?>"></td>
                        </tr>

                        <tr style="background-color: white">
                            <td>Student Phone</td>
                            <td><input type="text" name="StudentPhone" value="<?php echo $student_phone; ?>"></td>
                        </tr>

                        <tr style="background-color: white">
                            <td>Student Email</td>
                            <td><input type="text" name="StudentEmail" value="<?php echo $student_email; ?>"></td>
                        </tr>

                        <tr style="background-color: white">
                            <td>Student Description</td>
                             <td><textarea name="StudentDescription" style="height: 150px;vertical-align:top;"><?php echo $student_des; ?></textarea></td>
                        </tr>

                        <tr style="background-color: white">
                            <td>Student Picture</td>
                            <td><input id="pic" type="file" name='pic' accept="image/*" onchange="selectFile()"/>
                                <div id="picpreview"></div>
                            </td>
                        </tr>

                       </table> 
                
                          <input type="hidden" name="ID" value="<?php echo $id; ?>">
                        <button type="submit" name="submit" class="btn-link">Update</button>
                    
                </form>
            </div>
        </div>
    </div>








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
