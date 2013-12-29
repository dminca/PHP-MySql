<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2//EN">
<html>
<head>
    <title>Ex 03 c01</title>
</head>
<body>

<!-- FORM START-->
<?php
include ('lib/inmultire.php');

// if form not yet submitted
// display form
if (!isset($_GET['btn'])) {        
    echo "<h3>Introduceti nr de <i>coloane</i> si nr de <i>celule</i>.</h3>";
?>
<fieldset>
    <form method="get" action="">
        <label>Nr. Coloane:</label><input type="text" name="column"/> <br />
        <label>Nr. Celule:</label><input type="text" name="cell"/><br />
        <input type="submit" name="btn" value="Click me..."/><br />
    </form>
</fieldset>

<!-- SCRIPT START-->
<?php
// if form submitted
// process form input    
} else {
    // retrieve data from form
    $cells = $_GET['cell'];
    $columns = $_GET['column'];
    
    echo "Ati ales ".$cells." celule, si ".$columns." coloane. <br/>";    
    // store the cmmdc between cells and columns
    cmmdc($cells,$columns);
    
    // generate the table based on the cmmdc
    //tabel($cells, $d);
}
?>

</body>
</html>
