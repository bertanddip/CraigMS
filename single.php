<?php include 'craigms/includes/database.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} 

if (isset($_GET['group'])) {
    $group = $_GET['group'];
} 

$textimageSingleData = mysql_query("SELECT * FROM textimage WHERE id='$id'  ") 
or die(mysql_error()); 

?>
<?php include "craigms/themes/".$info['theme']."/single.php"; ?>