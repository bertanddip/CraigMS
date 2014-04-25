<?php include 'includes/header.php'; ?>
<?php

$name=$_POST['Description']; 

if (isset($_GET['group'])) {
$group = $_GET['group'];
} 

if (isset($_GET['page'])) {
$page = $_GET['page'];
} 

//This is the directory where images will be saved
$target = "../images/";
$target = $target . basename( $_FILES['Filename']['name']);

//This gets all the other information from the form
$Filename=basename( $_FILES['Filename']['name']);

$fullimgurl = $info['url'].'/craigms/images/'.$Filename;



//Writes the Filename to the server
if(isset($_POST['upload']) && move_uploaded_file($_FILES['Filename']['tmp_name'], $target)) {

//Tells you if its all ok
echo "<div class='popupSuccess'>Success!</div>";

//Writes the information to the database
mysql_query("INSERT INTO images (imageurl, name)
VALUES ('$fullimgurl', '$name')") ;
} 
else if(isset($_POST['Submit']))  {
//Gives and error if its not
echo "<div class='popupSuccess'>Error</div>";
}

?> 


<div class="col100">
<h1>New Image</h1>
</div>

	<div class="colFull">
		
		
		<form method="post" action="" enctype="multipart/form-data">
			<span class="adminHeading">Select Image</span> <input type="file" name="Filename"> <br /><br />
			<span class="adminHeading">Image Name</span> <input type="text" name="Description" /> <br /><br />
			<input TYPE="submit" name="upload" value="Create"/>
		</form>
		
	</div>




<?php include 'includes/footer.php'; ?>