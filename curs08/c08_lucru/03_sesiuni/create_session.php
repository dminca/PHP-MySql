<?php
$t = session_start('sesiune_test');
var_dump($t);

if ($t) {
	$nume = session_name();
	$id = session_id();
	echo "<p>Este activa sesiunea cu numele $nume si id-ul $id </p>";
	$_SESSION['nume'] = 'ion'; $_SESSION['varsta'] = 30;
}

echo "<a href=\"view_session.php\">Vezi date sesiune</a><br/>
<a href=\"delete_session.php\">Sterge sesiune</a>";
?>