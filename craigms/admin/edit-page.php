<?php include 'includes/header.php'; ?>
<?php

if (isset($_GET['page'])) {
$page = $_GET['page'];
} 

$pagename=$_POST['pagename']; 
$slug=$_POST['slug']; 
$id=$_POST['id']; 



//This is the directory where images will be saved
$target = "../images/";
$target = $target . basename( $_FILES['Filename']['name']);

//This gets all the other information from the form
$Filename=basename( $_FILES['Filename']['name']);
$Description=$_POST['Description'];




if(isset($_POST['SubmitImage']) && !$errors) {

	if(empty($Filename)){
		echo "<div class='successPopup'>Update Successful!</div>";
		mysql_query("UPDATE images SET name='$Description' WHERE groupname='$group' AND id='$id' ") ;
	}

	elseif(isset($Filename)){
		echo "<div class='successPopup'>Update Successful!</div>";
		mysql_query("UPDATE images SET imageurl='$Filename', name='$Description' WHERE groupname='$group' AND id='$id' ") ;
	}

}


elseif(isset($_POST['Delete']) && !$errors) {
echo "<div class='col100'>Update Successful!</div>";
}

$text=$_POST['text']; 
$text = str_replace('\'', '\'\'', $text);
$name=$_POST['name']; 

if(isset($_POST['SubmitText']) && !$errors){
mysql_query("UPDATE text SET text='$text', name='$name' WHERE page='$page' ") ;  
echo "<div class='col100'>Update Successful!</div>";
}

$imagedata = mysql_query("SELECT * FROM images WHERE page='$page' ") 
or die(mysql_error()); 

$textdata = mysql_query("SELECT * FROM text WHERE page='$page' ") 
or die(mysql_error()); 



?> 

	<div class="col100">
		
			<h1>Edit Page</h1>

	</div>

	<?php echo $usertype; if ($_SESSION['usertype'] == 1){ ?>
		<div class="colFull">	
			<a class="redButton" href="new-text.php?page=<?php echo $page; ?>">Add new text item</a>
			<a class="redButton" href="new-image.php?page=<?php echo $page; ?>">Add new image item</a>	
		</div>
	<?php  } ?>


	<div class="colFull">	
		<ul id="adminList">	
		
		<?php while($imageinfo = mysql_fetch_array( $imagedata )) {  ?>
			<li>
				<input type="hidden" name="id" value="<?php echo $imageinfo['id'] ?>" />
				
				<form method="post" action="" enctype="multipart/form-data">
				<input type="text" name="Description" value="<?php echo $imageinfo['name'] ?>" />
						<br />
					
					<img src="../images/<?php echo $imageinfo["imageurl"] ?>" /><br clear="all" />
					<input type="file" name="Filename" />
					<br />
				
					
						
						
					
					<input type="hidden" name="id" value="<?php echo $imageinfo["id"] ?>" >
					

						<input TYPE="submit" name="SubmitImage" value="Update"/>

				</form>
			</li>
		<?php } ?>	

		<ul id="adminList">
			<?php while($textinfo = mysql_fetch_array( $textdata )) {  ?>
				<li>
					<form name="editText" method="post" enctype="multipart/form-data" action="">
						<input type="hidden" name="id" value="<?php echo $textinfo['id'] ?>" />
						
							<input type="text" name="name" value="<?php echo $textinfo['name']; ?>">
							<br />
							
						
						<textarea name="text"><?php echo $textinfo['text']; ?></textarea>
						<br />
						
						<input name="SubmitText" type="submit" value="Update" />
					</form>
				</li>
			<?php } ?>
		</ul>
	</div>

	
	

	
	
	


<?php include 'includes/footer.php'; ?>