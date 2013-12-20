<!DOCTYPE HTML>
<head>
	<title></title>
</head>
<body>
<?php
$a = array("user1", "user10", "user2", "user20");

// cu sort
sort($a);
print_r($a);

echo "<br/>";
//cu asort
asort($a);
print_r($a);

echo "<br/>";
//cu natsort
natsort($a);
print_r($a);
?>

</body>
</html>