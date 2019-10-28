<?php
	
	//Drupal 7

		//Limitar numero de caracteres y añadir puntos suspensivos

		$texto_limitado = truncate_utf8(preg_replace( "/\r|\n/", "", strip_tags($result->field_field_text[0]['raw']['value'])), 400, TRUE, TRUE);

?>