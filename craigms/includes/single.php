<?php

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