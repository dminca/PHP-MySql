<?php

/**
 * @author Andrei M.
 * @copyright 2014
 */

$rows = array(
    array('id' => '1', 'desc' => 'Dictionar englez-roman',
    'pret' => 24.95),

  array('id' => '2', 'desc' => 'Songs of the Goldfish (set 2CD)',
   'pret' => 100),

  array('id' => '3', 'desc' => 'PHP pentru World Wide Web',
  'pret' => 35),

  array('id' => '4', 'desc' => 'Dictionar roman-englez',
   'pret' => 39.95));


include "classes/DataTable.php";
// creez un nou tabel
$attributes = array('border'=>1, 'style'=>'border-collapse: collapse; background-color: red');

$t = new DataTable($attributes);

// antetul tabelului
$t->addRow(array("id","descriere","pret"));
$t->setRowAttributes(0,array('style'=>'font-weight:bold;background-color:lightblue'));

// adaug liniii pe baza array-ului
foreach ($rows as $row) {
    $t->addRow(array($row['id'],$row['desc'],$row['pret']));
}


// stil zebra
$nr = $t->getRowsNo();
for ($i=1 ; $i <= $nr ; $i=$i+2) {
    $t -> setRowAttributes($i, array('style'=>'font-weight: bold; background-color: green'));
}

$t->display();
?>