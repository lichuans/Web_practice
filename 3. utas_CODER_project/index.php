<?php
/**
 * Main Page
 * 1. display main page (dynamically load project data from the database)
 * Created by Jing Effie Liu.
 * Date: 2018/11/15
 */
include_once 'header.html';
include_once 'dba.php';
mysqli_set_charset($conn, 'utf8');
?>
<meta name="viewport" content="width=device-width, user-scalable=no">
<link rel="stylesheet" href="assets/css//bootstrap.min.css?v={<?php echo time() ?>}">
<link rel="stylesheet" href="assets/css/index.css?v={<?php echo time() ?>}">

    <!-- Banner -->
    <section class="banner full">
        <article>
            <img src="images/utas3.jpg" alt=""/>
            <div class="inner">
                <header class="inner_header">
                    <p>YOUR CAREER START AT</p>
                    <h2>CODER</h2>
                </header>
                <a href="project_list.php?type=all" class="btn btn-info" style="font-family:myriad pro;">Available Projects</a>
            </div>
        </article>
        <article>
            <img src="images/utas4.jpg" alt=""/>
            <div class="inner">
                <header class="inner_header">
                    <p>Believe Yourself</p>
                    <h2>Apply Now</h2>
                </header>
                <a href="applyform.php" class="btn btn-info" style="font-family:myriad pro;">APPLY NOW</a>
            </div>
        </article>
        <article>
            <img src="images/banner14.jpg" alt=""/>
            <div class="inner">
                <header class="inner_header">
                    <p>To provide opportunities for future generation</p>
                    <h2>Be A Partner</h2>
                </header> 
                <a href="applyform.php" class="btn btn-info" style="font-family:myriad pro;">JOIN US</a>
            </div>
        </article>
    </section>


    <!-- One -->
    <section id="one" class="wrapper-style2">
        <div class="inner">
            <header>
                <br><br>
                <h3>WHAT IS CODER?</h3>
                 <div align="center">
                 <img src="images/line.png" alt=""/>
                 </div><br>
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
                    projects.</p><br><br><br><br>
            </header>
        </div>
    </section>



    <!--projectlist -->
    <section id="two" class="wrapper-style2">
        <header class="align-center">
            <h3>PROJECTS</h3>
            <div align="center">
                <img src="images/line.png" alt=""/>
            </div>
        </header>
    </section>

	
    <section id="two" class="wrapper-style2 projectlist">
        <?php
            $projects = '';
            $title= 'all';
            // check the connection with the database
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            else {
                //read and display projects
                $sql = "SELECT ID, Name, StartDate, EndDate, Description, Picture FROM Project ";
                switch ($title) {
                    case 'NEW':
                        $sql .= 'WHERE Category = 0 '; //WHERE utc_date() < StartDate ';
                        break;
                    case 'CURRENT':
                        $sql .=  'WHERE Category = 1 '; // 'WHERE utc_date() BETWEEN StartDate AND EndDate ';
                        break;
                    case 'PAST':
                        $sql .=  'WHERE Category = 2 '; // 'WHERE utc_date() > EndDate ';
                        break;
                    case 'all':
                        break;
                }
                $sql .= " ORDER BY id DESC ";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    echo $sql;
                    printf("Error: %s\n", mysqli_error($conn));
                } else {
                    if ($result->num_rows < 1) {
                        $projects = "no any ".$title." project currently ";
                    } else {
                        $time=1;
                        echo "<div class='projectlist'>";
                        echo " <ul>";
                        while ($row = mysqli_fetch_array($result) and $time<=3) {
                            $picture=$row['Picture'];
                            $name=$row['Name'];
                            $description=$row['Description'];
                            $startdate=$row['StartDate'];
                            $enddate=$row['EndDate'];
                            $id=$row['ID'];


                            echo "<li style='margin-bottom:30px'>";
                            echo '<div class="cell" style="height:200px; background-color: #333333; text-align: center; margin-bottom: 0px;">';
                            echo "<img src='$picture' alt='$name'/>";
                            echo "<br><br>";
                            echo "</div>";

                            echo "<div class='projectcontent cell' style='background-color:#333333'>";
                            echo "<header> ";
                            echo "<h2 style='padding-top:5%'>" . $name . "</h2>";
                            echo "</header>";
                            echo "<p style='padding:5%'>" . substr($description, 0, 161) . "...</p>";
                            echo "<footer>";
                            echo "<p1>" . $startdate . ' ~ ' . $enddate . "</p1> ";
                            echo "<br><br>";
                            echo "<a href=\"project_details.php?pid=$id\">Learn More</a>";
                            echo "<br><br>";
                            echo "</footer>";
                            echo "</div>";

                            echo "</li>";

                            $time++;
                        }
                        echo "</ul>";
                        echo "</div>";
                    }
                }
            }
            echo "<div class='readmore'>";
            echo "<p style=\"text-align:right; width:100%\"><a href='project_list.php'>Read More&gt;&gt;</a></p>";
            echo "</div>";
        ?>
    </section>
    <!-- SECTION: SUCCESSFUL STORIES -->
    <section id="three" class="wrapper-style2">
        <header class="align-center">
            <h3>SUCCESSFUL STORIES</h3>
            <div align="center">
                <img src="images/line.png" alt=""/>
            </div>
        </header>
    </section>

    <section id="two" class="wrapper-style2 projectlist">
    <?php
        $projects = '';
        $title= 'PAST';
        // check the connection with the database
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        else {
            //read and display projects
            $sql = "SELECT ID, Name, StartDate, EndDate, Description, Picture FROM Project ";
            switch ($title) {
                case 'NEW':
                    $sql .= 'WHERE Category = 0 '; //WHERE utc_date() < StartDate ';
                    break;
                case 'CURRENT':
                    $sql .=  'WHERE Category = 1 '; // 'WHERE utc_date() BETWEEN StartDate AND EndDate ';
                    break;
                case 'PAST':
                    $sql .=  'WHERE Category = 2 '; // 'WHERE utc_date() > EndDate ';
                    break;
                case 'all':
                    break;
            }
            $sql .= " ORDER BY id DESC ";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo $sql;
                printf("Error: %s\n", mysqli_error($conn));
            } else {
                if ($result->num_rows < 1) {
                    $projects = "no any ".$title." project currently ";
                } else {
                    $time=1;
                    echo "<div class='projectlist'>";
                    echo " <ul>";
                    while ($row = mysqli_fetch_array($result) and $time<=3) {
                        $picture=$row['Picture'];
                        $name=$row['Name'];
                        $description=$row['Description'];
                        $startdate=$row['StartDate'];
                        $enddate=$row['EndDate'];
                        $id=$row['ID'];


                        echo "<li style='margin-bottom:30px'>";
                        echo '<div class="cell" style="height:200px; background-color: #333333; text-align: center; ">';
                        echo "<img src='$picture' alt='$name'/>";
                        echo "</div>";

                        echo "<div class='projectcontent cell' style='background-color:#333333'>";
                        echo "<header> ";
                        echo "<h2 style='padding-top:5%'>" . $name . "</h2>";
                        echo "</header>";
                        echo "<p style='padding:5%'>" . substr($description, 0, 161) . "...</p>";
                        echo "<footer>";
                        echo "<p1>" . $startdate . ' ~ ' . $enddate . "</p1> ";
                        echo "<br><br>";
                        echo "<a href=\"project_details.php?pid=$id\">Learn More</a>";
                        echo "<br><br>";
                        echo "</footer>";
                        echo "</div>";

                        echo "</li>";

                        $time++;
                    }
                    echo "</ul>";
                    echo "</div>";
                }
            }
        }
        echo "<div class='readmore'>";
        echo "<p style=\"text-align:right; width:100%\"><a href='project_list.php'>Read More&gt;&gt;</a></p>";
        echo "</div>";
    ?>
    </section>

    <!--Partner -->
    <section id="four" class="wrapper-style2">
        <header class="align-center">
            <h3>PARTNERS</h3>
            <div align="center">
                <img src="images/line.png" alt=""/>
            </div>
        </header>
    </section>
    <section id="two" class="partnerlist">
    <?php
        //read and display projects
        $sql = "SELECT ID,Name,Picture,Description FROM PartnersEx";
        $result = mysqli_query($conn, $sql);
        
        echo '<div class="projectlist">';
        echo '<ul>';
        $time=1;
        while ($row = mysqli_fetch_array($result) and $time<=5) {
            $id=$row['ID'];
            $picture=$row['Picture'];
            $name=$row['Name'];
            $description=$row['Description'];
            echo '<li style="margin-bottom:30px">';
            echo '<div style="height:200px; background-color: white; text-align: center; margin-bottom: 20px;">';
            echo '<img src="' . $picture. '" alt="' . $name. '" style="background-color:white;"/>';
            echo '</div>';
            echo '<div class="projectcontent cell" style="background-color: #333333;">';
            echo '<header>';
            echo '<h2 style="padding-top:5%">' . $name . '</h2>';
            echo '</header>';
            echo '<p style="padding:5%">' . substr($description, 0, 161) . ' ...</p>';
            echo '<footer style="padding-bottom:5%">';
            echo '<p1></p1>';
            echo '<a href="partnerdetails_ex.php?pid=' . $id . '">Learn More</a>';
            echo '</footer>';
            echo '</div><br/>';
            echo '</li>';
			
            $time++;
        }
        echo "</ul>";
        echo "</div>";
    ?>
    </section>

    <!-- CONTACTS -->
    <section id="five" class="wrapper-style2">
        <div class="inner">
            <header class="align-center">
                <h3>CONTACTS</h3>

                <p class="special"></p>
                <span><br>University of Tasmania <br>
        Discipline of ICT<br>
        Grosvenor St, Sandy Bay TAS 7005<br>
        info@mysite.com  |  Tel: 123-456-7890</span>
            </header>
        </div>
    </section>
    <br><br><br><br>
<?php
include_once 'footer.html';
$conn->close();
?>
