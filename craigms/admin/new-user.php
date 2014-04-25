<?php include 'includes/header.php'; ?>
<?php

$username=$_POST['username']; 
$usertype=$_POST['usertype']; 
$password=$_POST['password']; 
$encrypt_password=md5($password); 

if(isset($_POST['Submit']) && !$errors){
mysql_query("INSERT INTO members SET username='$username', usertype='$usertype', password='$encrypt_password' ") ;  
echo "<div class='popupSuccess'>Success!</div>";
}

?> 

<div class="col100">
<h1>New User</h1>
</div>

<div class="colFull">

	<form name="newuser" method="post" enctype="multipart/form-data" action="">
		<span class="adminHeading">Username</span><br />
		<input type="text" name="username" value=""><br /><br />
		<span class="adminHeading">Password</span><br /> 
		<input type="text" name="password" value=""><br /><br />
		<span class="adminHeading">User Level</span><br /> 
		<select name="usertype">
			<option value="1">Admin</option>
			<option value="2">User</option>
		</select><br /><br />
		<input name="Submit" type="submit" value="Create" />
	</form>

</div>

<?php include 'includes/footer.php'; ?>