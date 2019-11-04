<?php
//SS9 get_cities.php
    switch($_REQUEST['country'])
    {
        case "au":
        $cities = array('Please Select City', 'Adelaide', 'Brisbane', 'Canberra', 'Darwin', 'Hobart', 'Melbourne', 'Perth', 'Sydney');
        break;
        
        case "uk":
        $cities = array('Please Select City', 'Birmingham', 'Glasgow', 'Leeds', 'Liverpool', 'London', 'Manchester', 'Newcastle', 'Nottingham');
        break;

        case "us":
        $cities = array('Please Select City', 'Chicago', 'Dallas', 'Houston', 'Los Angeles', 'Miami', 'New York City', 'Philadelphia', 'Washington, D.C.');
        break;  
        
        default :
        $cities = false;
        break;
    }
    if(!$cities) echo "";
    else {
		
		echo "<select name='city' id='city'>";
		for($i=0; $i<sizeof($cities); $i++)
		{
			echo "<option value=".trim($cities[$i]).">".trim($cities[$i])."</option>";
		}
		echo "</select>";	
			
	}
?>