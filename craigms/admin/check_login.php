<?php include '../includes/database.php'; ?>
<?php

$tbl_name="members"; // Table name 

// username and password sent from form 
$myusername=$_POST['myusername']; 
$password=$_POST['mypassword']; 
$mypassword=md5($password);

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);
$fetched = mysql_fetch_array($result);
$usertype = $fetched['usertype']; 

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
session_start();
$_SESSION['myusername'] = $myusername;
$_SESSION['mypassword'] = $mypassword;
$_SESSION['usertype'] = $usertype;
header("location:index.php");
}
else {
header("location:main_login.php");
}
?>