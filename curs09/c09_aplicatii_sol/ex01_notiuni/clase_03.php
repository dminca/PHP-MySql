<?php
class Cursant{
	public $prenume;
	public $nume;
	private $email;
	
	function __construct($prenume,$nume,$email){
		$this->prenume=$prenume;
		$this->nume=$nume;
		$this->email=$email;
		}	
	
	function getEmail(){
		return $this->email;
		}	
		
	function getNume(){
		return $this->prenume.' '.$this->nume;
		}	
			
	}//end class	
		
$p1=new Cursant('Mihai','Popa','mpopa@gmail.com');

$p2=new Cursant('Stefan','Ionescu','sionescu@gmail.com');

echo '<h3>Cursanti:</h3>';
echo strtoupper($p1->getNume()).' '.strtolower($p1->getEmail());
echo '<br />';
echo strtoupper($p2->getNume()).' '.strtolower($p2->getEmail());

unset($p1);//"distrug" obiectul $p1
unset($p2);//"distrug" obiectul $p2
?>