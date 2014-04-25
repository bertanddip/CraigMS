<?php include 'craigms/includes/database.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Basic</title>
<link href="<?php echo $info['themeurl'] ?>/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="wrapper">

	
	<a href="http://webindexsearch.com/demo/">Home</a> - <a href="http://webindexsearch.com/demo/group/blog">Blog</a><br /><br />
	<h1>*** Home Page ***</h1>
	<p>This is the homepage.</p>
	
	<?php $_GET['id'] = '3'; include('craigms/includes/single.php'); ?>



</div>

</body>
</html>