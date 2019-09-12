<?php
	
	//Drupal 8

		//Comprobar si un campo existe en un tipo de contenido

			{% if content.field %}

		//Comprobar si un campo existe y además tiene valor

			{% if content.field and content.field|render %}	

?>