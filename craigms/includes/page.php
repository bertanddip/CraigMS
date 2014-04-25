<?php

if (isset($_GET['page'])) {
$page = $_GET['page'];
} 

 
// Connects to your Database 
$textSingleData = mysql_query("SELECT * FROM text WHERE page='$page' ") 
or die(mysql_error()); 
 
while($textSingleInfo = mysql_fetch_array( $textSingleData )) 
{ 
echo '<span class="page text-copy '.$page.'-'.$textSingleInfo ["id"].'">'; 
echo $textSingleInfo['text']; 
echo '</span>';
} 
 
?>

<?php


// Connects to your Database 
$imageSingleData = mysql_query("SELECT * FROM images WHERE page='$page' ") 
or die(mysql_error()); 
 
while($imageSingleInfo = mysql_fetch_array( $imageSingleData )) 
{ 
echo '<img class="page image  '.$page.'-'.$imageSingleInfo ["id"].'" src="craigms/images/';
echo $imageSingleInfo['imageurl']; 
echo '" />';
} 
 
?>