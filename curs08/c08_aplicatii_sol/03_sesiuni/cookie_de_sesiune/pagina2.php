<?php
ini_set('session.use_only_cookies', 1);

session_name('mysession'); // numim sesiunea: mysession
session_set_cookie_params(5);

$t = session_start();
setcookie(session_name(),session_id(),time()+5);//prelungeste durata de viata a cookie-ului
//de sesiune cu 5 secunde de la ultimul click 

if ($t) {
  echo 'Sesiunea a fost (re)pornita';
  echo '<br />';
  echo 'Nume sesiune: ' . session_name();
  echo '<br />';
  echo 'Id sesiune: ' . session_id();
  echo '<br /><br />';
  print_r($_SESSION);
 }
 
 
 
 
?>
<html>
	<head><title></title></head>
<body>
<br /><br />
	<a href="pagina1.php">pagina1 </a>
</body>
</html>