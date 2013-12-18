<?php
echo '<pre>'.var_export($_GET,true).'</pre>';
if(isset($_GET['color'])&&isset($_GET['bg'])){
	echo "<p style=\"color:{$_GET['color']};background-color:{$_GET['bg']}\">Ala bala portocala</p>";
}
?>