<?php
	
	//Recuperar la url relativa de un archivo en Drupal 8
			
			//Con file_url()

				file_url(content.field_fondo.0['#item'].entity.uri.value);
				
				//Resultado: /sites/default/files/2019-05/Modulo_2_apadrina_F41556.jpg	


			//Sin file_url()

				content.field_fondo.0['#item'].entity.uri.value;

				//Resultado: public://2019-05/Modulo_2_apadrina_F41556.jpg

	//Recuperar la url relativa de un archivo en Drupal 7

			//Con file_create_url

				file_create_url($row->field_field_imatge['0']['raw']['uri']);
				
				//Resultado: http://coacdev.drautadev.com/sites/default/files/foto-vestibul-1080-marca.png	


			//Sin file_create_url

				$row->field_field_imatge['0']['raw']['uri'];

				//Resultado: public://foto-vestibul-1080-marca.png
	

?>