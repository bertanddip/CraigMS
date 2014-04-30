<?php include 'craigms/includes/database.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CraigMS - PHP simple CMS by Craig Martindale</title>
<link href="<?php echo $info['themeurl'] ?>/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="wrapper">

<?php $_GET['id'] = '1'; include('craigms/includes/single-html.php'); ?>

<div id="logo"></div>


<div id="content">
    
    <?php include "craigms/includes/single.php" ?>
    
<p>&copy; Copyright Craig Martindale.</p> 

</div>
</div><!--- end wrapper --->


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-10550339-5', 'webindexsearch.com');
  ga('send', 'pageview');

</script>




</body>
</html>