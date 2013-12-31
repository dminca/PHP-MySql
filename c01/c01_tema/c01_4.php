<?php

/**
 * @author Andrei M.
 * @copyright 2013
 */
include ('lib/zodia.php');
include ('lib/data.php');

// preluam datele folositoare
$luna = $_GET['luna']-1;
$anul = $ani[$_GET['an']-1];
$varsta = $an_curent - $anul;

// afisam datele
zodie($luna);
echo "<p>Si aveti <b>".$varsta."</b> ani.</p>";
?>