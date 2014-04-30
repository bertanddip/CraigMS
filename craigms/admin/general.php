<?php include 'includes/header.php'; ?>
<?php
 


$url=$_POST['url']; 
$theme=$_POST['theme']; 
$themeurl = $url.'/craigms/themes/'.$theme; 

$target = "../images/";
$target = $target . basename( $_FILES['logo']['name']);
$logo=basename( $_FILES['logo']['name']);
$logourl = $url.'/craigms/images/'.$logo;
 
if(isset($_POST['Submit']) && !$errors) {

	if(empty($logo)){
		echo "<div class='successPopup'>Update Successful!</div>";
		mysql_query("UPDATE content SET url='$url', theme='$theme', themeurl='$themeurl' WHERE id=1 ") ;
	}

	elseif(isset($logo) && move_uploaded_file($_FILES['logo']['tmp_name'], $target)){

		echo "<div class='successPopup'>Update Successful!</div>";
		mysql_query("UPDATE content SET url='$url', logo='$logourl', theme='$theme', themeurl='$themeurl' WHERE id=1  ") ;  
	}

}

$data = mysql_query("SELECT * FROM content") 
or die(mysql_error()); 

?> 



<div class="col100">
<h1>General</h1>
</div>

<div class="colFull">

<img src="<?php Print $info['logo']; ?>" width="150" height="150" /><br clear="all" /><br clear="all" />


<form name="general" method="post" enctype="multipart/form-data" action="">
	<span class="adminHeading">Logo</span><br /> 
	<input name="logo" type="file" /><br />
	<span class="adminHeading">URL</span><br /> 
	<input name="url" type="text" value="<?php echo $info['url']; ?>" /><br />
	<span class="adminHeading">Theme</span><br /> 
	<input name="theme" type="text" value="<?php echo $info['theme']; ?>" /><br />
	<input name="Submit" type="submit" value="Update" />
</form>






</div>
<?php include 'includes/footer.php'; ?>