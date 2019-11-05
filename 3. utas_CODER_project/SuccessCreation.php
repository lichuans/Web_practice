<link rel="stylesheet" href="assets/css/index.css?v={<?php echo time()?>}"> 
<meta name="viewport" content="width=device-width, user-scalable=no">
<link rel="stylesheet" href="assets/css//bootstrap.min.css?v={<?php echo time() ?>}">
<?php
/**
 * Add a project and save the data to database
 * Created by Jing Effie Liu.
 * Date: 2018/11/25
 */
include 'session.php';
//load header of the page
include_once 'header2.html';

//connect the database
include_once 'dba.php';
mysqli_set_charset($conn, 'utf8');
// 判断当前连接是否成功
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
            <h2>Creat a new story</h2>
            <p>Fill in the information here</p>
        </header>
    </div>
</section>

<!-- Two -->
                <div class="container">
                <div class="row"> 
                <div class = "m-auto">
                <br>
                <form class="application-form" action="SuccessCreation_Submit.php" method="post" target="_blank"
                      enctype="multipart/form-data">

                    <table>
                        <tr style="visibility: collapse">
                            <th width="200px"></th>
                            <th width="600px"></th>
                        </tr>
                        <tr style="background-color: white">
                            <td>Story Name:</td>
                            <td><input type="text" name="StoryName" placeholder="Story Name"></td>
                        </tr>
                        <tr style="background-color: white" valign="top">
                            <td colspan="2">Story Description:<br><textarea name="StoryDescription" style="height: 380px;vertical-align:top;"></textarea></td>
                        </tr>
                        <tr style="background-color: white">
                            <td>Project Name:</td>
                            <td><input type="text" name="ProjectName" placeholder="Project Name"></td>
                        </tr>
                        <tr style="background-color: white">
                            <td>Project Start Date:</td>
                            <td><input type="date" name="StartDate" value = <?php echo date("Y-m-d") ?> ></td>
                         </tr>
                        <tr style="background-color: white">                          
                            <td>Project End Date:</td>
                            <td><input type="date" name="EndDate" value = <?php echo date("Y-m-d") ?> ></td>
                        </tr>
                        <tr style="background-color: white">
                            <td>Project Members:</td>
                            <td><input type="text" name="Members" placeholder="FirstName. SecondName;  FirstName. SecondName;"></td>
                        </tr>

                        <tr style="background-color: white">
                            <td>Project Picture</td>
                            <td><input id="pic" type="file" name='pic' accept="image/*" onchange="selectFile()"/>
                                <div id="picpreview"></div>
                            </td>
                        </tr>
                        <tr style="background-color: white">
                            <td>Project Video</td>
                            <td><input type="text" name="Video" placeholder="Project Video Link"></td>
                        </tr>

                        <tr style="background-color: white">
                            <td>Student Name</td>
                            <td><input type="text" name="StudentName"></td>
                        </tr>

                        <tr style="background-color: white">
                            <td>Student Role</td>
                            <td><input type="text" name="StudentRole"></td>
                        </tr>

                        <tr style="background-color: white">
                            <td>Student Phone</td>
                            <td><input type="text" name="StudentPhone"></td>
                        </tr>

                        <tr style="background-color: white">
                            <td>Student Email</td>
                            <td><input type="text" name="StudentEmail"></td>
                        </tr>

                        <tr style="background-color: white">
                            <td>Student Description</td>
                            <td><input type="text" name="StudentDescription" style="height: 200px;vertical-align:top;"></td>
                        </tr>

                        <tr style="background-color: white">
                            <td>Student Picture</td>
                            <td><input id="pic" type="file" name='pic' accept="image/*" onchange="selectFile()"/>
                                <div id="picpreview"></div>
                            </td>
                        </tr>

                       </table>                    
                        <button type="submit" name="submit" class="btn-link">Submit</button>
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