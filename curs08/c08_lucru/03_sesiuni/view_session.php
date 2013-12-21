<?php
$t = session_start();
if($t){
	echo "Nume sesiune". session_name().", id sesiune:". session_id();
} else {
	echo "Sesiunea nu este pornita";
}

echo "<a href=\"create_session.php\">Creeaza sesiune</a>";
?>