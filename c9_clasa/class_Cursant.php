<?php
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
?>