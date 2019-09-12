<?php
	
	//creamos entidad de tipo nodo

	$nodo = entity_create('node', array(

	//asignamos valores en la array

		'title' => 'titulo creado',
		'body' => 'body creado',
		'type' => 'article',
		'uid' => 1

	));

	//guardamos cambios

	$nodo->save();

?>