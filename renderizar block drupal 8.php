<?php

	//Renderizar bloque QUE ESTÁ COLOCADO EN UNA REGIÓN

	{{ drupal_entity('block_content', *id del bloque*) }}

		//Ejemplo (renderizar bloque con ID 13:

		{{ drupal_entity('block_content', 13 }}



	//Renderizar bloque QUE NO ESTÁ COLOCADO EN UNA REGIÓN

		//Código siguiente se escribe en el preprocess de la template donde queremos que esté el bloque (si el bloque debe estar en el html, se pone en THEMENAME_preprocess_html)

			//Se carga el bloque pasandole la id (en este caso, id = 9)
		  $block = \Drupal\block_content\Entity\BlockContent::load(9);
		  
		  //Se prepara para renderizar
		  $render = \Drupal::entityTypeManager()->getViewBuilder('block_content')->view($block);
		  $variables['test_bloque'] = \Drupal::service('renderer')->renderRoot($render);

		  //En la template donde queremos renderizar el bloque se llama al bloque(con el nombre que la hayamos puesto -en este caso test_bloque- con twig tweak)
		  {{ test_bloque }} 
?>