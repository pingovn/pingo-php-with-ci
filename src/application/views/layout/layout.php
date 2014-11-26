<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Page</title>
<link rel="stylesheet" type="text/css" href="/themes/phatnguyen/theme3/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="/themes/phatnguyen/theme3/css/pingo.css" media="screen" />
</head>

<body>
<div id="main_container">
<?php include("header.php"); ?>
<?php include("menu.php"); ?>
    
<div class="left_content">    
    <?php include("$mainContent"); ?>
</div>

<div class="right_content">
<!--    --><?php //include("$rightContent"); ?>
    <?php include("right_content.php"); ?>
</div>

<?php include("footer.php"); ?>
</div>
</body>
</html>
