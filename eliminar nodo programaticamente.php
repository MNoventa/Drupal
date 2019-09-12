<?php
	
	//Borrar nodo con el id 2

	$nodo = node_load(2);
	$nodo->delete();

?>