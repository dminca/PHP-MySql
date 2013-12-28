<?php
$cols = 5; // coloane
$box = 10; // cutii
$go = 0;

echo "<table border='1'>"; // open Table
 
for($tr=1;$tr<= 2;$tr++){ // generate 2 rows   
     echo "<tr>"; // deschid TR

        for($td=1;$td<=$cols;$td++){ // deschid 5 td-uri
        	echo "<td>";
			$go++;  // start 'go'
			
			// in td I'm doing the operation
        	for ($i=1; $i <= $box; $i++) { 
        		echo $go."x".$i."=" . ($go*$i) . "<br/>"; // the core: Operation calculates here 
        	}
        	echo "</td>";
        }
    echo "</tr>"; // inchid TR
}
 
echo "</table>";  // inchid table & bye!
#end code

?>