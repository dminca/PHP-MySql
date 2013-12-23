<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>

<?php

function culoare($name, $array){
    $lista="<select name=\"$name\">";
    foreach($array as $k=>$v){
        $lista.="<option value=\"$k\">$v</option>";
        }
    $lista.="</select>";
    return $lista;
    }
    
$culori=array('#000000'=>'negru', '#FF0000'=>'rosu', '#00FF00'=>'verde', '#0000FF'=>'albastru', '#FFFF00'=>'galben');
?>


<form method="get" action="">
    <fieldset style="width:30%">
        <label>Fundalul textului:</label>
        <?php
            echo culoare('fundal', $culori);
        ?>
        <label>Culoarea textului:</label>
        <?php
            echo culoare('text', $culori);
        ?>
    </fieldset>
    <input type="submit" value="Go" name="btn"/>
</form>
<?php

if(isset($_GET['btn'])){

$fundal=$_GET['fundal'];
$text=$_GET['text'];

if($fundal!=$text){
    echo "<p style=\"color:$text; background:$fundal; width:200px; padding:10px;\">Aici este un paragraf.</p>";
}else{
echo "Alege culori diferite!";
}
}
?>
</body>
</html>