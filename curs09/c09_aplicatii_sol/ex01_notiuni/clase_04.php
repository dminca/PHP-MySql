<?php
class Cursant{
	public $prenume;
	public $nume;
	private $email;
	const curs='web2';
	
	function __construct($prenume,$nume,$email){
		$this->prenume=$prenume;
		$this->nume=$nume;
		$this->email=$email;
		}	
	
	function getNume(){
		return $this->prenume.' '.$this->nume;
		}	
	
	function getEmail(){
		return $this->email;
		}	
		
				
	}//end class	
		
$p1=new Cursant('Mihai','Popa','mpopa@gmail.com');

$p2=new Cursant('Stefan','Ionescu','sionescu@gmail.com');

echo '<h3>Cursantii de la cursul '.Cursant::curs.':</h3>';
echo strtoupper($p1->getNume()).' '.strtolower($p1->getEmail());
echo '<br />';
echo strtoupper($p2->getNume()).' '.strtolower($p2->getEmail());

unset($p1);//"distrug" obiectul $p1
unset($p2);//"distrug" obiectul $p2
?>