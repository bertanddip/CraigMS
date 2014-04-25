<?php include 'includes/header.php'; ?>
<?php



$id=$_POST['id']; 
$template=$_POST['template']; 

if(isset($_POST['Delete']) && !$errors)
{
echo "<div class='col100'>Page Deleted.</div>";
mysql_query("DELETE FROM pages WHERE id='$id' ") ;  
}





if(isset($_POST['Template']) && !$errors)
{
echo "<div class='successPopup'>Update Successful!</div>";
mysql_query("UPDATE pages SET template='$template' WHERE id='$id'") ;  
}


$data = mysql_query("SELECT * FROM pages") 
or die(mysql_error()); 

?>

<div class="col100">
<h1>Pages</h1>
</div>

<div class="colFull">

<ul id="adminList">	

<?php while($info = mysql_fetch_array( $data )) { ?>
		<li>
			<span class="adminHeading"><?php Print $info['pagename']; ?></span><br />
	
			
			<?php
			echo '<form name="delete" method="post" enctype="multipart/form-data" action="">
			<input type="hidden" name="id" value="'.$info["id"].'" >
			<input name="Delete" type="submit" value="Delete">
			</form>'; ?>
			
						<?php
					echo '<br /><form name="template" method="post" enctype="multipart/form-data" action="">
					<input type="hidden" name="id" value="'.$info["id"].'" >
					<label>Template</label><br />
					<input type="text" name="template" value="'.$info["template"].'" ><br />
					<input name="Template" type="submit" value="Update">
					</form>';
			?>		
			
<br clear="all" />
		</li>
<?php } ?>
<li><a style="color: #666; font-weight: normal;" href="new-page.php">+ Add New Page</a></li>
</ul>
</div>

<?php include 'includes/footer.php'; ?>