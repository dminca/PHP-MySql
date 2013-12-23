<?php
session_name('sesiune_test');
session_start();
// stergere sesiune

if(isset($_SESSION)){
	// sterg cookie-ul de sesiune
	setcookie(session_name(),session_id(), time()-60*60*24);
	// sterg $_SESSION
	unset($_SESSION);
	// sterg fisierul de pe server
	session_destroy();
}

echo "<a href=\"view_session.php\">Vezi sesiune</a>";

?>