<?php

if (isset($_GET['id'])) {
$id = $_GET['id'];
} 

// Connects to your Database 
$textSingleData = mysql_query("SELECT * FROM text WHERE id='$id' ") 
or die(mysql_error()); 
 
while($textSingleInfo = mysql_fetch_array( $textSingleData )) 
{ 
echo '<span class="page text-copy id-'.$textSingleInfo ["id"].'">'; 
echo $textSingleInfo['text']; 
echo '</span>';
} 
 
?>