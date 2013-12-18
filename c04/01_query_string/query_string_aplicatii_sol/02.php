<?php
$carte=array('titlu'=>'Mara', 'autor'=>'Ioan Slavici', 'exemplare'=>4, 'an'=>2003);
// $carte=['titlu'=>'Mara', 'autor'=>'Ioan Slavici', 'exemplare'=>4, 'an'=>2003]; - varianta PHP5.4
//echo '<pre>'.var_export($carte,true).'</pre>';//pt debug
$sc=$_SERVER['PHP_SELF'];//scriptul curent

if(!isset($_GET['det']) || $_GET['det']!=1) {
	echo "Titlu: {$carte['titlu']} ";
	$href="<a href=\"{$sc}?det=1\">Detalii</a>";
	echo $href;
	}else{
		echo '<pre>'.var_export($carte,true).'</pre>';
		$href="<a href=\"{$sc}\">Back</a>";
		echo $href;
		}
?>