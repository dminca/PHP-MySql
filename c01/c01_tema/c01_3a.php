<?php
$cols = 5;
$go = 1;

echo "<table border='1'>"; // open Table
 
for($tr=1;$tr<= 1;$tr++){      
     echo "<tr>"; // deschid TR

        for($td=1;$td<=$cols;$td++){ // deschid TD
        	echo "<td>";
        	for ($i=1; $i <= $cols; $i++) { 
        		echo ($go++)."x";
        	}
        	echo "</td>";
        }
    echo "</tr>"; // inchid TR
}
 
echo "</table>";  // inchid table & bye!
#end code

?>