<?php 
/*
a) formular cu campurile username, password, submit; username, password campuri obligatorii 
b) daca s-a apasat butonul submit
1. preiau din formular username, password
2. daca ambele sunt completate
caut in baza de date utilizatorul cu username si password
daca am gasit, pornesc sesiunea, memorez in $_SESSION['uid'] id-ul utilizatorului, redirect catre welcome.php
altfel mesaj de eroare
*/
?>
<?php
require("includes/connection.php");


//html_start();  output-ul programului abia aici incepe. dupa session_start()...
?>

<html>
	<head><title></title></head>
<body>
<h3>Login</h3>
<br /><br />
<form method="post" action="login.php">
  Username: <input type="text" name="username" value="" /> <br />
  Password: <input type="password" name="password" value="" />
<br /><br />
<input type="submit" name="submit" value="Login" />
</form>


</body>
</html>