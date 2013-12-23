<?php
ob_start();
?>

<html>
<!--
I.Creati scriptul sterge_cookie.php in care veti sterge cookie-ul creat anterior in creeaza_cookie.php.
Nota: Un cookie se sterge folosind aceeasi parametri ca la setare, insa cu o data de expirare in trecut. E de preferat ca data de expirare sa fie mult in trecut, pentru ca posibil ca timpul de pe server sa fie diferit de timpul de pe client
II.Creati cate un link care sa lege cele doua scripturi
-->
<head>
<title></title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" >
</head>
<body>
<?php

$day=24*60*60;//nr secunde pentru o zi
$name='user';
$value='ion';
$expire=time()-30*$day;//acum 30 de zile


if(isset($_COOKIE[$name])){
	setcookie($name,$value,time()-24*60*60*100);
	//print_r($_COOKIE);
	unset($_COOKIE);
	
	echo '<br />Cookie-ul a fost sters!';
	}else{
		echo '<br />Cookie-ul nu exista!';
		}

?>
<p>
	Click <a href="creeaza_cookie.php">aici </a> pentru a crea cookie-ul!
</p>
</body>
</html>

<?php
ob_end_flush();
?>