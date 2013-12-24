<?php
$imgs = array('img/browser1.jpg', 'img/browser2.jpg', 'img/browser3.jpg', 'img/browser4.jpg', 'img/browser5.jpg');

// start list
echo "<ul>";

for ($i=0; $i < count($imgs); $i++) { // in the list
	echo "<li>" . "<img src=\"$imgs[$i]\">" . "</li>";
}

// end list
echo "</ul>"; 

?>