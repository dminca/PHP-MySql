<?php 
$rows = 10; // numar randuri
$cols = 2;// numar coloane

echo "<table border='1'>"; 
 
for($tr=1;$tr<=$rows;$tr++){      
     echo "<tr>";
        for($td=1;$td<=$cols;$td++){
            //am generat col si randuri, jos trec calculul
             echo "<td>".($tr*5)."</td>";
        } 
    echo "</tr>"; 
} 
 
echo "</table>"; 
?>