<?php

/**
 * @author Andrei M.
 * @copyright 2013
 */

function zodie ( $birthdate )
{
   $zodie = "";
        
   list ( $year, $month, $day ) = explode ( "-", $birthdate );
        
   if     ( ( $month == 3 && $day > 20 ) || ( $month == 4 && $day < 20 ) ) {
    $zodiac = "Berbec"; 
 } elseif ( ( $month == 4 && $day > 19 ) || ( $month == 5 && $day < 21 ) ) {
  $zodiac = "Taur"; 
}elseif ( ( $month == 5 && $day > 20 ) || ( $month == 6 && $day < 21 ) ) {
    $zodiac = "Gemeni"; 
 }elseif ( ( $month == 6 && $day > 20 ) || ( $month == 7 && $day < 23 ) ) {
    $zodiac = "Rac"; 
 }elseif ( ( $month == 7 && $day > 22 ) || ( $month == 8 && $day < 23 ) ) {
    $zodiac = "Leu"; 
 }elseif ( ( $month == 8 && $day > 22 ) || ( $month == 9 && $day < 23 ) ) {
    $zodiac = "Fecioara"; 
 }elseif ( ( $month == 9 && $day > 22 ) || ( $month == 10 && $day < 23 ) ) {
    $zodiac = "Balanta"; 
 }elseif ( ( $month == 10 && $day > 22 ) || ( $month == 11 && $day < 22 ) ) {
    $zodiac = "Scorpion"; 
 }elseif ( ( $month == 11 && $day > 21 ) || ( $month == 12 && $day < 22 ) ) {
    $zodiac = "Sagetator"; 
 }elseif ( ( $month == 12 && $day > 21 ) || ( $month == 1 && $day < 20 ) ) {
    $zodiac = "Capricorn"; 
 }elseif ( ( $month == 1 && $day > 19 ) || ( $month == 2 && $day < 19 ) ) {
    $zodiac = "Varsator"; 
 }elseif ( ( $month == 2 && $day > 18 ) || ( $month == 3 && $day < 21 ) ) {
    $zodiac = "Pesti"; 
 } 
 return $zodie;
}

?>