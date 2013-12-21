<?php
ini_set('session.use_only_cookies', 1);
//ini_set('session.use_trans_sid',1);
session_name('mysession'); // numim sesiunea: mysession
session_set_cookie_params(5);//stabileste durata de viata a cookie-ului de sesiune la 5 secunde

$t = session_start();
setcookie(session_name(),session_id(),time()+5);//prelungeste durata de viata a cookie-ului
//de sesiune cu 5 secunde de la ultimul click 

if ($t) {
  echo 'Sesiunea a fost (re)pornita';
  echo '<br />';
  echo 'Nume sesiune: ' . session_name();
  echo '<br />';
  echo 'Id sesiune: ' . session_id();
  
  echo '<br />';
  print_r(session_get_cookie_params());
 
  // salvam date in aceasta sesiune
  $_SESSION["username"] = 'ion';
  $_SESSION["uid"] = 33;
 }
 
 
?>

<html>
	<head><title></title></head>
<body>
<br /><br />
<a href="pagina2.php">pagina2</a>
</body>
</html>