<?php
class Cursant{
	public $prenume;
	public $nume;
	private $email;
	
	function getNume(){
		return $this->prenume.' '.$this->nume;
		}	
		
	function getEmail(){
		return $this->email;
		}	
		
	function setNume($prenume,$nume){
		$this->prenume=$prenume;
		$this->nume=$nume;
		}
		
	function setEmail($email){
		$this->email=$email;
		}
	
		
	}//end class	
		
$p1=new Cursant();
$p1->setNume('Mihai','Popa');
$p1->setEmail('mpopa@gmail.com');


$p2=new Cursant();
$p2->setNume('Stefan','Ionescu');
$p2->setEmail('sionescu@gmail.com');

echo '<h3>Cursanti:</h3>';
echo strtoupper($p1->getNume()).' '.strtolower($p1->getEmail());
echo '<br />';
echo strtoupper($p2->getNume()).' '.strtolower($p2->getEmail());

unset($p1);//"distrug" obiectul $p1
unset($p2);//"distrug" obiectul $p2
?>