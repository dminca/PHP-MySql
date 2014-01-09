<?php
include "config.php";
include "clase.php";
$db=new QueryDb(db_host,db_user,db_password,db_name);
//$link=$db->dbConnect();
$sql="SELECT * FROM cursanti";
$cursanti=$db->query($sql);

echo '<ol> <b>Lista cursantilor:</b>';
if($cursanti){
	//afisez cursantii
	foreach($cursanti as $cursant){
		echo '<li>'.$cursant['prenume'].' '.$cursant['nume'].'</li>';
		}
	echo '</ol>';
	}else {
		echo 'Eroare la SELECT';
		}

//afisez statistica pe nivel de studii
$sql="SELECT studii, count(*) AS NR FROM cursanti GROUP BY studii";
$statistica=$db->query($sql);
echo '<ul><b>Statistica pe nivel de studii:</b>';
if($statistica){
	foreach($statistica as $k=>$stat)
		echo '<li>'.$stat['studii'].':'.$stat['NR'].'</li>';
	echo '</ul>';
	}else {
		echo 'Eroare la SELECT';
		}
	
?>