<!--
Creati scriptul 04_ex02.php in care:
a)veti crea o functie initArray() cu parametrul $carti care va initializa array-ul $carti cu urmatoarele valori:
$carti=array(
	array('titlu'=>'Mara', 'autor'=>'Ioan Slavici', 'exemplare'=>4, 'an'=>2003),
	array('titlu'=>'Ion', 'autor'=>'Liviu Rebreanu', 'exemplare'=>5, 'an'=>2006),
	array('titlu'=>'Morometii', 'autor'=>'Marin Preda', 'exemplare'=>10, 'an'=>1987),
	array('titlu'=>'Povesti', 'autor'=>'Ion Creanga', 'exemplare'=>3, 'an'=>2003),
	array('titlu'=>'Poezii', 'autor'=>'Mihai Eminescu', 'exemplare'=>45, 'an'=>1990),
	array('titlu'=>'Hronicul si cantecul varstelor', 'autor'=>'Lucian Blaga', 'exemplare'=>4, 'an'=>2003),
			
);
b)veti crea functia afisareCarti() cu parametrul $carti care va afisa sub forma de tabel titlul si autorul fiecarei carti din $carti.
c)veti crea functia afisareCarte cu parametrii array-ul $carti si numarul $id care va afisa sub forma de tabel toate datele cartii cu cheia $id.
d)Apelati functiile de mai sus astfel incat:
Daca se incarca fisierul 04_ex02.php prima data (fara parametru in get), se afiseaza toate cartile. 
Daca se incarca fisierul 04_ex02.php cu parametru id in get, se afiseaza datele cartii cu cheia $id. 
e)Modificati functia afisareCarti() astfel incat tabelul sa contina coloana Detalii. In momentul cand dati click pe Detalii in dreptul unei carti, se incarca fisierul .php cu parametrul id respectiv transmis prin url (se va afisa numai cartea selectata). 
f)Modificati functia afisareCartei() astfel incat tabelul sa contina coloana Back. In momentul cand dati click pe Back , se incarca fisierul .php fara niciun parametru in get (se vor afisa toate cartile). 
-->
<html>

<head>
	<title></title>
</head>
	<body>
	<?php
		
	function initCarti(&$carti){
			$carti=array(
					array('titlu'=>'Mara', 'autor'=>'Ioan Slavici', 'exemplare'=>4, 'an'=>2003),
					array('titlu'=>'Ion', 'autor'=>'Liviu Rebreanu', 'exemplare'=>5, 'an'=>2006),
					array('titlu'=>'Morometii', 'autor'=>'Marin Preda', 'exemplare'=>10, 'an'=>1987),
					array('titlu'=>'Povesti', 'autor'=>'Ion Creanga', 'exemplare'=>3, 'an'=>2003),
					array('titlu'=>'Poezii', 'autor'=>'Mihai Eminescu', 'exemplare'=>45, 'an'=>1990),
					array('titlu'=>'Hronicul si cantecul varstelor', 'autor'=>'Lucian Blaga', 'exemplare'=>4, 'an'=>2003),
			
			);
			}//end function initCarti
		
	function afisareCarti($carti){
					
				$s='<table border="1">';
				//antet tabel
				$s.='<tr>';
					$s.='<th>Titlu</th>';
					$s.='<th>Autor</th>';
					$s.='<th>Detalii</th>';
					
				$s.='</tr>';
				//date tabel
				foreach($carti as $id=>$carte){//$carte va fi un array
					$s.='<tr>';
						$s.='<td>'.$carte['titlu'].'</td>';
						$s.='<td>'.$carte['autor'].'</td>';
						$link='<a href="carti.php?id='.$id.'">Detalii</a>';
						$s.='<td>'.$link.'</td>';	
					$s.='</tr>';
					}//end foreach
					
				//end tabel
				$s.='</table>';
				echo $s;
			}//end function afisareCarti
			
			function afisareCarte($carti,$id){
				$coloane=array_keys($carti[0]);//$chei_carte contine cheile unui element din $carti
				if(array_key_exists($id,$carti)){				
					$s='<table border="1">';
					//antet tabel
					$s.='<tr>';
						foreach($coloane as $val){
							$s.='<th>'.$val.'</th>';
						}
					$s.='</tr>';
					
					//date tabel	
					$s.='<tr>';
						foreach($carti[$id] as $valoare){
							$s.='<td>'.$valoare.'</td>';//pt o carte, $valoare va fi pe rand $titlu, $autor, $exemplare, $an
							
							}//end foreach
					$s.='</tr>';
						
					//end tabel
					$s.='</table>';
					$link='<a href="carti.php">Back</a>';
					$s.=$link;
					echo $s;	
				}else{
					echo "$id este un id incorect!";
					$link='<a href="carti.php">Back</a>';
					echo $link;
					}
				
			}//end function afisareCarti
			
		//scriptul principal
		initCarti($carti);
		
		//daca trimit id prin GET, afisez cartea cu id-ul respectiv; altfel afisez toate cartile
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			afisareCarte($carti,$id);
			}else{afisareCarti($carti);
				}
		
	?>
	</body>
</html>