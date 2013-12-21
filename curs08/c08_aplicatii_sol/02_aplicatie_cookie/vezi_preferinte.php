<html>
<!--
II.Creati scriptul vezi_preferinte.php in care:
1.veti crea codul CSS pentru a aplica preferintele utilizatorului
daca scriptul poate accesa un cookie cu numele bg_color (isset($_COOKIE['bg_color'])), va tipari valoarea cookie-ului respectiv ca valoare pentru proprietatea background-color. Daca nu exista un astfel de cookie, PHP va tipari o culoare prestabilita (alb, reprezentata prin #ffffff)
daca scriptul poate accesa un cookie cu numele font_color (isset($_COOKIE['font_color'])), va tipari valoarea cookie-ului respectiv ca valoare pentru proprietatea color. Daca nu exista un astfel de cookie, PHP va tipari o culoare prestabilita (negru, reprezentata prin #000000)
2.veti crea un link catre seteaza_preferinte.php (de asemenea, din eteaza_preferinte.php veti avea un link catre vezi_preferinte.php)
3.incarcati scriptul pe server si verificati functionalitatea
-->
<head>
<title></title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" >
<style type="text/css">
	body{
		<?php
		if(isset($_COOKIE['bg_color'])){
			echo "background-color:{$_COOKIE['bg_color']};";
			}else{
				echo "background-color:#ffffff;";
				}
			
		if(isset($_COOKIE['font_color'])){
			echo "color:{$_COOKIE['font_color']};";
			}else{
				echo "color:#000000;";
				}
		?>
		}
</style>
</head>
<body>
<p>
<a href="seteaza_preferinte.php">Alege tema de culori</a>
</p>
<p>
<a href="reset_preferinte.php">Reseteaza tema de culori</a>
</p>
<p>
 aaaaaa aaaaaa aaaaaa aaaaaa aaaaaa aaaaaa aaaaaa
 aaaaaa aaaaaa aaaaaa aaaaaa aaaaaa aaaaaa aaaaaa
 aaaaaa aaaaaa aaaaaa aaaaaa aaaaaa aaaaaa aaaaaa
 aaaaaa aaaaaa aaaaaa aaaaaa aaaaaa aaaaaa aaaaaa
 aaaaaa aaaaaa aaaaaa aaaaaa aaaaaa aaaaaa aaaaaa
</p>
</body>
</html>