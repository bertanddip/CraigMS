<?php include 'includes/header.php'; ?>
<?php

if (isset($_GET['id'])) {
$id = $_GET['id'];
} 

$text=$_POST['text']; 
$Description=$_POST['Description'];


$target = "../images/";
$target = $target . basename( $_FILES['Filename']['name']);
$Filename=basename( $_FILES['Filename']['name']);
$fullimgurl = $info['url'].'/craigms/images/'.$Filename;




if(isset($_POST['SubmitTextImage']) && !$errors) {

	if(empty($Filename)){
		echo "<div class='successPopup'>Update Successful!</div>";
		mysql_query("UPDATE textimage SET text='$text', name='$Description' WHERE id='$id' ") ;
	}

	elseif(isset($Filename) && move_uploaded_file($_FILES['Filename']['tmp_name'], $target)){
		echo "<div class='successPopup'>Update Successful!</div>";
		mysql_query("UPDATE textimage SET text='$text', imageurl='$fullimgurl', name='$Description' WHERE id='$id' ") ;
	}

}

elseif(isset($_POST['Delete']) && !$errors) {
echo "<div class='successPopup'>Text and Image Image.</div>";
}

$data = mysql_query("SELECT * FROM textimage WHERE id='$id'") 
or die(mysql_error()); 

?> 




	<div class="col100">
		
		<?php while($info = mysql_fetch_array( $data )) {  ?>
			<h1><?php echo $info['name']; ?></h1>

	</div>
	<div class="colFull">
	
		<form method="post" action="" enctype="multipart/form-data">
			
			<input type="hidden" name="id" value="<?php echo $info["id"] ?>" >
			<input type="text" name="Description" value="<?php echo $info['name'] ?>" /><br /><br />
			
			<img src="<?php echo $info["imageurl"] ?>" /><br clear="all" />
			<input type="file" name="Filename"> <br clear="all" />
			
			
			<textarea class="tinymce" name="text"><?php echo $info['text'] ?></textarea><br /><br />
			
			<input TYPE="submit" name="SubmitTextImage" value="Update"/><br /><br />
			

			
		</form>

		<?php } ?>
		


		
	</div>




<?php include 'includes/footer.php'; ?>