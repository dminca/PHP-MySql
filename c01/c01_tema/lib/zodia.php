<?php

/**
 * @author Andrei M.
 * @copyright 2013
*/

function zodie($month){
  if ($month == 3) {
    echo "<p>Sunteti nascut in zodia Berbec</p>";
  } elseif ($month == 4) {
    echo "<p>Sunteti nascut in zodia Taur</p>";
  } elseif ($month == 5) {
    echo "<p>Sunteti nascut in zodia Gemeni</p>";
  } elseif ($month == 6) {
    echo "<p>Sunteti nascut in zodia Rac</p>";
  } elseif ($month == 7) {
    echo "<p>Sunteti nascut in zodia Leu</p>";
  } elseif ($month == 8) {
    echo "<p>Sunteti nascut in zodia Fecioara</p>";
  } elseif ($month == 9) {
    echo "<p>Sunteti nascut in zodia Balanta</p>";
  } elseif ($month == 10) {
    echo "<p>Sunteti nascut in zodia Scorpion</p>";
  } elseif ($month == 11) {
    echo "<p>Sunteti nascut in zodia Sagetator</p>";
  } elseif ($month == 0) {
    echo "<p>Sunteti nascut in zodia Capricorn</p>";
  } elseif ($month == 1) {
    echo "<p>Sunteti nascut in zodia Varsator</p>";
  } elseif ($month == 2) {
    echo "<p>Sunteti nascut in zodia Pesti</p>";
  } else {
    echo "<b>Eroare:</b> Luna selectata este invalida...";
  }
}

?>