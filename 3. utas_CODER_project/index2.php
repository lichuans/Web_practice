<link rel="stylesheet" href="assets/css/index.css?v={<?php echo time()?>}"> 
<link rel="stylesheet" href="assets/css/slide.css?v={<?php echo time()?>}"> <!-- Website template by https://www.w3schools.com/w3css/4/w3.css-->

<?php
/**
 * A different view style of the Main Page for confirmation with the client
 * Created by Effie.
 * Date: 2018/11/23
 */
?>

<!doctype html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CODER</title>
    <link rel="stylesheet" href="index2/css/style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="index2/css/mobile.css">
    <script src="index2/js/mobile.js" type="text/javascript"></script>

</head>
<body>
<div class="top">
<div id="mainlogo">
  <a href="index2.php" class="logo"><img src="images/coderlogo.jpg" alt="" height="100" width="200"></a>        
<div class="menuDiv">      
            <ul id="navigation">           
                <li class="menu">
                    <a href="index.php">Home</a>
                    <ul class="secondary">
                        <li>
                            <a href="AboutCoder.php">About Coder</a>
                        </li>
                        <li>
                            <a href="OurTeam.php">Our Team</a>
                        </li>
                        <li>
                            <a href="ContactUs.php">Contact Us</a>
                        </li>
                    </ul>
                </li>
                <li class="menu">
                    <a href="#">Students & Mentors</a>
                    <ul class="secondary">
                        <li>
                            <a href="Students.php">Students</a>
                        </li>
                        <li>
                            <a href="Mentors.php">Mentors</a>
                        </li>
                        <li>
                            <a href="applyform.php.php">Apply Now</a>
                        </li>
                    </ul>
                </li>
                <li class="menu">
                    <a href="#">Partners</a>
                    <ul class="secondary">
                        <li>
                            <a href="Partners.php?type=External">External Partners</a>
                        </li>
                        <li>
                            <a href="Partners.php?type=Internal">Internal Partners</a>
                        </li>
                        <li>
                            <a href="#">Apply to be a partner</a>
                        </li>
                    </ul>
                </li>
                <li class="menu">
                    <a href="#">Projects</a>
                    <ul class="secondary">
                        <li>
                            <a href="project_list.php?type=New">New Projects</a>
                        </li>
                        <li>
                            <a href="project_list.php?type=Current">Current Projects</a>
                        </li>
                        <li>
                            <a href="project_list.php?type=Past">Past Projects</a>
                        </li>
                    </ul>
                </li>
                <li class="menu">
                    <a href="#">Success Story</a>
                </li>
            </ul>
        </div>
    </div>
 </div>
  
    
    
    <div id="body" class="home">

        <div class="w3-content w3-display-container"> <!-- https://www.w3schools.com/w3css/w3css_slideshow.asp -->
          
            <div class="mySlides"
                 style="height: 500px;background:url(images/pic01.jpg) no-repeat left top; background-size: cover">
                <div style="text-align: center;">
                    <header>
                        <h2>CODER</h2>
                         <p>YOUR CAREER START HERE</p>
                    </header>
                   <a href="#">AVAILABLE PROJECTS</a>  
                </div>
            </div>
            
            
                    <div class="mySlides"
                 style="height: 500px;background:url(images/pic02.jpg) no-repeat left top; background-size: cover">
                <div style="text-align: center; ">
                    <header>
                        <h2>Apply Now</h2>
                        <p>You can do it.</p>
                    </header>
                    <a href="#">Apply</a>
                </div>
            </div>    
            
            
            
            
            
                    <div class="mySlides"
                 style="height: 500px;background:url(images/pic03.jpg) no-repeat left top; background-size: cover">
                <div style="text-align: center; ">
                              <header>
                        <h2>Join Us</h2>
                        <p>Welcome.</p>
                    </header>
                    <a href="#">To be a partner</a>     
                </div>
            </div>    
            

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 5000); // Change image every 3.5 seconds
}
</script>

           
            <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
            <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>

            <script>
                var slideIndex = 1;
                showDivs(slideIndex);

                function plusDivs(n) {
                    showDivs(slideIndex += n);
                }

                function showDivs(n) {
                    var i;
                    var x = document.getElementsByClassName("mySlides");
                    if (n > x.length) {
                        slideIndex = 1
                    }
                    if (n < 1) {
                        slideIndex = x.length
                    }
                    for (i = 0; i < x.length; i++) {
                        x[i].style.display = "none";
                    }
                    x[slideIndex - 1].style.display = "block";
                }
            </script>
        </div>






   <!-- One -->
    <section id="one" class="wrapper-style2">
        <div class="inner">
            <header >
                <br><br>
                <h3 class="align-center">WHAT IS CODER?</h3><br>
                <p>CODER is a team of academics and students in the Discipline of ICT, School of Technology,
                    Environments and Design within the College of Sciences and Engineering at the University of
                    Tasmania.
                    We are seeking enthusiastic and keen volunteer students who want to gain work experience from
                    various projects by industry and University.
                    This voluntary work experience will give you valuable experience in working on real projects that do
                    not form part of your normal masters/
                    undergraduate coursework, exposure to software systems, code development and technologies that will
                    be an excellent addition to your
                    knowledge and skillset, as well as inclusion in research publications that arise from the
                    projects.</p>
            </header>
        </div>
    </section>




        <!-- SECTION: projects -->
        <br><br>
        <div class="wrapper-style4">
            <header>
                <h3>PROJECTS</h3>
            </header>
            <ul>
                <li>
                    <div>
                        <img src="images/pic02.jpg" alt=""/>
                    </div>
                    <div class=content>
                        <header>
                            <h2>Project1</h2>
                        </header>
                       
                     <p> The project description will be got from the Database. And this is pretty good.The project description will be got from the Database. And this is pretty good.The project description will be got from the Database. And this is pretty good. </p>
                        <footer>
                            <a href="#" class="button alt">Learn More</a><br><br>
                        </footer>
                    </div>
                </li>
                
                
                
                
                
                <li>
                    <div>
                        <img src="images/pic02.jpg" alt=""/>
                    </div>
                    <div class=content>
                        <header>
                            <h2>Project2</h2>
                        </header>
                        <p> The project description will be got from the Database. And this is pretty good.The project description will be got from the Database. And this is pretty good. </p>
                        <footer>
                            <a href="#" class="button alt">Learn More</a><br><br>
                        </footer>
                    </div>
                </li>
                
                
                
                
                
                <li>
                    <div>
                        <img src="images/pic02.jpg" alt=""/>
                    </div>
                    <div class=content>
                        <header>
                            <h2>Project3</h2>
                        </header>
                        <p>The project description will be got from the Database. And this is pretty good. </p>
                        <footer>
                            <a href="#" class="button alt">Learn More</a><br><br>
                        </footer>
                    </div>
                </li>
                
                
            </ul>
        </div>

        <!-- SECTION: SUCCESSFUL STORIES -->
        <div class="wrapper-style5">
            <header>
            <br><br>
                <h3>SUCCESSFUL STORIES</h3>
            </header>
            <ul>
                <li>
                    <div>
                        <img src="images/pic03.jpg" alt=""/>
                    </div>
                    <div class=content>
                      <a href="#" class="button-alt">Student Jack hired by CommonWealth Bank that is pretty good.Student Jack hired by CommonWealth Bank that is pretty good.Student Jack hired by CommonWealth Bank that is pretty good.</a> 
                      <p>10/10/2018</p>
                    </div>
                </li>


                <li>
                    <div>
                        <img src="images/pic03.jpg" alt=""/>
                    </div>
                    <div class=content>
                      <a href="#" class="button-alt">Student Jack hired by CommonWealth Bank that is pretty good.Student Jack hired by CommonWealth Bank that is pretty good.</a> 
                      <p>10/10/2018</p>
                    </div>
                </li>


                <li>
                    <div>
                        <img src="images/pic03.jpg" alt=""/>
                    </div>
                    <div class=content>
                      <a href="#" class="button-alt">Student Jack hired by CommonWealth Bank that is pretty good.</a> 
                      <p>10/10/2018</p>
                    </div>
                </li>

            </ul>
        </div>
    </div>



        <!-- SECTION: Contact -->
        <div class="wrapper-style2">
            <header>
            <br><br>
              <div align="center" >
            <h3>CONTACTS</h3>
            <br>University of Tasmania <br>
		Discipline of ICT<br>
		Grosvenor St, Sandy Bay TAS 7005<br>
		info@mysite.com  |  Tel: 123-456-7890</span><br><br><br>
          </div>
        </div>
           







   <!-- SECTION: footer -->
    <div class="footer">
        
            <div>
                <a target="_blank" href="http://www.utas.edu.au/courses/study/computing-and-it"><img
                            src="images/utas-logo-noline.png"></a>
            </div>
            <div class="connect">
                <a href="http://freewebsitetemplates.com/go/facebook/" class="facebook">facebook</a>
                <a href="http://freewebsitetemplates.com/go/twitter/" class="twitter">twitter</a>
                <a href="http://freewebsitetemplates.com/go/googleplus/" class="googleplus">googleplus</a>
                <a href="http://pinterest.com/fwtemplates/" class="pinterest">pinterest</a>
                <p>Copyright © 2019-2029 UTAS ICT faculty All Rights Reserved. Powered by UTAS ICT faculty</p>
            </div>
    </div>


</div>



</body>
</html>

