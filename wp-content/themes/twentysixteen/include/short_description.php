<?php 
function get_short_description($text, $firstValue, $secondValue){
	$i = 0;
	$str ="";
	$full = true;
	while ($full) {
		$str.=$text[$i];
		if(($i>= $firstValue && $i<=$secondValue) && ($text[$i] == "." || $text[$i+1] ==",")) {
			$full = false;
		}
		elseif($i > $secondValue && $text[$i+1] == " ") {
			$full = false;
		}
		$i+=1;
	}
	return $str;
}
?>