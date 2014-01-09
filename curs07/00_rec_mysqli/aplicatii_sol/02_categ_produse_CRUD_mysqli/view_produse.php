
<?php
	require "includes/connection.php";
	require_once "includes/table_functions .php";

	$query='SELECT c.denumire AS categorie,p.id ,p.denumire AS produs,p.pret, p.cantitate,p.um FROM produse p INNER JOIN categorii c ON p.idCategorie=c.id';//selectez datele
	echo $query;	
	$result=mysqli_query($connection,$query);
	
	if(mysqli_num_rows($result)==0){
		die ("Nu sunt date!<br />");
		}
	
	echo table_start();
	$d=mysqli_fetch_assoc($result);//prima inregistrare
	
	//adaug prin reuniune coloanele Edit si Delete
	$d=$d+array('Edit'=>'<a href="create_produs.php?id='.$d['id'].'">Edit</a>',
					'Delete'=>'<a href="delete_produs.php?id='.$d['id'].'">Delete</a>');
	
	echo table_header($d);
	
	//date tabel
	do{
		//adaug prin reuniune coloanele Edit si Delete
		$d=$d+array('Edit'=>'<a href="create_produs.php?id='.$d['id'].'">Edit</a>',
						'Delete'=>'<a href="delete_produs.php?id='.$d['id'].'">Delete</a>');
		echo table_row($d);
		
	}while($d=mysqli_fetch_assoc($result));

	
	echo table_end();	
	
	//link catre scriptul de adaugare
	echo '<a href="create_produs.php">Add produs</a><br />';
	mysqli_close($connection);//inchid conexiunea cu baza de date	
?>