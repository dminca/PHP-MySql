<html>
<!--
Creati scriptul reset_preferinte.php care va sterge cookie-urile expediate si va afisa un mesaj corespunzator cu un link catre vezi_preferinte.php care va afisa din nou culorile prestabilite.
Un cookie se sterge folosind aceeasi parametri ca la setare, insa cu o data de expirare in trecut. E de preferat ca data de expirare sa fie mult in trecut, pentru ca posibil ca timpul de pe server sa fie diferit de timpul de pe client. In plus, valoarea ei poate fi setata ca sirul gol "" sau valoarea booleana FALSE. 
Ex: $day=24*60*60; setcookie('bg_color','',time()-30*$day);

-->
<head>
<title></title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" >
</head>
<body>
<?php
/*
Un cookie se sterge folosind aceiasi parametri ca la setare, insa cu o data de expirare in trecut. 
E de preferat ca data de expirare sa fie mult in trecut, pentru ca posibil ca timpul de pe server 
a fie diferit de timpul de pe client. In plus, valoarea ei poate fi setata ca sirul gol "" 
sau valoarea booleana FALSE. 
*/

//sterg cookie bg_color

//sterg cookie font_color

echo 'Cookie-urile au fost sterse. Click <a href="vezi_preferinte.php"> aici </a> pentru a reveni la pagina principala';
?>

</body>
</html>