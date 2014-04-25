<?php include("includes/database.php"); ?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="admin/css/responsive.css" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"/>
</head>

<div id="login">

    <form method="post" name="config_form">
        <div id="field">
			<b>Database Details</b><br /><br />
			Welcome to the initial setup of CraigMS. We just have a few quick questions, and you can then login.<br /><br />
            <label>Host</label> <input type="text" name="host"><br />
			<label>DB Name</label> <input type="text" name="dbname"><br />
			<label>DB User</label> <input type="text" name="dbuser"><br />
			<label>DB User Password</label> <input type="text" name="password"><br />
        </div>
        <br />
		
		<div id="field">
			<b>Website Details</b><br /><br />
			<label>Website URL <small>(including http:// and no trailing / please)</small></label> <input type="text" name="weburl"><br />
            <label>Admin name</label> <input type="text" name="adminuser"><br />
			<label>Admin password</label> <input type="text" name="adminpass"><br /><br />
        </div>		
		
		<input name="Submit" type="submit" value="Install CraigMS" />
</form>

</div>

<?php
$host = $_POST["host"];
$dbuser = $_POST["dbuser"];
$password = $_POST["password"];
$dbname = $_POST["dbname"];

$weburl = $_POST["weburl"];
$adminname = $_POST["adminuser"];
$adminpassword = $_POST["adminpass"];
$encrypt_password=md5($adminpassword); 

if ($host != '' && $dbuser != '' && $password != '' && $dbname != '') {

 // Connects to your Database 
	mysql_connect($host, $dbuser, $password) or die(mysql_error()); 
	mysql_select_db($dbname) or die(mysql_error()); 
	mysql_query("CREATE TABLE content( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, logo TINYTEXT, theme TINYTEXT, url MEDIUMTEXT, themeurl MEDIUMTEXT)"); 
	
	mysql_query("CREATE TABLE groups ( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, groupname TINYTEXT NOT NULL, slug TINYTEXT NOT NULL, active INT(10) NOT NULL)"); 
	
	mysql_query("CREATE TABLE pages ( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, pagename TINYTEXT NOT NULL, slug TINYTEXT NOT NULL, template TINYTEXT NOT NULL, active INT(10) NOT NULL)"); 	
		
	mysql_query("CREATE TABLE images( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, imageurl MEDIUMTEXT NOT NULL, page TINYTEXT NOT NULL,  active INT(10) NOT NULL, name TINYTEXT NOT NULL)"); 
	
	mysql_query("CREATE TABLE textimage( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, imageurl MEDIUMTEXT NOT NULL, name TINYTEXT NOT NULL, groupname TINYTEXT NOT NULL, text LONGTEXT NOT NULL, active INT(10) NOT NULL)"); 	
			
	mysql_query("CREATE TABLE members ( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, username TINYTEXT NOT NULL, password TINYTEXT NOT NULL, usertype INT(10) NOT NULL)"); 
				
	mysql_query("CREATE TABLE text ( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, page TINYTEXT NOT NULL, text LONGTEXT NOT NULL, name TINYTEXT NOT NULL, active INT(10) NOT NULL)"); 
    
    		
	mysql_query("CREATE TABLE html ( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, page TINYTEXT NOT NULL, text LONGTEXT NOT NULL, name TINYTEXT NOT NULL, active INT(10) NOT NULL)"); 
	
	mysql_query("INSERT INTO members SET username='$adminname', usertype='1', password='$encrypt_password' ") ;  
	
	mysql_query("INSERT INTO content SET logo='images/logo.png', theme='basic', url='$weburl' ") ; 
	

	$f = fopen('includes/database.php', 'w') or die("can't open file");
    fwrite($f, '<?php  mysql_connect("'.$host.'", "'.$dbuser.'", "'.$password.'") ; 
	mysql_select_db("'.$dbname.'") ; 
	
	$data = mysql_query("SELECT * FROM content WHERE id=1 ") 
	or die(mysql_error()); 
	$info = mysql_fetch_array( $data )	
	
	?>');
    fclose($f);
	
	$myFile = "main.php";
	unlink($myFile);
	
	
	$f = fopen('../.htaccess', 'w') or die("can't open file");
    fwrite($f, 'RewriteEngine On
	RewriteCond %{HTTP_HOST} ^'.$weburl.'/index.php
	RewriteRule (.*) '.$weburl.'/$1 [R=301,L]

RewriteEngine On

RewriteRule ^([a-zA-Z0-9_-]+)$ page.php?page=$1
RewriteRule ^([a-zA-Z0-9_-]+)/$ page.php?page=$1

RewriteRule ^group/([a-zA-Z0-9_-]+)$ group.php?group=$1
RewriteRule ^group/([a-zA-Z0-9_-]+)/$ group.php?group=$1

RewriteRule ^group/([a-zA-Z0-9_-]+)/([0-9]+)$ single.php?group=$1&id=$2
RewriteRule ^group/([a-zA-Z0-9_-]+)/([0-9]+)/$ single.php?group=$1&id=$2');

    fclose($f);

	
    $url = 'admin/index.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">'; 

}
else {

}
?>