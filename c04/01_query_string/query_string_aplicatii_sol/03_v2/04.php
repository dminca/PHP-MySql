<?php
require_once "functions.php";
$carti=array(
					array('titlu'=>'Mara', 'autor'=>'Ioan Slavici', 'exemplare'=>4, 'an'=>2003),
					array('titlu'=>'Ion', 'autor'=>'Liviu Rebreanu', 'exemplare'=>5, 'an'=>2006),
					array('titlu'=>'Morometii', 'autor'=>'Marin Preda', 'exemplare'=>10, 'an'=>1987),
					array('titlu'=>'Povesti', 'autor'=>'Ion Creanga', 'exemplare'=>3, 'an'=>2003),
					array('titlu'=>'Poezii', 'autor'=>'Mihai Eminescu', 'exemplare'=>45, 'an'=>1990),
					array('titlu'=>'Hronicul si cantecul varstelor', 'autor'=>'Lucian Blaga', 'exemplare'=>4, 'an'=>2003),
			
			);

asort($carti);

//daca trimit id prin GET, afisez cartea cu id-ul respectiv; altfel afisez toate cartile
$scr=$_SERVER['PHP_SELF'];//scriptul curent
if(isset($_GET['id'])){//detalii carte
	$id=$_GET['id'];
	echo table($carti,'all',$id,'Detalii carte');
	//adaug link-ul Back
	$href="<a href=\"{$scr}\">Back</a>";
	echo $href;
	}else{
		//adaug coloana detalii
		foreach($carti as $id=>&$carte){
			$carte['detalii']="<a href=\"{$scr}?id={$id}\">Detalii</a>";
			}
		$keys=array('titlu','autor','detalii');
		echo table($carti,$keys,NULL,'Toate cartile');
		}

?>