<?php

class QueryDb{
	private $db_host;	
	private $db_user;
	private $db_pass;
	private $db_name;
	
	function __construct($db_host, $db_user,$db_pass, $db_name){
		$this->db_host=$db_host;
		$this->db_user=$db_user;
		$this->db_pass=$db_pass;
		$this->db_name=$db_name;
		}
			
	function dbConnect(){
		$link=@mysqli_connect($this->db_host,$this->db_user, $this->db_pass, $this->db_name) 
		or die('eroare la conectare: '. mysqli_connect_error());
		return $link;
	}
	
	function query($sql){
		//conectarea la baza de date
		$link=$this->dbConnect();
		
		//memorez rezultatul interogarii		
		$result=mysqli_query($link,$sql);
		
		/*
		construiesc array-ul $results; un element al lui $result va fi 
		o inregistrare date de interogarea $sql, sub forma de array
		*/		
		$results=array();		
		if(!$result){
			return FALSE;
			}else{
				while($d=mysqli_fetch_array($result)){
					//$cursant = new Cursant($d['prenume'],$d['nume'], $d['studii']);
					$results[]=$d;
				}//end whilw
				return $results;
				}
		}//end function
}
	


?>