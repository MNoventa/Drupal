<?php
	
	//Drupal 8

		//Recuperar todos los nodos de un tipo de contenido con query sql

			$node_type = "espectacle";
	    $nids = array();
	    
	    $result = db_query("SELECT nid FROM node WHERE type = :nodeType ", array(':nodeType'=>$node_type));
	    
	    foreach ($result as $obj) {
	      $nids[] = $obj->nid;
	    }

	    foreach ($nids as $key => $nodeid) { 
	    	$node = Node::load($nodeid);
	    } 

?>    	