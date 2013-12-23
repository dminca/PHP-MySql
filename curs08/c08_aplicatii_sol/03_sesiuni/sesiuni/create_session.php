<?php

$t = session_start();
//var_dump($t);
if ($t) {
  echo 'Sesiunea a fost (re)pornita';
  echo '<br />';
  echo 'Nume sesiune: ' . session_name();
  echo '<br />';
  echo 'Id sesiune: ' . session_id();
  
  echo '<br />';
   
  // salvam date in aceasta sesiune
  $_SESSION["username"] = 'ion';
  $_SESSION["uid"] = 33;
 }
 
 
?>

<html>
	<head><title></title></head>
<body>
<br /><br />
<a href="view_session.php">Vezi date sesiune</a>
</body>
</html>