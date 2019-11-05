<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/index.css?v={<?php echo time() ?>}">
<link rel="stylesheet" href="assets/css//bootstrap.min.css?v={<?php echo time() ?>}">

<?php
/**
 * Our Team Page Display
 * Created by Jing Effie Liu.
 * Date: 2018/11/19
 *
 */

//load header of the page
include_once 'header.html';
?>

<!-- One -->
<style>  
       .wrapper-style3 {
width: 100%;  
height: 480px; 
background-image: url(images/banner3.jpg);
background-repeat:no-repeat;
background-size:100% 100%;
margin:-24px 0 0 0px;
}

  .navcol3 {
        text-align: center;
    }

    .navcol3 ul {
        display: inline-block;
      width: 1200px;
      margin: 0px;
    padding: 0px;
    text-align: center; 
margin:0px 0 0 -100px;
    }

    .navcol3 li {
        float: left; //œÚ◊Û≈≈¡–
        width: 200px; 
        margin: 0px;
        padding: 0px;
list-style: none;
margin-bottom:50px
    }

    .navcol3 li + li {
        margin-left: 140px;
    }

    .navcol3 p1 {
        color: black;
      font-weight:bold;
    }
    .navcol3 p2 {
        color: black;
 font-style:italic;
    }

    .navcol3 p3 {
        color: black;
 font-style:italic;
    }
    .navcol3 .photo img {
        width: 200px;
        height: 200px;
    }


    .navcol3 .email img{
        width: 30px;
        height:25px;
    }

</style>

<section id="One" class="wrapper-style3">
    <div align="center">
        <header>
            <h2>Our Team</h2>
 <p>Our experiencd team will guide you through the program.</p>
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

                </header>
                <div class="navcol3">
                    <ul>

                        <!--<li>
                            <div class="photo">
                                <img src="images/Kang.jpg" class="rounded-circle" alt=""/>
                            </div>
                             
                            <div>
                                <p1>Prof. Byeong Ho Kang</p1>
                                <p2><br>Professor and Head of ICT </p2>
                             </div>
                            <div class="email">  
                           <img src="images/email.png" alt=""/>
                              <p3>ByeongHoHang@gmail.com </p3>
                            </div>
                        </li>



                        <li>
                            <div class="photo">
                                <img src="images/Saurabh Garg.jpg" class="rounded-circle" alt=""/>
                            </div>
                             
                            <div>
                                <p1>Dr. Saurabh Garg</p1>
                                <p2><br> Lecturer of ICT</p2>
                             </div>
                            <div class="email">  
                           <img src="images/email.png" alt=""/>
                              <p3>ByeongHoHang@gmail.com </p3>
                            </div>
                        </li>



                        <li>
                            <div class="photo">
                                <img src="images/julia.jpg" class="rounded-circle" alt=""/>
                            </div>
                             
                            <div>
                                <p1>Julia Jung</p1>
                                <p2><br> Research Assistant</p2>
                             </div>
                            <div class="email">  
                           <img src="images/email.png" alt=""/>
                              <p3>ByeongHoHang@gmail.com </p3>
                            </div>
                        </li>-->








                    </ul>
                </div>
				
				
				<div class="row">
				<div class="col-md-4 text-center"> 
					<div class="photo">
                        <img src="images/Kang.jpg" style="width:40%; height:auto; max-height:195px;" class="rounded-circle" alt=""/>
                    </div>
					<br/>
                    <div>
                        <p1>Prof. Byeong Ho Kang</p1>
                        <p2><br>Professor and Head of ICT </p2>
                    </div>
                    <div class="email">  
                        <img src="images/email.png" style="width:8%;padding-top:1%;" alt=""/> 
						<a style="color:#444; background-color:#FFFFFF;padding:0px;margin:0px" href="mailto:ByeongHoHang@gmail.com"><span style="vertical-align:30%;">ByeongHoHang@gmail.com</a></span>
                        <br/>
						<br/>
						<br/>
						<br/>
                    </div>
				</div>
				
				<div class="col-md-4 text-center"> 
					<div class="photo">
                        <img src="images/Saurabh Garg.jpg" style="width:40%; height:auto; max-height:195px;" class="rounded-circle" alt=""/>
                    </div>
					<br/>
                    <div>
                        <p1>Dr. Saurabh Garg</p1>
                        <p2><br> Lecturer of ICT</p2>
                    </div>
                    <div class="email">  
                        <img src="images/email.png" style="width:8%;" alt=""/> 
						<a style="color:#444; background-color:#FFFFFF;padding:0px;margin:0px" href="mailto:ByeongHoHang@gmail.com"><span style="vertical-align:30%;">ByeongHoHang@gmail.com</a></span>
						<br/>
						<br/>
						<br/>
						<br/>
                    </div>
				</div>
				
				<div class="col-md-4 text-center">
					<div class="photo">
                        <img src="images/julia.jpg" style="width:40%; height:auto; max-height:195px;" class="rounded-circle" alt=""/>
                    </div>
					<br/>
                    <div>
                        <p1>Julia Jung</p1>
                        <p2><br> Research Assistant</p2>
                    </div>
                    <div class="email">  
                         <img src="images/email.png" style="width:8%;" alt=""/> 
						<a style="color:#444; background-color:#FFFFFF;padding:0px;margin:0px" href="mailto:ByeongHoHang@gmail.com"><span style="vertical-align:30%;">ByeongHoHang@gmail.com</a></span>
                        
                    </div>
				</div>
				
				</div> 


            </div>

        </div>
    </div>
</section>

<!-- Footer -->
<?php
include_once 'footer.html';
?>
