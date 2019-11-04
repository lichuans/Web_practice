<!DOCTYPE html>
<html>
<head>
   <title>Self Study 9-1</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script type="text/javascript">
      function setup_country_change(){
         //check whether country section is changed.
         $('#country').change(update_cities);
      }
      
      function update_cities(){
         //assigns the selected country to country variable.
         var country = $('#country').val();
         
         //get_cities.php performs when the country is selected.
         //call the function(show_cities) when the data is returned from get_cities.php.
         $.get('get_cities.php?country='+country,show_cities);
      }
      
      function show_cities(cities){
         //returned data from get_cities.php is assigned to cities
	     //change the field(drop down list)
         $('#cities').html(cities);
      }


      //When the page is loaded, function (setup_country_change())is called.
      $(document).ready(setup_country_change);

      


      function setup_city_change(){
        
         $('#cities').change(update_population);
      }
      
      function update_population(){
        
         var city = $('#cities').val();
         
        
         $.get('get_population.php?city='+city,show_population);
      }
      
      function show_population(population){
        
         $('#population').html(population);
      }


      $(document).ready(setup_city_change);

   
      
   
   </script>
</head>

<body>
   <h3>Self Study 9-1</h3>
   <form id="select_country" name="select_country" method="" action="#">
      <table>
         <tr>
            <th>Country: </th>
            <td>
               <select name="country" id="country" onchange="setup_country_change(this.value)">
                  <option value="" selected="selected">Please Select Country</option>
                  <option value="au">Australia</option>
                  
                  <option value="uk">United Kingdom</option>                  
                  <option value="us">United States</option>
               </select>
            </td>
         </tr>
         <tr >
            <th>Cities: </th>
            <td>
            <select id="cities"  onchange="setup_city_change(this.value)">
               <option>Please Select Country First</option>
               <?php
               while($cities){
                     echo "<option>$cities</option>";
               }
               ?>
            </select>
            </td>
         </tr>
         <tr >
            <th>Population:</th>
            <td id="population"></td>
         </tr>
      </table>
   </form>
</body>
</html>
