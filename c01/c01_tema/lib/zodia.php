<?php

/**
 * @author Andrei M.
 * @copyright 2013
*/

function zodie($month){
  if ($month == 3) {
    echo "Berbec";
  } elseif ($month == 4) {
    echo "Taur";
  } elseif ($month == 5) {
    echo "Gemeni";
  } elseif ($month == 6) {
    echo "Rac";
  } elseif ($month == 7) {
    echo "Leu";
  } elseif ($month == 8) {
    echo "Fecioara";
  } elseif ($month == 9) {
    echo "Balanta";
  } elseif ($month == 10) {
    echo "Scorpion";
  } elseif ($month == 11) {
    echo "Sagetator";
  } elseif ($month == 0) {
    echo "Capricorn";
  } elseif ($month == 1) {
    echo "Varsator";
  } elseif ($month == 2) {
    echo "Pesti";
  } else {
    echo "<b>Eroare:</b> Luna selectata este invalida...";
  }
}

?>