<?php # mysqli_connect.php

// Acest fisier contine datele care permit accesul la baza de date, 
// stabileste conexiunea cu MySQL, 
// selecteaza baza de date

// Setarea datelor de acces
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_NAME', 'myusers');

// Stabilirea conexiunii
# se va folosi functia mysqli_connect()
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
var_dump($link);
# pentru erori, se va folosi functia mysqli_connect_error()
# operatorul @ face sa nu se mai afiseze in browser eroarea PHP in caz ca nu reuseste conexiunea; este de preferat asa pt ca OR die() intrerupe scriptul si afiseaza intr-un mod personalizat mesajul de eroare
?>