<?php
	function table_start(){
		$table='<table>';
		return $table;
		}
		
	function table_header($array){
		$keys=array_keys($array);
		$table='<tr>';
		foreach($keys as $key) {
				$table.='<th>'.$key.'</th>';
				}
		return $table;
		}
		
	function table_row($array){
		$table='<tr>';
		foreach($array as $value){
				$table.='<td>'.$value.'</td>';
		}
		$table.='</tr>';
		return $table;
		}
		
	function table_end(){
		return '</table>';
		}
	
?>