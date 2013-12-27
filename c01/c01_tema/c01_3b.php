<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html>
<head>
    <title>Ex 03 c01</title>
</head>
<body>

<!-- FORM START-->
<fieldset>
    <form method="get" action="">
        <input type="text" name="column"/> <br />
        <input type="text" name="cell"/><br />
        <input type="submit" name="btn" value="Click me..."/><br />
    </form>

<!-- SCRIPT START-->
<?php
include ('lib/inmultire.php');


if (isset($_GET['btn'])) {
    inmultire($_GET['cell'], $_GET['column']);
}
?>
</fieldset>
</body>
</html>
