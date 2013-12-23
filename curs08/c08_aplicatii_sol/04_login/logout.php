<?php
session_start();//nu se poate sterge sesiunea pana cand aceasta nu e activata
unset($_SESSION);//sterge variabila sesiunii
session_destroy();//elimina din server fisierele propriuzise ale sesiunii
header("Location:welcome.php");
?>