<!DOCTYPE HTML>
<head>
	<title>c2-1d</title>
</head>
<body>
	<?php
	$a = array(range(1,20));

	$spoof=implode(",", $a[0]);
	echo $spoof;

	print_r($spoof);
	?>
</body>
</html>