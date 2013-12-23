<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Catalog de poduse</title>
    <link  type="text/css" rel="stylesheet" href="css/public.css" />
  </head>

  <body>
  <?php
  include "includes/produse.php";
  require_once "includes/functions.php";
   
  echo '<p>Cosul dvd. de cumparaturi contine '. nrProduse($_SESSION['cos_cant']).' produse.</p>';
  echo '<p><a href="?cos">Vedeti cosul de cumparaturi</a></p>';	
	
	$t=
	'<table border="1">
         <tr>
           <th>Descriere produs</th>
           <th>Pret</th>
         </tr>';
    foreach($produse as $produs){
    	$t.=
    	'<tr>
    		<td>'.$produs['desc'].'</td>
    		<td>'.$produs['pret'].'</td>
    		<td>
    		<form action="" method="post">
    			<input type="hidden" name="id" value="'.$produs['id'].'">
    			<input type="submit" name="cumpara" value="Cumpara!">
    		</form>
    		</td>
    	</tr>
    	';
    }//end foreach
    $t.='</table>';
    echo $t;
    echo '<p>Toate preturile sunt in RON.</p>'
  ?>
	   
  </body>
</html>
