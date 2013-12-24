<!DOCTYPE HTML>
<html>
 <head>
  <title> </title>
 </head>
 <body>
  <fieldset>
  	<form method="get" action="">
  		<label>Selectati imaginea:</label>
      <?php      
      if (isset($_GET['btn'])) { // daca avem selectie
        //preluam selectia

      } else { // daca nu, generam eroare

      }
      #------------TABLE-------------
      $imgs = array('img/browser1.jpg', 'img/browser2.jpg', 'img/browser3.jpg', 'img/browser4.jpg', 'img/browser5.jpg');

    		echo "<table border='1'>"; // open Table
         
        for($tr=1;$tr<= 1;$tr++){      
             echo "<tr>"; // deschid TR

                for($td=1;$td<= count($imgs);$td++){ // deschid TD
                  echo "<td>";
                  for ($i=1; $i <= count($imgs); $i++) { 
                    echo "<img src=\"img/browser$i.jpg\" alt=\"poza[$i]\">";
                  }
                }
            echo "</tr>"; // inchid TR
        }
         
        echo "</table>";  // inchid table & bye!
        #end code

      #----------OPTION LIST----------
        echo "<select>";
        for ($i=0; $i < count($imgs); $i++) { 
                echo "<option value=\"cols\">Nr coloane: ".$i."</option>";
              }
        echo "</select>";

  		?>

      <input type="submit" name="btn" value="Trigger haxX!"/>
  	</form>
  </fieldset>
 </body>
</html>