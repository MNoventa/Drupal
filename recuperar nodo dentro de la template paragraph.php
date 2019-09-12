<?php
	
	//Drupal 7
		//Obtener información del nodo donde pertenece un paragraph, dentro de la template de paragraph

		$paragraphs_item->hostEntity();

			//Ejemplo: queremos recuperar la información del campo 'casa', que está en el nodo donde también está el paragraph

			$paragraphs_item->hostEntity()->field_casa['und']['0']['tid']

?>