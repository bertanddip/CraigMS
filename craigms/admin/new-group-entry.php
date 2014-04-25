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
$text = str_replace('\'', '\'\'', $text);


if(isset($_POST['Submit']) && !$errors) {

	if(empty($Filename)){
		echo "<div class='successPopup'>Update Successful!</div>";
		mysql_query("INSERT INTO textimage (name,text,groupname)
VALUES ('$Description', '$text', '$group')") ;
	}

	elseif(isset($Filename)){
        move_uploaded_file($_FILES['Filename']['tmp_name'], $target);
		echo "<div class='successPopup'>Update Successful!</div>";
        mysql_query("INSERT INTO textimage (imageurl,name,text,groupname)
VALUES ('$fullimgurl', '$Description', '$text', '$group')") ;
	}

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
			<span class="adminHeading">Text</span> <textarea name="text"></textarea><br /><br />
			<input TYPE="submit" name="Submit" value="Create"/>
		</form>
		
	</div>




<?php include 'includes/footer.php'; ?>