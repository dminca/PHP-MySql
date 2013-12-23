<?php
$numero = 1; // numbering starts from
$start = 5; // divided with
$rows = 10; // numar randuri
$cols = 2;// numar coloane

echo "<table border='1'>"; // open Table
 
for($tr=1;$tr<=$rows;$tr++){      
     echo "<tr>"; // deschid TR

        for($td=1;$td<=$cols;$td++){ // deschid TD
        	echo "<td>".($numero++)*$start."</td>";
        }
    echo "</tr>"; // inchid TR
}
 
echo "</table>";  // inchid table

?>