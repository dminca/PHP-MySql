<?php

//definitie clasa

class Cursant
{
    //atribute
    //specificatori de acces - public, private, protected(acesat din interiorul clasei sau din clasele derivate - clasa ce mosteneste o alta clasa...)
    private $nume;
    private $prenume;
    private $email;

    //metode (email este privat; astfel avem nevoie de o metoda pentru al accesa)
    
    //metoda construct
    function __construct($nume, $prenume, $email){
        $this ->nume = $nume;
        $this ->prenume = $prenume;
        $this ->email = $email;
    }
    
    //email
    function setEmail($email){
        $this -> email = $email;
    }
    function getEmail(){
        return $this -> email;
    }
    
    //nume
    function setNume($nume){
        $this -> nume = $nume;
    }
    
    function getNume(){
        return $this -> nume;
    }

    //Prenume
    function setPrenume($prenume){
        $this -> prenume = $prenume;
    }
    
    function getPrenume(){
        return $this -> prenume;
    }

}

//scriptul principal
$c1 = new Cursant('Ion','Stefan','cstefan@gmail.com');
//$c2 = new Cursant();

//dam valori atributelor
//$c1->setNume ('Ion');
//$c1->setPrenume ('Stefan');
//$c1->setEmail('cstefan@gmail.com');

//$c2->nume = 'Marian';
//$c2->prenume = 'Maricica';
//$c2->email = 'marian.maricica@gmail.com';

echo strtoupper($c1->getNume()) . ' ' . strtoupper($c1->getPrenume()) . ' ' . strtolower($c1->getEmail());
//var_dump($c1);


?>