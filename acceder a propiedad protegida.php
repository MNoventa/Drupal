
<?php
	
	//Acceder a campo protected en un paragraph en Drupal 8
		
		{{ kint(content.field_catalogo.0['#paragraph'].field_imagen.entity.uri.getValue.0.value) }}

?>