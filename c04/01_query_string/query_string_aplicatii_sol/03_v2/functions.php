<?php
function start_table($caption='Carti'){
	$t = array();
	$t[] = "<table border=\"1\">";
	$t[] = " <caption>$caption</caption>";
	return implode("\n",$t);
	}

function end_table(){
	$t = array();
	$t[] = "</table>";
	return implode("\n",$t);
	} 

	
function tr($array,$keys='all'){
	
	if($keys=='all') $keys=array_keys($array);
	if(!is_array($keys)) die('Dati cheile sub forma de array');
	$keys=array_intersect($keys,array_keys($array));
		
	$t=array();
	if(!empty($array)) {
		$t[] = "<tr>";
		foreach($array as $key=>$field){
			if(array_search($key,$keys)!==FALSE)//extrag din array numai elementele cu cheile specificate de array-ul $keys
				$t[] = "<td>$field</td>";			
			}
		$t[] = "</tr>"; 
		}  
	return implode("\n",$t);
	}

function table_data($arrays,$keys='all',$id=NULL){
	$t=array();
	if($id===NULL){//cate o linie pentru fiecare element din array
		foreach($arrays as $key=>$val){
			$t[] = tr($val,$keys);
			} 
	}else{//numai elementul cu id-ul $id
			$t[] = tr($arrays[$id],$keys);
		}
	return implode("\n",$t);
	}
	

function table($arrays,$keys='all',$id=NULL,$title='Carti'){
	
	$t = array();
	
	//start tabel
	$t[] = start_table($title);
	
	//antet tabel
	$t[]=tr(array_keys($arrays[0]),$keys);
	
	//date tabel
	$t[]=table_data($arrays,$keys,$id);
	
	//end tabel
	$t[] = end_table();   
	return implode("\n",$t);
}   
?>