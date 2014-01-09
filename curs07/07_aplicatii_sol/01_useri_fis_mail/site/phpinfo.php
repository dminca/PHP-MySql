<?php # Informatii PHP
$page_title = 'Informatii PHP';
include ('lib/header.html');
?>
<h1>Informatii PHP</h1>

<?php
# phpinfo() trimite catre browser un intreg HTML; folosesc output buffering pentru a capta informatia si a extrage numai cat este necesar
 
 ob_start(); // ce se va transmite catre browser, va fi memorat in buffer
 phpinfo();	// rezultatul apelului fc, care in mod normal ar fi fost trimis in browser, va fi memorat in buffer
 $pinfo = ob_get_contents(); // memorez in variabila continutul din buffer
 ob_end_clean(); // eliberez buffer si il setez pe Off
 
 # inlocuiesc continutul lui $pinfo cu ceea se afla intre <body>..</body>; css, header, footer le am din tamplate
 $pinfo = preg_replace( '%^.*<body>(.*)</body>.*$%ms','$1',$pinfo); // % - caracter delimitator pt regex; ms - permite ca "." sa fie interpretat ca orice caracter, inclusiv ^, $, newline; $1 - prima subexpresie
 echo $pinfo;
?>

<?php
include ('lib/footer.html');
?>