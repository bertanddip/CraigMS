<?php
if (isset($_GET['id'])) {
$id = $_GET['id'];
} 

// Connects to your Database 
$imageSingleData = mysql_query("SELECT * FROM images WHERE id='$id' ") 
or die(mysql_error()); 
 
while($imageSingleInfo = mysql_fetch_array( $imageSingleData )) 
{ 
echo $imageSingleInfo['imageurl']; 
} 
 
?>