<link rel="stylesheet" href="assets/css/index.css?v={<?php echo time()?>}"> 
<?php
/**
 * Partner Application Form Page
 * Created by Michael.
 * Date: 2018/12/13
 */

//load header of the page
include_once 'header.html';

//connect the database
include_once 'dba.php';
mysqli_set_charset($conn, 'utf8');
// 判断当前连接是否成功
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    exit();
}
      
$conn->close();

?>

<!-- One -->
<style>  
       .wrapper-style3 {
width: 100%;  
height: 480px; 
background-image: url(images/banner9.jpg);
background-repeat:no-repeat;
background-size:100% 100%;
margin:-24px 0 0 0px;
}
</style>
<section id="One" class="wrapper-style3">
    <div align="center">
        <header>
            <h2>Apply To be Partner</h2>
     <p>We've been waiting for you</p>
        </header>
    </div>
</section>




<!-- Two -->
<br><br>
<section id="two" class="wrapper-style2">
    <div class="inner">
        <div class="box1">
            <div class="content">
                <header>
                    <h3>PARTNERSHIP PROCESS</h3>
<div align="center">
                 <img src="images/line.png" alt=""/>
                 </div><br>
                </header>
                <img src="images/Partnership process.png" alt=""/>
                 <p>Even though Latin is considered a dead language (no country officially speaks it), its influence upon other languages makes it still important. Latin words and expressions are present in virtually all the languages around the world, as well as on different scientific and academic fields.
                </p>
                <br>
                <div class="inner">
                    <header class="align-center">
                        <p></p>
                    </header>
                </div>
                <header>
                    <h3>PARTNERSHIP BENEIFTS </h3>
<div align="center">
                 <img src="images/line.png" alt=""/>
                 </div><br>
                </header>
                <div>
                <p><b>RESEARCH FOR IMPACT</b><br>Turn your PhD theory into practice.
                </p><p><b>FAST TRACK CAREER</b><br>Build industry networks & enhance your CV.
                </p><p><b>INCREASE EMPLOYABILITY</b><br>Develop your soft skills to support & complement research expertise.
                </p><p><b>FLEXIBLE CONDITIONS</b><br>Explore tailored project arrangements.
                </p></p><p><b>RECEIVE A STIPEND</b><br>Earning potential of $9k-15k over 3-5 months.
                </p>
                <br>
                </div>
                <div class="inner">
                    <header>
                        <p></p>
                    </header>
                </div>
                <header>
                    <h3>PARTNERSHIP ELIGIBILITY </h3>
                <div align="center">
                 <img src="images/line.png" alt=""/>
                 </div><br>
                </header>
                <p>The program is open to women and men with an emphasis on gender equity, domestic, regional, Indigenous and disadvantaged PhD students into STEM internships.</p>
                <div class="inner">
                    <header class="align-center">
                        <p></p>
                    </header>
                </div>
                <br><br>
            
                <header>
                    <h3>HOW TO APPLY</h3>
<div align="center">
                 <img src="images/line.png" alt=""/>
                 </div><br>
                </header>
                <p>Simply fill in the below information and submit it. Our coder Team will contact you shortly after assessing availability of the project. </p> 
            </div>
        </div>
</section>
    
<!-- Three -->

<section id="two" class="wrapper-style2">
    <div class="inner">
        <div class="box1">
            <div class="content">
                <div align="center">
<br><br>
                <form class="application-form" action="Partner_submit.php" method="post" target="_blank"
                      enctype="multipart/form-data">
                    <table>
                        <tr style="visibility: collapse">
                            <th width="10%" style="color: white">field</th>
                            <th width="30%" style="color: white">Name</th>
                        </tr>
                        <tr style="background-color: white; font-family:myriad pro;">
                            <td>Organisation:</td>
                            <td><input type="text" name="sid" placeholder="Type your organisation name"></td>
                        </tr>
                        <tr style="background-color: white; font-family:myriad pro;">
                            <td>First Name:</td>
                            <td><input type="text" name="firstname" placeholder="Type your first name"></td>
                        </tr>
                        <tr style="background-color: white; font-family:myriad pro;">
                            <td>Last Name:</td>
                            <td><input type="text" name="lastname" placeholder="Type your last name"></td>
                        </tr>
                                                </tr>
                        <tr style="background-color: white; font-family:myriad pro;">
                            <td>Position:</td>
                            <td><input type="text" name="position" placeholder="Type your position in the organisation"></td>
                        </tr>
                                            </tr>
                        <tr style="background-color: white; font-family:myriad pro;">
                            <td>Contact Number:</td>
                            <td><input type="text" name="contact" placeholder="Type your contact number"></td>
                        </tr>
                        <tr style="background-color: white; font-family:myriad pro;">
                            <td>Email Address:</td>
                            <td><input type="text" name="email" placeholder="Type your Email address"></td>
                        </tr>    
                        <tr style="background-color: white; font-family:myriad pro;">
                            <td>Project Name:</td>
                            <td><input type="text" name="project" placeholder="Type your project name"></td>
                        </tr>
                        <tr style="background-color: white; font-family:myriad pro;">
                            <td>Project Description: </td>
                            <td><textarea name="description" placeholder="Describe your project"></textarea></td>
                        </tr>
                        <tr style="background-color: white; font-family:myriad pro;">
                            <td>Required Programming Skills:
                                <br>(*optional)
                            </td>
                            <td><textarea name="skills" placeholder="Type required programming skills"></textarea></td>
                        </tr>
                        <tr style="background-color: white; font-family:myriad pro;">
                            <td>File Attachment:
                                <br>(*optional)
                            </td>
                            <td>
                                <input type="file" name="fileToUpload" id="fileToUpload">
                                <!-- php.ini 需要配置 file_uploads = On -->

                            </td>
                        </tr>
                    </table>
                    <div align="center">
                        <button type="submit" name="submit" class="btn-link">Apply Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<style>
.btn-link{
background-color: #e6e6e6;
border: none;
color: white;   
padding: 5px 20px;   
text-align: center;  
text-decoration: none;  
display: inline-block;
font-family:myriad pro;    
font-size: 14px;
                        } 
</style>



<!-- Scripts -->
<script>
    function selectedSkill(id) {
        var x = document.getElementsByName(id)[0];
        document.getElementsByName(id + '_id')[0].value = x.attributes['key'].value;
        document.getElementsByName(id + '_value')[0].value = x.value;
    }
    function preferredProject(id) {
        var x = document.getElementsByName(id)[0];
        document.getElementsByName(id + '_id')[0].value = x.options[x.selectedIndex].value;
        document.getElementsByName(id + '_value')[0].value = x.options[x.selectedIndex].text;
    }
</script>

<!-- Footer -->
<?php
include_once 'footer.html';
?>
