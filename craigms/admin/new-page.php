<?php include 'includes/header.php'; ?>
<?php

$pagename=$_POST['pagename']; 
$slug=$_POST['slug']; 
$template=$_POST['template']; 

if(isset($_POST['Submit']) && !$errors){
mysql_query("INSERT INTO pages SET pagename='$pagename', slug='$slug', template='$template' ") ;  
echo "<div class='popupSuccess'>Success!</div>";
}

?> 

<div class="col100">
<h1>New Page</h1>
</div>

<div class="colFull">

	<form name="page" method="post" enctype="multipart/form-data" action="">
		<span class="adminHeading">Name of Page</span><br /><input type="text" name="pagename" value=""><br /><br />
		<span class="adminHeading">Slug (Important, no spaces or special characters)</span><br /><input type="text" name="slug" value=""><br /><br />
		<span class="adminHeading">Template</span><br /><input type="text" name="template" value=""><br /><br />
		<input name="Submit" type="submit" value="Create" />
	</form>

</div>

<?php include 'includes/footer.php'; ?>