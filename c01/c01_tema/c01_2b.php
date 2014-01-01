<?php
$cols = 2;
$rows = 4;
$nr = 5;
echo "<table border='1'>"; // open Table
 
for($tr=1;$tr<=$rows;$tr++){      
     echo "<tr>"; // deschid TR

        for($td=1;$td<=$cols;$td++){ // deschid TD
        	echo "<td>";
        	for ($i=1; $i <= $nr; $i++) { 
        		echo "<img src=\"img/browser$i.jpg\" alt=\"poza[$i]\">";
        	}
        		echo "</td>";
        }
    echo "</tr>"; // inchid TR
}
 
echo "</table>";  // inchid table & bye!
#end code
?>
