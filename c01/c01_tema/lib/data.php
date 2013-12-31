<?php
/**
 * @author Andrei M.
 * @copyright 2013
 */

$zile=range(1,31);
$luni=array("Ianuarie", "Februarie", "Martie", "Aprilie", "Mai","Iunie","Iulie","August","Septembrie","Octombrie","Noiembrie","Decembrie");
/*
$luni=array();
for($i=1;$i<=12;$i++){
	$luni[]=date('F',mktime(0,0,0,$i));
	}
*/
$an_curent=date('Y');
$start_year=1980;
$ani=range($start_year,$an_curent);

function select($name,$array){
	$nr=count($array);
	//start select
	echo '<select name="'.$name.'">';

	//elemente option
	foreach($array as $key=>$value){
		$nr_crt=$key+1;
		echo '<option value="'.$nr_crt.'">'.$value.'</option>';
		}
	//end select
	echo "</select>";
}


//start form
echo '<form method="get" action="">';

//select
echo "<label>zi:</label>";
select('zi',$zile);
echo "<label>luna:</label>";
select('luna',$luni);
echo "<label>an:</label>";
select('an',$ani);

//buton submit
echo '<input type="submit" name="btnSubmit" value="Go" />';

//end form
echo '</form>';

//preiau date din formular
//print_r($_GET);

if(isset($_GET['btnSubmit'])) {
	if(checkdate($_GET['luna'], $_GET['zi'], $_GET['an'])){
		echo "<p>Data nasterii este: ".$zile[$_GET['zi']-1]." ".$luni[$_GET['luna']-1]." ".$ani[$_GET['an']-1]."</p>";
		}else{
			echo 'Data nu este valida!';			
		}
	
}

?>