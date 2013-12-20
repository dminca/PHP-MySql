<?php
include "connect.php";

$sql = "INSERT INTO users( nume, prenume, email, user, parola )
VALUES ('Cucu', 'Stefan', 'cstefan1@yahoo.com', 'cstefan1', md5( '123' )
)";
//echo $sql;
$result= mysqli_query($link,$sql);
//var_dump($result); 
if(!$result){
	echo "Eroare la INSERT: ". mysqli_error($link);	
	}elseif( mysqli_affected_rows($link) >0) {
		echo "INSERT ok";	
		}else{
			echo "Nu s-au inserat inregistrari. ". mysqli_error($link) ;			
			}

?>