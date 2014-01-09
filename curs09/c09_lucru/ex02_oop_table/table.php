<?php

include "classes/DataTable.php";
// Creez un nou tabel
$attributes=array('border'=>1,'style'=>'border-collapse:collapse; background-color: red');
$t = new DataTable($attributes);
//setez elementul caption
$t->setCaption("Exemplu de tabel");


// Stabilesc antetul tabelului  folosind metoda addRow
$t->addRow(array("ID","Nume","Prenume","Adresa"));

//setez atributele antetului folosind metoda setRowAttributes; antetul este linia cu nr de ordine 0
$t->setRowAttributes(0,array('style'=>'font-weight:bold;background-color:lightblue'));


// Adaug linii tabelului folosind metoda addRow; fiecare linie este un aray
$t->addRow(array("1", "Popa", "Ion","Bucuresti"));
$t->addRow(array("2", "Ionescu", "Stefan","Pitesti"));
$t->addRow(array("3", "Ionescu", "Ana","Pitesti"));
$t->addRow(array("Total persoane", $t->getRowsNo()-1));

//setez atribute pentru o linie; prima linie are nr de ordine 0
$a=array('style'=>'color:red; background-color:yellow','class'=>'test');
$t->setRowAttributes(1,$a);

//setez atribute pentru o celula
$t->setCellAttributes(2,2,array("class"=>"test","style"=>"color:blue"));
$t->setCellAttributes($t->getRowsNo()-1,0,array("colspan"=>"3",'style'=>'font-weight:bold;'));

// Afisez tabelul
$t->display();

?>
