<?php

//definitie clasa

class Cursant
{
    //atribute
    //specificatori de acces - public, private, protected(acesat din interiorul clasei sau din clasele derivate - clasa ce mosteneste o alta clasa...)
    const curs = 'web2'; //constanta
    private $nume;
    private $prenume;
    private $email;
    static private $nr; //punem static pentru ca ne caracterizeaza clasa

    //metode (email este privat; astfel avem nevoie de o metoda pentru al accesa)

    //metoda construct
    function __construct($nume, $prenume, $email)
    {
        $this->nume = $nume;
        $this->prenume = $prenume;
        $this->email = $email;
        self::$nr++;
    }

    function destruct()
    {
        unset($this);
        self::$nr--;
    }

    //email

    function getEmail()
    {
        return $this->email;
    }

    //nume


    function getNume()
    {
        return $this->nume;
    }

    //Prenume
    function getPrenume()
    {
        return $this->prenume;
    }

    //metoda pentru a returna $nr
    static function getnr()
    {
        return self::$nr;
    }
}

//scriptul principal
$c1 = new Cursant('Ion', 'Stefan', 'cstefan@gmail.com');
$c2 = new Cursant('Marian', 'Marinescu', 'marian.marinescu@gmail.com');
$c2->destruct(); // stergem obiectul c2

//dam valori atributelor
//$c1->setNume ('Ion');
//$c1->setPrenume ('Stefan');
//$c1->setEmail('cstefan@gmail.com');

//$c2->nume = 'Marian';
//$c2->prenume = 'Maricica';
//$c2->email = 'marian.maricica@gmail.com';
echo "Numarul cursantilor de la " . Cursant::curs . " este: " . Cursant::getnr() . "<br />";
echo "Cursantii de la cursul " . Cursant::curs . "<br />";
echo strtoupper($c1->getNume()) . ' ' . strtoupper($c1->getPrenume()) . ' ' . strtolower($c1->getEmail());
//var_dump($c1);


?>