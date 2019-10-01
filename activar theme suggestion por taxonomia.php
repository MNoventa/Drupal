<?php

	//Drupal 8

		// En la taxonimia: Gestionar presentación -> Opciones de presentación personalizada -> Gestionar modos de vista -> Añadir una nueva modo de vista de Taxonomy term. 
		// Volver a taxonomia: Gestionar presentación -> Opciones de presentación personalizada -> Seleccionar el modo de vista creado anteriormente
		// En el nodo: Poner el campo del termino de taxonomia como 'Entidad representada', click en configuración y seleccionar modo de vista 'Teaser', por ejemplo.
		//Después de lo anterior, en THEMENAME.theme:
		
		/**
		 * Implements hook_theme_suggestions_taxonomy_term_alter().
		 */
		function THEMENAME_theme_suggestions_taxonomy_term_alter(array &$suggestions, array $variables) {
		  /** @var \Drupal\taxonomy\TermInterface $term */
		  $term = $variables['elements']['#taxonomy_term'];
		  $sanitized_view_mode = strtr($variables['elements']['#view_mode'], '.', '_');
		  // Add view mode theme suggestions.
		  $suggestions[] = 'taxonomy_term__' . $sanitized_view_mode;
		  $suggestions[] = 'taxonomy_term__' . $term->bundle() . '__' . $sanitized_view_mode;
		  $suggestions[] = 'taxonomy_term__' . $term->id() . '__' . $sanitized_view_mode;
		}
?>