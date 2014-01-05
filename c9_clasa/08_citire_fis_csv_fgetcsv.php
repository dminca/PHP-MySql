<?php

include 'class_Cursant.php';
$filename = 'popici.csv';
$cursanti = array();
$fp = fopen($filename, 'r'); //deschid fisierul pentru scriere; daca nu exista, va fi creat
//var_dump($fp);
if (!$fp) {
    die("Fisierul nu poate fi deschis");
}

while ($line = fgetcsv($fp, ',')) {
    //print_r($line);
    //    echo "Nume: $line[0]";
    //    echo "<br />";
    //    echo "Prenume: $line[1]";
    //    echo "<br />";
    //    echo "Email: $line[2]";
    //    echo "<br /><br />";

    //creez obiectul $cursant cu datele din $line
    $c = new Cursant($line[0], $line[1], $line[2]);
    //adaugam obiectul $cursan la array-ul $cursanti
    $cursanti[] = $c;
}
//afisam nr cursantilor
echo "Numarul cursantilor de la " . Cursant::curs . " este: " . Cursant::getnr() . "<br />";
//parcurgem $cursanti si afisam lista cursantilor
foreach ($cursanti as $value) {
    echo strtoupper($value->getNume()) . ' ' . strtoupper($value->getPrenume()) . ' ' . strtolower($value->getEmail()) . "<br />";
}

//var_dump($cursanti);

fclose($fp);

?>