<?php

/**
 * @author Andrei M.
 * @copyright 2014
 */

include('lib/culori.php');
//print_r($colors); # debug
?>
<!DOCTYPE HTML>
<html>
 <head>
  <title>C01 - ex5 [ coloured text ]</title>
 </head>
 <body>
  <form method = "get" action="">
  	<label>Select background:</label><select name="bg">
  	<!-- generate dropdown via color Function -->
  		<?php
  		colorBg($colors);  		
  		?>
  	</select>

  	<label>Select text color:</label><select name="txt[]">
  	<!-- generate dropdown via color Function -->
  		<?php
  		colorTxt($colors);  		
  		?>
  </select>

  <input type="submit" name="btn" value="Colorize!"/>
  </form>
 </body>
</html>