<?php
ob_start();
?>
<html>
<!--
I.Creati scriptul creeaza_cookie.php in care
veti crea un cookie cu urmatorii parametrii: $name='user'; $value='ion'; $expire=time()+24*60*60;//expira peste o zi. 
veti folosi functia setcookie($name, $value, $expire)
$name - numele cookie-ului; devine ulterior cheie a superglobalului $_COOKIE 
$value - informatia pastrata de cookie; valoarea cookie-ului 
$expire - momentul de expirare al cookie-ului, exprimat in Unix Timestamp (nr de secunde de la 1 Ianuarie 1970). Adaugam numarul de secunde peste care vrem sa expire cookie-ul la rezultatul functiei time() (nr de secunde pana in prezent). Daca nu specificam acest parametru, si implicit el va fi 0, cookie-ul expira la inchiderea browser-ului.
daca a fost creat cookie-ul, afisati informatia acestuia
informatiile din cookie sunt disponibile in array-ul asociativ $_COOKIE , variabila de tip superglobal.
verificati existenta cookie-ului si in browser - in Firefox (Windows, versiunea 1.9): Tools -> Page Info -> Security -> View Cookies
-->
<head>
<title></title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" >
</head>
<body>
<?php

$day=24*60*60;

$name='user';
$value='ion';
$expire=time()+$day;//expira peste o zi
$cookie=setcookie($name,$value,$expire,'','','','');
//var_dump($cookie);
if(isset($_COOKIE['user'])){
	echo '<pre>'. var_export($_COOKIE,true). '</pre>';
	echo '<br />Cookie-ul a fost creat si expira la '. date("d-m-Y H:i:s ",$expire).'!';
	}elseif($cookie){
		echo 'Cookie-ul nu a fost inca transmis catre server! Refresh!';
		}else{
			echo 'Cookie-ul nu a fost creat!';
			}
?>
<p>
	Click <a href="sterge_cookie.php">aici </a> pentru a sterge cookie-ul!
</p>
</body>
</html>

<?php
ob_end_flush();
?>