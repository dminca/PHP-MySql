<?php
class Cursant{
	public $prenume;
	public $nume;
	public $email;
}
	
$p1=new Cursant();
$p1->prenume='Mihai';
$p1->nume='Popa';
$p1->email='pmihai@gmail.com';

$p2=new Cursant();
$p2->prenume='Stefan';
$p2->nume='Ionescu';
$p2->email='sionescu@gmail.com';

echo '<h3>Cursanti:</h3>';
echo strtoupper($p1->prenume).' '.strtoupper($p1->nume).' '.strtolower($p1->email);
echo '<br />';
echo strtoupper($p2->prenume).' '.strtoupper($p2->nume).' '.strtolower($p2->email);
?>