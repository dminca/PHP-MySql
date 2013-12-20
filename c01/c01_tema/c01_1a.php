<?php 
$rows = 10; // numar randuri
$cols = 2;// numar coloane
$start = 5; // STARTUL !

echo "<table border='1'>"; 
 
for($tr = 1 ; $tr <= $rows ; $tr++){      
    //am intrat in TR 
    echo "<tr>"; 
    echo "<td>".($start+5)."</td>"; //sa bag aici un for ??  
    echo "</tr>";
}
 
echo "</table>"; 
?>