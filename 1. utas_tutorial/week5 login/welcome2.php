<html>
<body>
<?php
 $mysqli=new mysqli("localhost","lichuans","492487","lichuans");
 
if (isset($_POST['submit'])){
 $author = $_POST['author'];
 $title = $_POST['title'];
 $type = $_POST['type'];
 $year = $_POST['year'];
 
 echo "
<table>
<tr>
<th>author</th>
<th>title</th>
<th>type</th>
<th>year</th>
</tr>

<tr>
<td>$author</td>
<td>$title</td>
<td>$type</td>
<td>$year</td>
</tr>
</table>"
;

 
 $insertquery = "INSERT INTO `classics` (`author`, `title`, `type`, `year`) VALUES ('$author','$title','$type','$year')";
 $mysqli ->query($insertquery);
 echo mysql_error();
}
?>
</body>
</html>


