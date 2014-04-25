<?php include 'includes/header.php'; ?>
<?php



$id=$_POST['id']; 
$group=$_POST['group']; 

if(isset($_POST['Delete']) && !$errors)
{
echo "<div class='col100'>Text and Image Deleted.</div>";
mysql_query("DELETE FROM textimage WHERE id='$id' ") ;  
}

if(isset($_POST['Addtomenu']) && !$errors)
{
echo "<div class='col100'>Added to menu.</div>";
mysql_query("UPDATE textimage SET active='1' WHERE id='$id'") ;  
}

if(isset($_POST['Removefrommenu']) && !$errors)
{
echo "<div class='col100'>Removed from menu.</div>";
mysql_query("UPDATE textimage SET active='0' WHERE id='$id'") ;  
}

if(isset($_POST['Addtogroup']) && !$errors)
{
echo "<div class='col100'>Added to Group.</div>";
mysql_query("UPDATE textimage SET groupname='$group' WHERE id='$id'") ;  
}

$data = mysql_query("SELECT * FROM textimage") 
or die(mysql_error()); 

?>

<div class="col100">
<h1>Text and Image</h1>
</div>

<div class="colFull">
<ul id="imageList">	

<?php while($info = mysql_fetch_array( $data )) { ?>
		<li>
			<span class="adminHeading"><?php Print $info['name']; ?></span><br />
			<img src="../images/<?php Print $info['imageurl']; ?>" /><br clear="all" />
			<a class="redButton" href="edit-text-image.php?id=<?php Print $info['id']; ?>">
				Edit
			</a>
			
			<?php if ($info['active'] == 0)
				{
					echo '<form class="addtomenu" name="update" method="post" enctype="multipart/form-data" action="">
					<input type="hidden" name="id" value="'.$info["id"].'" >
					<input type="hidden" name="active" value="1" >
					<input name="Addtomenu" type="submit" value="Add to menu">
					</form>';
				}
			else
				{
					echo '<form class="addtomenu" name="update" method="post" enctype="multipart/form-data" action="">
					<input type="hidden" name="id" value="'.$info["id"].'" >
					<input type="hidden" name="active" value="0" >
					<input name="Removefrommenu" type="submit" value="Remove from menu">
					</form>';
				}			
			?>				
			
			<?php
			echo '<form name="delete" method="post" enctype="multipart/form-data" action="">
			<input type="hidden" name="id" value="'.$info["id"].'" >
			<input name="Delete" type="submit" value="Delete">
			</form>';
			?>
			
			<?php
			{
					echo '<br /><form class="addtogroup" name="update" method="post" enctype="multipart/form-data" action="">
					<input type="hidden" name="id" value="'.$info["id"].'" >
					<label>Groups:</label><br />
					<input type="text" name="group" value="'.$info["groupname"].'" ><br />
					<input name="Addtogroup" type="submit" value="Update">
					</form>';
				}
			?>					
			<br clear="all" />
			<span class="include">To add this to your website template, please paste the following code:<br />
			<b>&lt;?php $_GET['id'] = '<?php echo $info['id']; ?>'; include('craigms/includes/single.php'); ?&gt;</b></span>
		</li>
<?php } ?>
<li><a style="color: #666; font-weight: normal;" href="new-text-image.php">+ Add New Text and Image</a></li>
</ul>
</div>
<?php include 'includes/footer.php'; ?>