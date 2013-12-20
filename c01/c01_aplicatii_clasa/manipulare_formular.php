<!DOCTYPE HTML>
<html lang="en-US">
 <head> 
 	<title> </title> 
 </head>
 <body>
<?php
#preluarea si prelucrarea datelor din formular
//print_r($_GET); //pt debug
$nume = $_GET['nume'];
$prenume = $_GET['prenume'];
$email= $_GET['email'];
$comentariu=$_GET['comentariu'];

echo "<p>Multumesc <strong>$nume $prenume</strong> pentru mesaju <em>$comentariu</em>.</p>
<p>Iti vom raspunde la <strong>$email</strong>";
?>

 </body>
</html>