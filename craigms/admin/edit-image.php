<?php include 'includes/header.php'; ?>
<?php

if (isset($_GET['id'])) {
$id = $_GET['id'];
} 

//This is the directory where images will be saved
$target = "../images/";
$target = $target . basename( $_FILES['Filename']['name']);

//This gets all the other information from the form
$Filename=basename( $_FILES['Filename']['name']);
$fullimgurl = $info['url'].'/craigms/images/'.$Filename;
$Description=$_POST['Description'];



if(isset($_POST['SubmitImage']) && !$errors) {

	if(empty($Filename)){
		echo "<div class='successPopup'>Update Successful!</div>";
		mysql_query("UPDATE images SET name='$Description' WHERE groupname='$group' AND id='$id' ") ;
	}

	elseif(!empty($Filename) && move_uploaded_file($_FILES['Filename']['tmp_name'], $target)){
		echo "<div class='successPopup'>Update Successful!</div>";
		mysql_query("UPDATE images SET imageurl='$fullimgurl', name='$Description' WHERE groupname='$group' AND id='$id' ") ;
	}

}

elseif(isset($_POST['Delete']) && !$errors)
{
echo "<div class='popupSuccess'>Image Deleted.</div>";
mysql_query("DELETE FROM images WHERE id='$id' ") ;  
}

$data = mysql_query("SELECT * FROM images WHERE id='$id'") 
or die(mysql_error()); 

?> 




	<div class="col100">
		
		<?php while($info = mysql_fetch_array( $data )) {  ?>
			<h1><?php echo $info['name']; ?></h1>

	</div>
	<div class="colFull">
	
		<form method="post" action="" enctype="multipart/form-data">
		
			<input type="text" name="Description" value="<?php echo $info['name'] ?>" /><br />
			<img src="<?php echo $info["imageurl"] ?>" /><br clear="all" />
			<input type="file" name="Filename"> <br />
			
			<input type="hidden" name="id" value="<?php echo $info["id"] ?>" >
			<input TYPE="submit" name="SubmitImage" value="Update"/>
            
            <input name="Delete" type="submit" value="Delete">

		</form>

		<?php } ?>
		


		
	</div>




<?php include 'includes/footer.php'; ?>