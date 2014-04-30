<?php

if (isset($_GET['id'])) {
$id = $_GET['id'];
} 

if (isset($_GET['group'])) {
$group = $_GET['group'];
} 

 
// Connects to your Database 
$textimageSingleData = mysql_query("SELECT * FROM textimage WHERE id='$id' AND groupname='$group' ") 
or die(mysql_error()); 
 
while($textimageSingleInfo = mysql_fetch_array( $textimageSingleData )) 
{ 

if(!empty($textimageSingleInfo['imageurl'])) {
echo '<img class="group text-image-image '.$group.'-'.$textimageSingleInfo ["id"].'" src="';
echo $textimageSingleInfo['imageurl']; 
echo '" />';
}

if(!empty($textimageSingleInfo['name'])) {
echo '<span class="group text-image-heading '.$group.'-'.$textimageSingleInfo ["id"].'">';
echo $textimageSingleInfo['name']; 
echo '</span>';
}
						


if(!empty($textimageSingleInfo['text'])) {
echo '<span class="group text-image-text '.$group.'-'.$textimageSingleInfo ["id"].'">';
echo $textimageSingleInfo['text']; 
echo '</span>';
}

} 
 
?>