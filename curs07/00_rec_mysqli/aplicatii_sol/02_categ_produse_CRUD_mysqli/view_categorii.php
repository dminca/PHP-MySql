
<?php
	require "includes/connection.php";
	require_once "includes/table_functions .php";

	$query='SELECT * FROM categorii';//selectez datele
	$result=mysqli_query($connection,$query);
	
	if(mysqli_num_rows($result)==0){
		die ("Nu sunt date!<br />");
		}
	
	echo table_start();
	$d=mysqli_fetch_assoc($result);//prima inregistrare
	
	//adaug prin reuniune coloanele Edit si Delete
	$d=$d+array('Edit'=>'<a href="create_categorie.php?id='.$d['id'].'">Edit</a>',
					'Delete'=>'<a href="delete_categorie.php?id='.$d['id'].'">Delete</a>',
					'Add produs'=>'<a href="create_produs.php?idCategorie='.$d['id'].'">Add produs</a>',
					);
	
	echo table_header($d);
	
	//date tabel
	do{
		//adaug prin reuniune coloanele Edit si Delete
		$d=$d+array('Edit'=>'<a href="create_categorie.php?id='.$d['id'].'">Edit</a>',
						'Delete'=>'<a href="delete_categorie.php?id='.$d['id'].'">Delete</a>',
						'Add produs'=>'<a href="create_produs.php?idCategorie='.$d['id'].'">Add produs</a>',);
		echo table_row($d);
		
	}while($d=mysqli_fetch_assoc($result));

	
	echo table_end();	
	
	//link catre scriptul de adaugare
	echo '<a href="create_categorie.php">Add categorie</a><br />';
	mysqli_close($connection);//inchid conexiunea cu baza de date	
?>