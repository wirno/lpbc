<?php 

// fonction pour parser les coordonnée de la bdd, pour garder que les chiffres.
function DMStoDD($input){
	$long = array();
	$lat = array();
	$str = "";
	// on parcours la string coordonnee
	for ($i=0; $i <strlen($input) ; $i++){ 
		// on detect si la lettre est un chiffre ou un point(pour le decimal)
		if(is_numeric($input[$i]) || $input[$i] == "."){
				// ajout dans une chaine de caractère.
			$str.= $input[$i];
		}
		// si c'est pas un chiffre ou un point.
		else{
			// ajout du dernier nombre de la chaine au tableau.
			if(is_numeric($str) && sizeof($long) == 2) {
				$long[] = $str;
				$str="";
			}
			// on fait gaffe qu'on sorte pas de la chaine et que si le prochain caractère est un chiffre(on se situe en dehors des chiffre a ce moment la), on ajout la chaine a un tableau. 
			elseif( $i+1<strlen($input) &&(is_numeric($input[$i+1])) ){
				if(sizeof($lat) ==3){
					$long[] = $str;
				}
				else{
					$lat[] = $str;
				}
				$str="";
			}
		}
	}
	$return_statement = array();
	$return_statement['lat'] = $lat;
	$return_statement['long'] = $long;

	return $return_statement;
}

function convertDMStoDD($array)
{
	$deg = $array[0];
	$min = $array[1];
	$sec = $array[2];
	
    // Converting DMS ( Degrees / minutes / seconds ) to decimal format
	return $deg+((($min*60)+($sec))/3600);
}
