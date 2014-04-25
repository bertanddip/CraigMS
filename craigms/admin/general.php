<?php include 'includes/header.php'; ?>
<?php
 
function findexts ($filename) 
{ 
$filename = strtolower($filename) ; 
$exts = split("[/\\.]", $filename) ; 
$n = count($exts)-1; 
$exts = $exts[$n]; 
return $exts; 
} 

$ext = findexts ($_FILES['logo']['name']) ; 
$mylogo = "images/logo";
$mylogourl = $mylogo.'.'.$ext; 
$target = "../".$mylogo.'.'.$ext; 

$url=$_POST['url']; 
$theme=$_POST['theme']; 
$themeurl = $url.'/craigms/themes/'.$theme; 
 
if(isset($_POST['Submit']) && !$errors) {

	if(empty($Filename)){
		echo "<div class='successPopup'>Update Successful!</div>";
		mysql_query("UPDATE content SET url='$url', theme='$theme', themeurl='$themeurl' WHERE id=1 ") ;
	}

	elseif(isset($Filename)){
		echo "<div class='successPopup'>Update Successful!</div>";
		mysql_query("UPDATE content SET url='$url', logo='$mylogourl', theme='$theme', themeurl='$themeurl' WHERE id=1  ") ;  
	}

}

$data = mysql_query("SELECT * FROM content") 
or die(mysql_error()); 

?> 



<div class="col100">
<h1>General</h1>
</div>

<div class="colFull">

<img src="../<?php Print $info['logo']; ?>" width="150" height="150" /><br clear="all" /><br clear="all" />


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