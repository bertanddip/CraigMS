<?php include 'includes/header.php'; ?>
<?php

$groupname=$_POST['groupname']; 
$slug=$_POST['slug']; 

if(isset($_POST['Submit']) && !$errors){
mysql_query("INSERT INTO groups SET groupname='$groupname', slug='$slug' ") ;  
echo "<div class='popupSuccess'>Success!</div>";
}

?> 

<div class="col100">
<h1>New Group</h1>
</div>

<div class="colFull">

	<form name="group" method="post" enctype="multipart/form-data" action="">
		<span class="adminHeading">Name of Group</span><br /><input type="text" name="groupname" value=""><br /><br />
		<span class="adminHeading">Slug (Important, no spaces or special characters)</span><br /><input type="text" name="slug" value=""><br /><br />
		<input name="Submit" type="submit" value="Create" />
	</form>

</div>

<?php include 'includes/footer.php'; ?>