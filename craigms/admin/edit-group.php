<?php include 'includes/header.php'; ?>
<?php

if (isset($_GET['group'])) {
$group = $_GET['group'];
} 

$target = "../images/";
$target = $target . basename( $_FILES['Filename']['name']);
$Filename=basename( $_FILES['Filename']['name']);
$fullimgurl = $info['url'].'/craigms/images/'.$Filename;

$Description=$_POST['Description'];
$text=$_POST['text']; 
$id=$_POST['id']; 
$text = str_replace('\'', '\'\'', $text);
$name=$_POST['name']; 



if(isset($_POST['SubmitTextImage']) && !$errors) {

	if(empty($Filename)){
		echo "<div class='successPopup'>Update Successful!</div>";
		mysql_query("UPDATE textimage SET text='$text', name='$Description' WHERE id='$id' ") ;
	}

	elseif(isset($Filename)){
        move_uploaded_file($_FILES['Filename']['tmp_name'], $target);
		echo "<div class='successPopup'>Update Successful!</div>";
		mysql_query("UPDATE textimage SET text='$text', imageurl='$fullimgurl', name='$Description' WHERE id='$id' ") ;
	}

}

elseif(isset($_POST['Delete']) && !$errors)
{
echo "<div class='popupSuccess'>Group Deleted.</div>";
mysql_query("DELETE FROM textimage WHERE id='$id' ") ;  
}

$textimagedata = mysql_query("SELECT * FROM textimage WHERE groupname='$group' ") 
or die(mysql_error()); 



?> 

	<div class="col100">
		
			<h1>Edit Group</h1>

	</div>
	

	<div class="colFull">	
		<a class="redButton" href="new-group-entry.php?group=<?php echo $group; ?>">Add new item</a>
	</div>



	
	<div class="colFull">	

	
		<ul id="adminList">
			<?php while($textimageinfo = mysql_fetch_array( $textimagedata )) {  ?>
				<li>
					<form method="post" action="" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $textimageinfo['id'] ?>" />
						
						<input name="Description" value="<?php echo $textimageinfo['name'] ?>" />
						<br clear="all" /><br />
						

						<?php 
						if(!empty($textimageinfo["imageurl"])) {?>
						<img src="<?php echo $textimageinfo["imageurl"] ?>" />
						<br clear="all" />
						<?php } ?>
						
						
						<input type="file" name="Filename">
						<br /><br />

						<textarea name="text"><?php echo $textimageinfo['text'] ?></textarea>
						<br />
						
						<input TYPE="submit" name="SubmitTextImage" value="Update"/>
                        
			            <input name="Delete" type="submit" value="Delete">
					</form>
				</li>
			<?php
            } ?>
            
         
		</ul>
	</div>
	


<?php include 'includes/footer.php'; ?>