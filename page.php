<?php include 'craigms/includes/database.php'; 

if (isset($_GET['page'])) {
$page = $_GET['page'];
} 
 
$pageData = mysql_query("SELECT * FROM pages WHERE slug='$page' ");
$pageInfo = mysql_fetch_array( $pageData );

$template = $pageInfo['template'];

?>



<?php 
	if(!empty($template)){
		include "craigms/themes/".$info['theme']."/custom-".$pageInfo['template'].".php";
	}
	else{
		include "craigms/themes/".$info['theme']."/page.php";
	}
	
	
	
?>