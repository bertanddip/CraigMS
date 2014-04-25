<?php 

if (isset($_GET['group'])) {
$group = $_GET['group'];
} 


$textimageData = mysql_query("SELECT * FROM textimage WHERE groupname='$group' ORDER BY id DESC ") 
or die(mysql_error()); 

$url = mysql_query("SELECT url FROM content WHERE id=1  ") 
or die(mysql_error()); 


echo '<ul class="text-image group-list">';
while($textimageInfo = mysql_fetch_array( $textimageData )) 
{ 
echo '<li>';


if(!empty($textimageInfo['imageurl'])) {
echo '<a href="'.$info['url'].'/group/'.$group.'/'.$textimageInfo["id"].'"><img class="group text-image-image '.$group.'-'.$textimageInfo ["id"].'" src="';
echo $textimageInfo['imageurl']; 
echo '" /></a>';
}

if(!empty($textimageInfo['name'])) {
echo '<span class="group text-image-heading '.$group.'-'.$textimageInfo ["id"].'">';
echo $textimageInfo['name']; 
echo '</span>';
}						


if(!empty($textimageInfo['text'])) {

$length=300;
$fullpost=$textimageInfo['text']; 
$excerpt = substr($fullpost, 0, $length); 
    
echo '<span class="group text-image-text '.$group.'-'.$textimageSingleInfo ["id"].'">';
echo $excerpt; 
echo '</span>';		

echo '<a href="'.$info['url'].'/group/'.$group.'/'.$textimageInfo["id"].'"> ...read more</a>';    
}
  
    
echo '</li><br clear="all" />'; 
    
}

echo '</ul>';
?>