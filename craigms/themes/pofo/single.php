<?php include 'craigms/includes/database.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Template</title>
<link href="<?php echo $info['themeurl'] ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $info['themeurl'] ?>/css/slideshow.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Lato:100,400,900' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $info['themeurl'] ?>/js/slideshow.js"></script>
</head>

<body>

<div id="header-wrapper">

    <div id="header">
        <div id="logo">
                    Your Company
        </div>
		<div id="nav">
            <?php $id = '2'; include('craigms/includes/single-html.php'); ?>
        </div><!--- end nav --->
        <div id="social">
        	<span class="symbols">t</span>&nbsp; Twitter &nbsp; &nbsp;
            <span class="symbols">f</span>&nbsp; Facebook &nbsp; &nbsp;
            <span class="symbols">l</span>&nbsp; Linkedin &nbsp; &nbsp;
            <span class="symbols">g</span>&nbsp; Google+
        </div><!--- end social --->
    </div><!--- end header --->

</div><!--- end header wrapper --->

<div id="wrapper">



    <div id="content">
    
		<?php include "craigms/includes/single.php" ?>
    
    	
    </div><!--- end content --->
	
    <div class="clearfix"></div>
    
</div><!--- end wrapper --->

<div id="footer">
	<p>All Rights Reserved &copy Copyright 2012 Bert and Dip</p>
</div><!--- end footer --->

</body>
</html>