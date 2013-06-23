<?php  
Class Data{
	public static function get_mes_extenso( $mes ){
	  	switch ($mes) {
		    case '01':
		        return "janeiro";
		      break;
		    case '02':
		        return "fevereiro";
		      break;  
		    case '03':
		        return "março";
		      break;
		    case '04':
		        return "abril";
		      break;
		    case '05':
		        return "maio";
		      break;
		    case '06':
		        return "junho";
		      break;
		    case '07':
		        return "julho";
		      break;
		    case '08':
		        return "agosto";
		      break;
		    case '09':
		        return "setembro";
		      break;
		    case '10':
		        return "outubro";
		      break;
		     case '11':
		        return "novembro";
		      break;
		    case '12':
		        return "dezembro";
		      break; 
	  	}
	}

	public static function get_array_data( $data ){
		$retorno = array();
		$auxiliar = explode("-", $data );
		$retorno["dia"] = $auxiliar[2];
		$retorno["mes"] = $auxiliar[1];
		$retorno["ano"] = $auxiliar[0];
		return $retorno; 
	}

	public static function get_editais_concluidos( $metaKey, $status = "", $numeroDeRetornos ){
	  	global $wpdb;

	  	$criterio = ">=";
	  	if( $status == "concluido" ) {
	  		$criterio = "<";
	  	} 

	  	$queryCursos = "  
	              SELECT p.ID, p.post_title,pm.meta_value
	              FROM $wpdb->postmeta pm
	              INNER JOIN $wpdb->posts p ON p.ID = pm.post_id 
	              AND pm.meta_key = '$metaKey'
	              AND pm.meta_value $criterio NOW()
	              AND p.post_status = 'publish'   
	              LIMIT 0,$numeroDeRetornos
	                  ";
	  	$results = $wpdb->get_results( $queryCursos, OBJECT);
	  	return $results;
	}
}
?>