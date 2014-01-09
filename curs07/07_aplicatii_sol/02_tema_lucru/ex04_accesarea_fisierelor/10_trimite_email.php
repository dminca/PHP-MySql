<?php
$to="dmatei@yahoo.com, imihau@gmail.com";
$subject="La multi ani!";
$from="ionut popa <ionut.popa@yahoo.com>";
$body=<<<TEXT
Salutare tuturor,

Sa aveti un an nou cu sanatate!
La multi ani!

Ionut Popa
TEXT;
if(mail($to,$subject,$body,"From:$from")){
	echo "Mesaj trimis cu succes!";
}else{
	echo "Mesajul nu poate fi transmis!";
	}
?>