<?php

function nrProduse($cantitate){
	$nr=0;
	foreach($cantitate as $val){
		$nr+=$val;
		}
	return $nr;
	}
 ?>