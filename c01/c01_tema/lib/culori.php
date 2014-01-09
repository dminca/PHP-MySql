<?php
$colors = array(
'ANTIQUE WHITE' => '#FAEBD7',
'AQUA' => '#00FFFF',
'AQUAMARINE' => '#7FFFD4',
'AZURE' => '#F0FFFF',
'BEIGE' => '#F5F5DC',
'BISQUE' => '#FFE4C4',
'BLACK' => '#000000',
'BLANCHED ALMOND' => '#FFEBCD',
'BLUE' => '#0000FF',
'BLUE VIOLET' => '#8A2BE2',
'BROWN' => '#A52A2A',
'BURLY WOOD' => '#DEB887',
'CADET BLUE' => '#5F9EA0',
'CHARTREUSE' => '#7FFF00',
'CHOCOLATE' => '#D2691E',
'CORAL' => '#FF7F50',
'CORN FLOWER BLUE' => '#6495ED',
'CORN SILK' => '#FFF8DC',
'CRIMSON' => '#DC143C',
'CYAN' => '#00FFFF',
'DARK BLUE' => '#00008B',
'DARK CYAN' => '#008B8B',
'DARK GOLDENROD' => '#B8860B',
'DARK GRAY' => '#A9A9A9',
'DARK GREEN' => '#006400',
'DARK KHAKI' => '#BDB76B',
'DARK MAGENTA' => '#8B008B',
'DARK OLIVE GREEN' => '#556B2F',
'DARK ORANGE' => '#FF8C00',
'DARK ORCHID' => '#9932CC',
'DARK RED' => '#8B0000',
'DARK SALMON' => '#E9967A',
'DARK SEA GREEN' => '#8FBC8F',
'DARK SLATE BLUE' => '#483D8B',
'DARK SLATE GRAY' => '#2F4F4F',
'DARK TURQUOISE' => '#00CED1',
'DARK VIOLET' => '#9400D4',
'DEEP PINK' => '#FF1493',
'DEEP SKY BLUE' => '#00BFFF',
'DULL GRAY' => '#696969',
'DODGER BLUE' => '#1E90FF',
'FIRE BRICK' => '#B22222',
'FLORAL WHITE' => '#FFFAF0',
'FOREST GREEN' => '#228B22',
'FUCHSIA' => '#FF00FF',
'GAINSBORO' => '#DCDCDC',
'GHOST WHITE' => '#F8F8FF',
'GOLD' => '#FFD700',
'GOLDENROD' => '#DAA520',
'GRAY' => '#808080',
'GREEN' => '#008000',
'GREEN YELLOW' => '#ADFF2F',
'HONEYDEW' => '#F0FFF0',
'HOT PINK' => '#FF69B4',
'INDIAN RED' => '#CD5C5C',
'INDIGO' => '#4B0082',
'IVORY' => '#FFFFF0',
'KHAKI' => '#F0E68C',
'LAVENDER' => '#E6E6FA',
'LAVENDER BLUSH' => '#FFF0F5',
'LEAF' => '	#6B8E23',
'LEMON CHIFFON' => '#FFFACD',
'LIGHT BLUE' => '#ADD8E6',
'LIGHT CORAL' => '#F08080',
'LIGHT CYAN' => '#E0FFFF',
'LIGHT GOLDENROD YELLOW' => '#FAFAD2',
'LIGHT GREEN' => '#90EE90',
'LIGHT GRAY' => '#D3D3D3',
'LIGHT PINK' => '#FF86C1',
'LIGHT SALMON' => '#FFA07A',
'LIGHT SEA GREEN' => '#20B2AA',
'LIGHT SKY BLUE' => '#87CEFA',
'LIGHT STEEL BLUE' => '#778899',
'LIGHT YELLOW' => '#FFFFE0',
'LIME' => '#00FF00',
'LIME GREEN' => '#32CD32',
'LINEN' => '#FAF0E6',
'MAGENTA' => '#FF00FF',
'MAROON' => '#800000',
'MEDIUM AQUA MARINE' => '#66CDAA',
'MEDIUM BLUE' => '#0000CD',
'MEDIUM ORCHID' => '#BA55D3',
'MEDIUM PURPLE' => '#9370DB',
'MEDIUM SEA GREEN' => '#3CB371',
'MEDIUM SLATE BLUE' => '#7B68EE',
'MEDIUM SPRING BLUE' => '#00FA9A',
'MEDIUM TURQUOISE' => '#48D1CC',
'MEDIUM VIOLET RED' => '#C71585',
'MIDNIGHT BLUE' => '#191970',
'MINT CREAM' => '#F5FFFA',
'MISTY ROSE' => '#FFE4E1',
'NAVAJO WHITE' => '#FFDEAD',
'NAVY' => '#000080',
'OLD LACE' => '#FDF5E6',
'OLIVE' => '#808000',
'ORANGE' => '#FFA500',
'ORANGE RED' => '#FF4500',
'ORCHID' => '#DA70D6',
'PALE GOLDENROD' => '#EEE8AA',
'PALE GREEN' => '#98FB98',
'PALE TURQUOISE' => '#AFEEEE',
'PALE VIOLET RED' => '#DB7093',
'PAPAYAWHIP' => '#FFEFD5',
'PEACH PUFF' => '#FFDAB9',
'PERU' => '#CD853F',
'PINK' => '#FFC0CB',
'PLUM' => '#DDA0DD',
'POWDER BLUE' => '#B0E0E6',
'PURPLE' => '#800080',
'RED' => '#FF0000',
'ROSY BROWN' => '#BC8F8F',
'ROYAL BLUE' => '#4169E1',
'SADDLE BROWN' => '#8B4513',
'SALMON' => '#FA8072',
'SANDY BROWN' => '#F4A460',
'SEA GREEN' => '#2E8B57',
'SEASHELL' => '#FFF5EE',
'SIENNA' => '#A0522D',
'SILVER' => '#C0C0C0',
'SKY BLUE' => '#87CEEB',
'SLATE BLUE' => '#6A5ACD',
'SLATE GRAY' => '#708090',
'SNOW' => '#FFFAFA',
'SPRING GREEN' => '#00FF7F',
'STEEL BLUE' => '#4682B4',
'TAN' => '#D2B48C',
'TEAL' => '#008080',
'THISTLE' => '#D88FD8',
'TOMATO' => '#FF6347',
'TURQUOISE' => '#40E0D0',
'VIOLET' => '#EE82EE',
'WHEAT' => '#F5DEB3',
'WHITE' => '#FFFFFF',
'WHITE SMOKE' => '#F5F5F5',
'YELLOW' => '#FFFF00',
'YELLOW GREEN' => '#9ACD32');

/**
 * color functions
	==== WARNING! ====
 The following functions only generate <option values>...
 * @return void
 * @author 
 **/

//print_r($colors); #debug
function colorBg($array){
	// pass trough array
    foreach ($array as $key => $value) {
        echo "<option value=\"$key\">$key</option>"; 
    }
}

function colorTxt($array){        
        // pass trough array
    foreach ($array as $key => $value) {
        echo "<option value=\"$key\">$key</option>"; 
    }
}

# debug 
//colorBg($colors,'bg');
//colorTxt($colors,'text');
?>