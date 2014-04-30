<?php include 'includes/header.php'; ?>
<?php

if (isset($_GET['group'])) {
$group = $_GET['group'];
} 

if (isset($_GET['page'])) {
$page = $_GET['page'];
} 

$text=$_POST['text']; 
$name=$_POST['name']; 

if(isset($_POST['Submit']) && !$errors){
mysql_query("INSERT INTO text SET text='$text', name='$name' ") ; 
echo "<div class='popupSuccess'>Success!</div>";
}

?> 

<div class="col100">
<h1>New Text Box</h1>
</div>

<div class="colFull">

	<form name="abouttxt" method="post" enctype="multipart/form-data" action="">
		<span class="adminHeading">Name of Text Box</span><br /><input type="text" name="name" value=""><br /><br />
		<span class="adminHeading">Text</span><br /><textarea name="text"></textarea><br /><br />
		<input name="Submit" type="submit" value="Create" />
	</form>

</div>

<?php include 'includes/footer.php'; ?>