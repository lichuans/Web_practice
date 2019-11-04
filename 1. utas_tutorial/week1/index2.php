<!DOCTYPE html>

<html>

<?php
   
       //This is comment
  
       $author= "Lichuan Sun";
  
       $dateCreated= "2018-03-01";
  
  ?>

         <head><title>My First Web - PHP</title> </head>



        <body>
             
             <h1>  My PHP Home Page</h1>
           
             <p></p >
           
             <br> 
           
             <ul>
            
                 <li>Author: <?php echo $author; ?> </li>
            
                 <li>Date updated: <?php echo $dateCreated; ?> </li>
            
             </ul>

             

             <?php
              
             //put any comment
              
             echo "Hello World"."<br>";              
             echo "This is my first PHP code"."<br><br>";
              
             echo "Date:".date('Y-M-d');
              
             ?>
     
             </body>

  </html>