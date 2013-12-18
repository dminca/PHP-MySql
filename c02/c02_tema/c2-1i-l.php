<!DOCTYPE HTML>
<head>
	<title>c2-1i,j,k,l</title>
</head>
<body>
<?php
   $a = array(range(1,20));

   sort($a);
   print_r($a);

echo "<br/>";

   rsort($a[0]);
   print_r($a);

echo "<br/>";

   ksort($a[0]);
   print_r($a);

echo "<br/>";

	krsort($a[0]);
	print_r($a);
?>
</body>
</html>