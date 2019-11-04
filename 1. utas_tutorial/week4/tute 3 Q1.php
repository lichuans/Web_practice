<?php
    $a = array(
                "Jersey"=> array(
                    "Monday"=>2, "Tuesday"=>8, "Wednesday"=>4, "Thursday"=>2,
                    "Friday"=>4),
                "Pete"=> array(
                    "Monday"=>0, "Tuesday"=>0, "Wednesday"=>3, "Thursday"=>8, "Friday"=>8),
                "Joel"=> array(
                    "Monday"=>4, "Tuesday"=>6, "Wednesday"=>4, "Thursday"=>4, "Friday"=>4),
                "Martin"=> array(
                    "Monday"=>8, "Tuesday"=>8, "Wednesday"=>8, "Thursday"=>8, "Friday"=>8)  
                );
        
    foreach ($a as $key=> &$value){
        echo "{$key}<br>"; $value = array_map("what", $value);
   
    foreach ($value as $k=> $v){
        echo $k.":".$v."<br>";}
        echo "<br>";}
    
    function what ($value) {return $value;}    
    ?>
