<?php include 'includes/header.php'; ?>
<?php

if (isset($_GET['id'])) {
$id = $_GET['id'];
} 


$name=$_POST['name']; 
$text=$_POST['text']; 


if(isset($_POST['Submit']) && !$errors){
mysql_query("UPDATE text SET text='$text', name='$name' WHERE id=$id ") ;  
echo "<div class='successPopup'>Update Successful!</div>";
}

elseif(isset($_POST['Delete']) && !$errors)
{
echo "<div class='popupSuccess'>Text Deleted.</div>";
mysql_query("DELETE FROM text WHERE id='$id' ") ;  
}

$data = mysql_query("SELECT * FROM text WHERE id='$id'") 
or die(mysql_error()); 



?> 


	<div class="col100">
	
	<?php while($info = mysql_fetch_array( $data )) {  ?>
	
	<h1><?php echo $info['name']; ?></h1>

	</div>
<div class="colFull">	
	<form name="edittext" method="post" enctype="multipart/form-data" action="">

		
		<input type="text" name="name" value="<?php echo $info['name']; ?>"><br /><br />
		<textarea name="text"><?php echo $info['text']; ?></textarea><br />
		<input type="hidden" name="id" value="<?php $info["id"] ?>" >
		<input name="Submit" type="submit" value="Update" />
        
        <input name="Delete" type="submit" value="Delete">
	</form>
	<?php } ?>
		



		
	</div>

<?php include 'includes/footer.php'; ?>