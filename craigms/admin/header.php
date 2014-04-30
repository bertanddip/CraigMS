<?php
session_start();
if(!isset($_SESSION['myusername'])){
header("location:main_login.php");
}
?>
<?php include '../includes/database.php';  
// Connects to your Database 
$text = mysql_query("SELECT * FROM text WHERE active=1 ") 
or die(mysql_error()); 

$image = mysql_query("SELECT * FROM images WHERE active=1 ") 
or die(mysql_error()); 

$textimage = mysql_query("SELECT * FROM textimage WHERE active=1 ") 
or die(mysql_error()); 

$html = mysql_query("SELECT * FROM html WHERE active=1 ") 
or die(mysql_error()); 

$pages = mysql_query("SELECT * FROM pages WHERE active=1 ") 
or die(mysql_error()); 

$groups = mysql_query("SELECT * FROM groups WHERE active=1 ") 
or die(mysql_error()); 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset="iso-8859-1" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/responsive.css" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
<script src="js/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({


	selector:'textarea',
    editor_deselector : 'mceNoEditor',
	entity_encoding:'numeric',
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
	toolbar: false,
    insertdatetime_dateformat: "%Y-%m-%d",
    insertdatetime_timeformat: "%H:%M:%S"

                                         
});
</script>
</head>
<body>

<?php 
echo $usertype;
if ($_SESSION['usertype'] == 1){
?>

	<div id="adminNav">	
		<a href="<?php Print $info['url']; ?>" target="_blank">
			<img class="adminLogo" src="../<?php Print $info['logo']; ?>"  />
		</a>

		<br clear="all" />

		<ul class="admin">
			<li><a href="text.php">Text Boxes</a></li>
			<li><a href="images.php">Images</a></li>
			<li><a href="groups.php">Groups</a></li>
			<li><a href="html.php">HTML Boxes</a></li>
		</ul>
		

		<ul class="admin">
			<li><a href="pages.php">Pages</a></li>
		</ul>		

		<ul class="admin">
			<li><a href="general.php">General</a></li>
			<li><a href="new-user.php">Add New User</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>

		<div class="poweredBy">
			Powered by CraigMS ver 1.4
		</div>
	</div>
	
<?php 
} 
else {
?>

	<div id="userNav">	
		<a href="<?php Print $info['url']; ?>" target="_blank">
			<img class="adminLogo" src="../<?php Print $info['logo']; ?>"  />
		</a>

		<br clear="all" />

		<ul class="user">
			<?php while($textinfo = mysql_fetch_array( $text )) { ?>		
				<li><a href="edit-text.php?id=<?php Print $textinfo['id']; ?>"><?php echo $textinfo['name'];?></a></li>
			<?php }?>	

			<?php while($imageinfo = mysql_fetch_array( $image )) { ?>		
				<li><a href="edit-image.php?id=<?php Print $imageinfo['id']; ?>"><?php echo $imageinfo['name'];?></a></li>
			<?php }?>	
			
			<?php while($textimageinfo = mysql_fetch_array( $textimage )) { ?>		
				<li><a href="edit-text-image.php?id=<?php Print $textimageinfo['id']; ?>"><?php echo $textimageinfo['name'];?></a></li>
			<?php }?>		
                                                                                         
			<?php while($htmlinfo = mysql_fetch_array( $html )) { ?>		
				<li><a href="edit-html.php?id=<?php Print $htmlinfo['id']; ?>"><?php echo $htmlinfo['name'];?></a></li>
			<?php }?>		                                                                                         


			<?php while($pagesinfo = mysql_fetch_array( $pages )) { ?>		
				<li><a href="edit-page.php?page=<?php Print $pagesinfo['slug']; ?>"><?php echo $pagesinfo['pagename'];?></a></li>
			<?php }?>	

			<?php while($groupinfo = mysql_fetch_array( $groups )) { ?>		
				<li><a href="edit-group.php?group=<?php Print $groupinfo['slug']; ?>"><?php echo $groupinfo['groupname'];?></a></li>
			<?php }?>				
			
		</ul>		
		


		<ul class="user">
			<li><a href="logout.php">Logout</a></li>
		</ul>

	</div>

<?php } ?>

<div id="wrapper">