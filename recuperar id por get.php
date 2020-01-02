<?php
	
	//Recuperar id del nodo desde otra template Drupal 8
		
		//Desde template del nodo:

			<a href="{{ path('entity.node.canonical', {'node': 12}) }}?product={{ node.id }}">{% trans %}Contact{% endtrans %}</a>

		//Desde preprocess:

			if(isset($_GET['product'])){    
		    $node_id = $_GET['product'];
		    
		    $view_builder = \Drupal::entityTypeManager()->getViewBuilder('node');
		    $storage = \Drupal::entityTypeManager()->getStorage('node');
		    $entity_load = $storage->load($node_id);
		    
		    if(!empty($entity_load)) {
		      $build = $view_builder->view($entity_load, 'interior');
		      $output = render($build);
		      
		      $variables['nodeprod'] = $output;
		    } 
		  }
?>
