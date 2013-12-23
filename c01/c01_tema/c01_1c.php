<?php

function tabel($nr_coloane, $nr_linii){
/*
=====DATA BOX======
*/
$numero = 1; // numbering starts from
$start = 5; // divided with
#---------end

/*
====START CODE====
*/
echo "<table border='1'>"; // open Table
 
for($tr=1;$tr<=$nr_linii;$tr++){      
     echo "<tr>"; // deschid TR

        for($td=1;$td<=$nr_coloane;$td++){ // deschid TD
        	echo "<td>".($numero++)*$start."</td>";
        }
    echo "</tr>"; // inchid TR
}
 
echo "</table>";  // inchid table & bye!
#end code
}



/*
====APELUL FUNCTIEI
*/
tabel(2, 10);

?>