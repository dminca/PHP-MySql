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
verificati existenta cookie-ului si in browser - in Firefox (Windows, versiunea 1.9): Tools --> Page Info --> Security --> View Cookies

-->
<head>
<title></title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" >
</head>
<body>
<?php

//parametri cookie: $name, $value, $expire; $expire=time()+nr secunde pana in momentul expirarii

//setez cookie folosind functia setcookie($name,$value,$expire);

//var_dump($cookie);

//daca $_COOKIE[$name] este setat, afisez superglobalul $_COOKIE; 

?>
<p>
	Click <a href="sterge_cookie.php">aici </a> pentru a sterge cookie-ul!
</p>
</body>
</html>