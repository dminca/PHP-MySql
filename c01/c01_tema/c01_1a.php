<?php
$start = 5; // start number !
$rows = 10; // numar randuri
$cols = 2;// numar coloane

echo "<table border='1'>"; // open Table
 
for($tr=1;$tr<=$rows;$tr++){      
     echo "<tr>"; // deschid TR
     	
        do {
        	echo "<td>$i*$start</td>";
        } while ($i <= 10);
    echo "</tr>"; // inchid TR
}
 
echo "</table>";  // inchid table

?>