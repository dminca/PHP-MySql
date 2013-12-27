<?php
function inmultire($cells, $columns){
    $go = 0;

    echo "<table border='1'>"; // open Table

    for ($tr = 1; $tr <= 2; $tr++) { // generate 2 rows
        echo "<tr>"; // deschid TR

        for ($td = 1; $td <= $columns; $td++) { // Open <td>
            echo "<td>";
            $go++; // start 'go'

            // in td I'm doing the operation
            for ($i = 1; $i <= $cells; $i++) {
                echo $go . "x" . $i . "=" . ($go * $i) . "<br/>"; // the core: Operation calculates here
            }
            echo "</td>";
        }
        echo "</tr>"; // closing <TR>
    }

    echo "</table>"; // closing <table> and BYE!
}
#end code





?>