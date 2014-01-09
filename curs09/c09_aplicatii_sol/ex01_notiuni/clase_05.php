<?php
class Cursant{
	public $prenume;
	public $nume;
	private $email;
	private $studii;
	private static $nr;// nr cursantilor; static - atribut specific clasei, nu obiectului
		
	const curs='web2';
	
	function curs(){
		return self::curs;
		}
	
	//metoda constructor	
	function __construct($prenume,$nume,$email){
		$this->prenume =$prenume;
		$this->nume=$nume;
		$this->email=$email;
		
		self::$nr++;
		}
	
	//metoda destructor - se apeleaza cand este distrus obiectul cu unset
	function __destruct(){
		self::$nr--;		
		}
			
	function getNume(){
		return $this->prenume.' '.$this->nume;
		}	
	
	function getEmail(){
		return $this->email;
		}	
	
	static function getNr(){
		return self::$nr;
		}
}//end class	
		
$p1=new Cursant('Mihai','Popa','mpopa@gmail.com','liceu');
$p2=new Cursant('Stefan','Ionescu','sionescu@gmail.com','facultate');
$p3=new Cursant('Ana','Pop','apo@gmail.com','facultate');

echo '<h3>La cursul '.Cursant::curs.' participa urmatorele persoane:</h3>';
echo strtoupper($p1->getNume()).' '.strtolower($p1->getEmail());
echo '<br />';
echo strtoupper($p2->getNume()).' '.strtolower($p2->getEmail());
echo '<br />';
echo strtoupper($p3->getNume()).' '.strtolower($p3->getEmail());

echo '<br /><br />';
echo '<strong>Statistica</strong><br />';
echo 'Nr cursanti la cursul '.Cursant::curs.': '. Cursant::getNr();

unset($p1);//"distrug" obiectul $p1
unset($p2);//"distrug" obiectul $p2
unset($p3);//"distrug" obiectul $p3

echo '<strong><br />Statistica dupa distrugerea obiectelor</strong><br />';
echo 'Nr cursanti la cursul '.Cursant::curs.': '. Cursant::getNr();
?>