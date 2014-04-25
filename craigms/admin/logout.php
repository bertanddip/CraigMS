<?php 
session_start();
session_destroy();
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/responsive.css" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
<script src="js/tinymce/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea, input [type=text]'});
</script>
</head>


<body>

<div id="login">


<form name="form1" method="post" action="check_login.php">

	You have successfully logged out. You can login again below.<br /><br />
	
	<strong>Member Login </strong><br /><br />

	<label><b>Username</b></label> <input name="myusername" type="text" id="myusername"><br />

	<label><b>Password</b></label> <input name="mypassword" type="password" id="mypassword"><br />

	<input type="submit" name="Submit" value="Login">

</form>


</div><!--- end wrapper --->

</body>
</html>