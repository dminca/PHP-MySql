<?php
include "includes/produse.php";
include "includes/functions.php";

//initializarea sesiunii

ini_set('session.use_only_cookies', 1);// se vor folosi numai cookie-uri pt transmiterea id-ului de sesiune

$zi=60*60*24;//nr secunde dintr-o zi
session_start();
setcookie(session_name(), session_id(), time() + 30*$zi, "/");  // prelungeste viata cookie-ului de la ultimul click

//$_SESSION['cos_id'] - array bidimensional care va contine id-urile produselor din cos
if (!isset($_SESSION['cos_id']))
{
   $_SESSION['cos_id'] = array();
 }

//$_SESSION['cos_cant'] - array bidimensional care va contine cantitatea pentru fiecare produs din cos;cheile vor fi id-urile produselor
if (!isset($_SESSION['cos_cant']))
{
  $_SESSION['cos_cant'] = array();
}

/* 
la fiecare click pe butonul Cumpara, memorez id-ul produsului 
in variabila superglobala $_SESSION['cos_id'] si numar exemplarele in $_SESSION['cos_cant'];
*/
if(isset($_POST['cumpara'])){//produsul nu exista in cos; il adaug
	$id=$_POST['id'];
	if(!in_array($id,$_SESSION['cos_id'])){
		$_SESSION['cos_id'][]=$id;
		$_SESSION['cos_cant'][$id]=1;
		}
	else{//produsul exista in cos; cresc cantitatea cu 1
		$_SESSION['cos_cant'][$id]++;
		}
	
}
print_r($_SESSION);//pt debug

/*
daca utilizatorul a ales sa vizualizeze cosul de cumparaturi (a dat click pe link
si s-a transmis prin get query stringul cos), afisez cosul de cumparaturi si intrerup scriptul curent - exit();
*/

if(isset($_GET['cos'])){
		include "cos_cumparaturi.php";
		exit();
	}
	
/*
daca utilizatorul a ales sa stearga cosul de cumparaturi, sterg sesiunea
si redirectez catre scriptul curent cu query stringul cos - afisarea cosului de cumparaturi
*/
if(isset($_GET['gol'])){
	unset($_SESSION['cos_id']);
	unset($_SESSION['cos_cant']);
	session_destroy();
	header('Location:?cos');
	exit();
	}

/*
utilizatorul a ales operatia de actualizare apasand butonul formularului transmis prin POST
*/
if(isset($_POST['actualizeaza'])){
		//preiau datele din $_POST
		$cos_id=	$_POST['id'];
		$cos_cant=$_POST['cantitate'];
		
		//actualizez $_SESSION['cos_cant'];
		$nr=count($cos_id);
		for($i=0;$i<$nr;$i++){
			$id=$cos_id[$i];
		 	$cant[$id]=$cos_cant[$i];
		}
		
		$_SESSION['cos_cant']=$cant;
		include "cos_cumparaturi.php";
		exit();
	}
	
/*
utilizatorul a ales sa stearga un produs din cosul de cumparaturi
*/
if(isset($_GET['sterge'])){
	$id=$_GET['id'];//id-ul produsului care se va sterge
	$cheie=array_search($id,$_SESSION['cos_id']);//caut cheia produsului
	unset($_SESSION['cos_id'][$cheie]);
	unset($_SESSION['cos_cant'][$id]);
	
	include "cos_cumparaturi.php";
	exit();
	
	}
//daca nu am nicio actiune, afisez catalogul de produse
include "catalog.php";

?>