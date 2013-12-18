<?php
$culori = array('rosu' => '#ff0000','albastru'=> '#0000ff', 'verde'=>'#00ff00', 'cyan'=>'#00FFFF');

echo "<table border='1'>
		<tr>
			<th>Culoare</th>
			<th>Cod Hexa</th>";
	foreach ($culori as $key => $value) {
		echo "<tr style='background-color:$value'>
				<td>$key</td>
				<td>$value</td>
			</tr>";
	}
echo "</table>";

?>