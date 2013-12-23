<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>

<?php

function data($name, $array){
    $lista="<select name=\"$name\">";
    foreach($array as $k=>$v){
        $lista.="<option value=\"$k\">$v</option>";
        }
    $lista.="</select>";
    return $lista;
    }
    
$zile=range(1,31);
$luni=array(1=>'Ianuarie', 'Februarie', 'Martie', 'Aprilie', 'Mai', 'Iunie', 'Iulie', 'August', 'Septembrie', 'Octombrie', 'Noiembrie', 'Decembrie');
$an_curent=date('Y');
$ani=range(1900, $an_curent);

?>

<form method="get" action="">
    <fieldset style="width:30%">
        <label>Ziua nasterii</label>
        <?php
            echo data('ziua', $zile);
        ?>
        <label>Luna nasterii</label>
        <?php
            echo data('luna', $luni);
        ?>
        <label>Anul nasterii</label>
        <?php
            echo data('an', $ani);
        ?>
    </fieldset>
    <input type="submit" value="Afla zodia" name="btn"/>
</form>

<?php

if(isset($_GET['btn'])){

$val_ziua=$_GET['ziua'];
$val_luna=$_GET['luna'];
$val_an=$_GET['an'];

$ziua=$zile[$val_ziua];
$luna=$luni[$val_luna];
$an=$ani[$val_an];

switch($val_luna){
        case 1: 
        if($ziua>=20){
        $zodie="Varsator";}else{
        $zodie="Capricorn";
        }
        break;
        
        case 2:  if($ziua>=19){ $zodie="Pesti";}else{ $zodie="Varsator"; } break;
        case 3:  if($ziua>=21){ $zodie="Berbec";}else{ $zodie="Pesti"; } break;
        case 4:  if($ziua>=21){ $zodie="Taur";}else{ $zodie="Berbec"; } break;
        case 5:  if($ziua>=22){ $zodie="Gemeni";}else{ $zodie="Taur"; } break;
        case 6:  if($ziua>=22){ $zodie="Rac";}else{ $zodie="Gemeni"; } break;
        case 7:  if($ziua>=23){ $zodie="Leu";}else{ $zodie="Rac"; } break;
        case 8:  if($ziua>=23){ $zodie="Fecioara";}else{ $zodie="Leu"; } break;
        case 9:  if($ziua>=22){ $zodie="Balanta";}else{ $zodie="Fecioara"; } break;
        case 10:  if($ziua>=23){ $zodie="Scorpion";}else{ $zodie="Balanta"; } break;
        case 11:  if($ziua>=22){ $zodie="Sagetator";}else{ $zodie="Scorpion"; } break;
        case 12:  if($ziua>=21){ $zodie="Capricorn";}else{ $zodie="Sagetator"; } break;
        default:
        echo "Eroare.";
        }
        

if(checkdate($val_luna, $ziua, $an)){
    echo "<p>Data nasterii este $ziua $luna $an.</p>";
    echo "<p>Varsta este ".($an_curent-$an)." ani.</p>";
    echo "<p>Zodia este $zodie.</p>";
    
}else{
    echo"Date eronate.";
    }
}
?>
</body>
</html>