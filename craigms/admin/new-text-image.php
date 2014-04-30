<?php include 'includes/header.php'; ?>
<?php

if (isset($_GET['group'])) {
$group = $_GET['group'];
} 

//This is the directory where images will be saved
$target = "../images/";
$target = $target . basename( $_FILES['Filename']['name']);

//This gets all the other information from the form
$Filename=basename( $_FILES['Filename']['name']);
$fullimgurl = $info['url'].'/craigms/images/'.$Filename;
$Description=$_POST['Description'];
$text=$_POST['text'];


//Writes the Filename to the server
if(isset($_POST['upload']) && move_uploaded_file($_FILES['Filename']['tmp_name'], $target)) {

//Tells you if its all ok
echo "<div class='popupSuccess'>Success!</div>";

//Writes the information to the database
mysql_query("INSERT INTO textimage (imageurl,name,text,groupname)
VALUES ('$fullimgurl', '$Description', '$text', '$group')") ;
} 
else if(isset($_POST['Submit']))  {
//Gives and error if its not
echo "<div class='popupSuccess'>Error</div>";
}

?> 


<div class="col100">
<h1>New Text and Image</h1>
</div>

	<div class="colFull">
		
		
		<form method="post" action="" enctype="multipart/form-data">
			<span class="adminHeading">Text and Image Name</span> <input type="text" name="Description" /> <br /><br />
			<span class="adminHeading">Select Image</span> <input type="file" name="Filename"> <br /><br />
			<span class="adminHeading">Text</span> <textarea class="tinymce" name="text"></textarea><br /><br />
			<input TYPE="submit" name="upload" value="Create"/>
		</form>
		
	</div>




<?php include 'includes/footer.php'; ?>