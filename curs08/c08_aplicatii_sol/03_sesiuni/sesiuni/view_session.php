<?php

$t = session_start();//repornesc sesiunea
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
<a href="delete_session.php">Sterge sesiune </a>
</body>
</html>