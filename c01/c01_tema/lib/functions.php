<?php
# $cols = columns
# $rows = rows
# $nr = number of pictures in the folder

function tabel_imagini($cols){
echo "<table border='1'>"; // open Table
 
for($tr=1;$tr<= 1;$tr++){      
     echo "<tr>"; // deschid TR

        for($td=1;$td<=$cols;$td++){ // deschid TD
        	echo "<td>";
        	for ($i=1; $i <= $cols; $i++) { 
        		echo "<img src=\"img/browser$i.jpg\" alt=\"poza[$i]\">";
        	}
        }
    echo "</tr>"; // inchid TR
}
 
echo "</table>";  // inchid table & bye!
#end code
}

/*
====APELUL FUNCTIEI
tabel(2, 10);
*/

?>