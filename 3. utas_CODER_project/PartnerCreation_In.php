<link rel="stylesheet" href="assets/css/index.css?v={<?php echo time() ?>}">
<?php
/**
 * Add a Partners and save the data to database
 * Created by Michael
 * Date: 2018/12/11
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
            <h2>Create a new internal partner</h2>
            <p>Fill in the information here</p>
        </header>
    </div>
</section>

<!-- Two -->
<section id="two" class="wrapper-style2">
    <div class="inner">
        <div class="box3">
            <div class="content3">
                <div align="center"><br></div>
                <form class="application-form" action="PartnerCreation_Submit.php" method="post" target="_blank"
                      enctype="multipart/form-data">
                    <table>
                        <tr style="visibility: collapse">
                            <th width="10%" style="color: white">field</th>
                            <th width="30%" style="color: white">Name</th>
                            <th width="10%" style="color: white">field</th>
                            <th width="30%" style="color: white">Name</th>
                        </tr>
                        <tr style="background-color: white">
                            <td>Partner Name:</td>
                            <td><input type="text" name="ParterName" placeholder="Partner title"></td>
                        </tr>
                        <tr style="background-color: white">
                            <td>Client Name:</td>
                            <td><input type="text" name="ClientName" placeholder="Client Name responsible for the projects"></td>
                        </tr>
                        <tr style="background-color: white">
                            <td>Client Position:</td>
                            <td><input type="text" name="ClientPosition" placeholder="Client position in the organisation"></td>
                        </tr>
                        <tr style="background-color: white">
                            <td>Client Email:</td>
                            <td><input type="text" name="ClientEmail" placeholder="Client Email"></td>
                        </tr>
                        <tr style="background-color: white">
                            <td>Partner Website:</td>
                            <td><input type="text" name="Website" placeholder="Partner Website link"></td>
                        </tr>
                        <tr style="background-color: white" valign="top">
                            <td colspan="2">Client Description:<br><textarea name="ClientDescription" style="height: 180px;vertical-align:top;" placeholder="Client Description"></textarea></td>
                        </tr>
                        <tr style="background-color: white" valign="top">
                            <td colspan="2">Project Description:<br><textarea name="PartnerDescription" style="height: 380px;vertical-align:top;" placeholder="Partner Description"></textarea></td>
                        </tr>
                        <tr style="background-color: white">
                            <td>Partner Picture</td>
                            <td colspan="3">
                                <input id="pic" type="file" name='ProjectPicture' accept="image/*" onchange="selectFile()"/>
                                <div id="picpreview"></div>
                            </td>
                        </tr>
                        <tr style="background-color: white">
                            <td>Client Picture</td>
                            <td colspan="3">
                                <input id="pic" type="file" name='ClintPicture' accept="image/*" onchange="selectFile()"/>
                                <div id="picpreview"></div>
                            </td>
                        </tr>
                    </table>
                    <div align="center">
                        <button type="submit" name="submit" class="btn-link">Submit</button>
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



