<?php

$t = session_start();//repornesc sesiunea
if ($t) {
	unset($_SESSION);
	session_destroy(); 
	unset($_COOKIE[session_name()]);
  	echo 'Sesiunea a fost stearsa';
  	echo '<br />';
  	echo 'Nume sesiune: ' . session_name();
  	echo '<br />';
  	echo 'Id sesiune: ' . session_id();
  	echo '<br /><br />';
  
 }
   
?>
<br /><br />
<a href="create_session.php">Creaza sesiune </a>
<br />
<a href="view_session.php">Vezi sesiune </a>
