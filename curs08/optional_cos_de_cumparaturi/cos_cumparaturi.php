<?php
include "includes/produse.php";
$cos=$_SESSION['cos_id'];
$cantitate=$_SESSION['cos_cant'];
//$cos contine id-ul produselor; $cantitate[$id]- cantitatea din produsul $id
global $produse;
echo '<h1>Cosul dvs. de cumparaturi</h1>';
   
	if(count($cos)>0){//am produse in cos, le afisez
		$t='<form action="?update" method="post">';
		$t.=
		'<table border="1">
	         <tr>
	         <th>Sterge</th>
	           <th>Descriere produs</th>
	           <th>Pret unitar</th>
	           <th>Cantitate</th>
	           <th>Pret total</th>
	           
	          </tr>';
		//calculez pretul total pe produs si pretul total  pe comanda	    
	    $total=0;
	    foreach($cos as $id){
	    	foreach($produse as $produs){
	    		if($id==$produs['id']){
	    			$desc=$produs['desc'];
	    			$cant=($cantitate[$id]>0)?$cantitate[$id]:1;//nu accept valori negative
	    			$pret=$produs['pret'];
	    			$pretTotal=$cant*$pret;
	    			$total+=$pretTotal;
	    	
	    	$t.=
	    	'<tr>
	    		<td><a href="?sterge&id='. $id.'">Sterge</td>
	    		<td>'.$desc.'</td>
	    		<td>'.$pret.' RON</td>
	    		
	    		<td>
	    			<input type="hidden" name="id[]" value="'.$id.'">
	    			<input type="text" name="cantitate[]" size="3" value="'.$cant.'">
	    		</td>
	    			<td>'.$pretTotal.'</td>
	    	</tr>
	    	
	    	';
	    	 }//end if
	    	}//end foreach
	    }//end foreach
	    //linia total
		$t.='    
	    <tr>
	    		<td colspan="4"><b>Total comanda</b></td>
	    		<td><b>'.$total.' RON</b></td>
	    		
	    </tr>';
	   
	    $t.='</table>';
	    $t.='<input type="submit" name="actualizeaza" value="Actualizeaza!">';
	    $t.='</form>';
	    echo $t;
	 }//end if  
	 else{//nu am produse in cos
	 	echo'Cosul dvs. este gol!';
	 	}	 	
	 	
	 echo '<p>
		<form action="" method="get">
			<a href="?">Continua cumparaturile</a> sau
			<input type="submit" name="gol" value="Goleste cosul!">
		</form>    
		</p>
    ';  
    //print_r($_GET);
?>