<?php include 'includes/header.php'; ?>
<?php



$id=$_POST['id']; 

if(isset($_POST['Delete']) && !$errors)
{
echo "<div class='popupSuccess'>Group Deleted.</div>";
mysql_query("DELETE FROM groups WHERE id='$id' ") ;  
}

if(isset($_POST['Addtomenu']) && !$errors)
{
echo "<div class='popupSuccess'>Added to menu.</div>";
mysql_query("UPDATE groups SET active='1' WHERE id='$id'") ;  
}

if(isset($_POST['Removefrommenu']) && !$errors)
{
echo "<div class='popupSuccess'>Removed from menu.</div>";
mysql_query("UPDATE groups SET active='0' WHERE id='$id'") ;  
}

$data = mysql_query("SELECT * FROM groups") 
or die(mysql_error()); 

?>

<div class="col100">
<h1>Groups</h1>
</div>

<div class="colFull">


<ul id="adminList">	

<?php while($info = mysql_fetch_array( $data )) { ?>
		<li>
			<span class="adminHeading"><?php Print $info['groupname']; ?></span><br />
			<a class="redButton" href="edit-group.php?group=<?php Print $info['slug']; ?>">
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
			</form>'; ?>
			
<br clear="all" />
			<span class="include">To add this to your website template, please paste the following code:<br />
			<b>&lt;?php $_GET['group'] = '<?php echo $info['slug']; ?>'; include('craigms/includes/group.php'); ?&gt;</b></span>
		</li>
<?php } ?>
<li><a style="color: #666; font-weight: normal;" href="new-group.php">+ Add New Group</a></li>
</ul>
</div>

<?php include 'includes/footer.php'; ?>