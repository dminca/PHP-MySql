<?php require_once("includes/session.php"); ?>
<?php
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>My Comp</title>
	<link href="stylesheets/public.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
<?php if (logged_in()) {//daca s-a facut login, link pt logout; altfel link pt login ?>
		<a href="logout.php" class="login">Logout</a>
	<?php	}else {	?>
	<a href="login.php" class="login">Login</a>
	<?php	}?>
	<div id="header">
		<h1>My Comp</h1>
	</div>
	
	<div id="main">
