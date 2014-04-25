<?php

if (isset($_GET['id'])) {
$id = $_GET['id'];
} 

// Connects to your Database 
$htmlSingleData = mysql_query("SELECT * FROM html WHERE id='$id' ") 
or die(mysql_error()); 
 
while($htmlSingleInfo = mysql_fetch_array( $htmlSingleData )) 
{ 
echo $htmlSingleInfo['text']; 
} 
 
?>
