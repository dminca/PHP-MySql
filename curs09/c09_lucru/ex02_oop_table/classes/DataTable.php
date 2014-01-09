<?php

/*
setRowAttributes,setColAttributes,setCellAttributes
updateRowAttributes,updateColAttributes,updateCellAttributes

1.tabel zebra cu date din array
2.setColsAttributes
3. clasa Common cu metoda parseAttributes, toHTML(tag,params); mostenire)
*/
class DataTable
{
	
	//proprietati
	public $tableAttributes=array();//array asociativ cu atributele tabelului; ex: array('border'=>1,'style'=>'border-collapse:collapse')
	public $caption='';
	public $rows= array();// array bidimensional; rows[0] - prima linie; rows[0][fields[0]]-prima celula
	public $rowParams=array();// array bidimensional;rowParams[0]=array('class'=>'nume_clasa','style'=>'color:red')
	public $cellParams=array();
	
	
	// metoda constructor
	function __construct($attributes=null,$caption=null) {
		$this->tableAttributes=$this->parseAttributes($attributes);
		$this->setCaption($caption);
	}
	
	//aceasta metoda nu e specifica clasei; se poate muta in alta clasa care va deveni clasa parinte pt clasa curenta
	function parseAttributes($attributes){
		//transforma array-ul asociativ $attributes in sir de perechi attribute="value"
		$output="";
		if(is_array($attributes)){
		foreach($attributes as $attribute=>$value){
			if(is_int($attribute)){
				$attribute=$value=strtolower($value);
				}else{
					$value=strtolower($value);
					}
			$output.=' '.$attribute.'="'.$value.'"';
			}
		}
		return $output;
		}
		
	function setCaption($caption){
		$this->caption=$caption;
		}
	
	//returnez nr de linii
	function getRowsNo(){
		return count($this->rows);
		}
	
	//returnez nr de coloane, adica nr maxim de celule pe linii
	function getColsNo(){
		$rowsNo=$this->getRowsNo();
		$rowsLength=array();
		foreach($this->rows as $row){
			$rowsLength[]=	count($row)	;	
			}
		return max($rowsLength);
		}
		
	// adaug o linie
	function addRow($values,$attributes=array()){
		// adaug valorile pentru noua linie
		$this->rows[count($this->rows)] = $values;
		// daca am atribute pentru linie
		if (count($attributes)>0){
			// adaug fiecare atribut
			$this->rowParams[count($this->rows)] = $this->parseAttributes($attributes);
		}
	}
	
	function setRowAttributes($row,$attributes){
		if($row<0 || $row>$this->getRowsNo()) return;//linia nu exista
		$this->rowParams[$row]=$this->parseAttributes($attributes);
		
		}
	
	function setCellAttributes($row,$col,$attributes){
		if($row<0 || $row>$this->getRowsNo()) return;//linia nu exista
		$this->cellParams[$row][$col]=$this->parseAttributes($attributes);
		//print_r($this->cellParams)	;
		}

		
	// afisez tabelul
	function display(){
		$output = "";
		// start tabel si caption
		$output .= "<table".$this->tableAttributes.">\n";
		$output .= "<caption>".$this->caption."</caption>\n";
		
		// parcurg fiecare linie
		$rowsNo=$this->getRowsNo();
		for ($x=0; $x<$rowsNo; $x++) {
			$row = $this->rows[$x];
			// pp nu am parametri
			$params = "";
			// dc exista parametri pt aceasta linie, ii "preiau"
			if (isset($this->rowParams[$x]) && count($this->rowParams[$x])>0){
				$params=$this->rowParams[$x];
				}
			
			//start linie cu eventualii parametri
			$output .= "	<tr$params>\n";
			
			$colsNo=$this->getColsNo();
			$cellsNo=count($row);
			
			// parcurg fiecare celula
			for ($i=0; $i<$cellsNo; $i++) {
					$value = $row[$i];
					$params = "";
					// dc exista parametri pt aceasta celula, ii "preiau"
					   if (isset($this->cellParams[$x][$i])&&count($this->cellParams[$x][$i])>0){
						$params=$this->cellParams[$x][$i];
					}
					//celula cu eventualii parametrii
					
					$output .= "		<td$params>".$value."</td>\n";
				}
			// end linie
			$output .= "	</tr>\n";
			
		}
		// end tabel
		$output .= "</table>\n\n";
		echo $output;
	}
	
}

?>