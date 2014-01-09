<?php
// definitie clasa

class Cursant{
	//atribute
	//specificatori de acces: public, private, protected
    const curs = "web2";
	private $nume;
	private $prenume;
	private $email;
    static private $nr;

	//metode
    function __construct($nume, $prenume, $email){
        $this -> nume = $nume;
        $this -> prenume = $prenume;
        $this -> email = $email;
        self::$nr++;
    }
    
    function destruct(){
        unset($this);
        self::$nr--;
    }
    
	function setNume($nume){
		$this -> nume = $nume;
	}

	function getNume(){
		return $this->nume;
	}

	function setPrenume($prenume){
		$this -> prenume = $prenume;
	}

	function getPrenume(){
		return $this->prenume;
	}

	function setEmail($email){
		$this -> email = $email;
	}

	function getEmail(){ // nu am nevoie de argument ca returnez valoarea
		return $this->email;
	}
    
    static function getNr(){
        return self::$nr;
    }
    
}

// scriptul principal
$c1 = new Cursant('Ion','Stefan','cstefan@dsaf.fds');
$c2 = new Cursant('Petre','Gheorg','pgeorg@gfs.is');


//dau valori atributelor lui c1
/**
 * $c1 -> setNume("Ion");
 * $c1 -> setPrenume("Stefan");
 * $c1 -> setEmail("cstefan@dsaf.fds");
 */
echo "Numarul cursantilor de la ".Cursant::curs." este:". Cursant::getNr()."<br/>"; 
$c2->destruct(); //sterg obiectul $c2
echo "Cursantii de la cursul ".Cursant::curs."<br/>";
echo strtoupper($c1->getNume())." ".strtoupper($c1->getPrenume())." ".strtolower($c1->getEmail());
var_dump($c1);
?>