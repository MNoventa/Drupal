<?php

	$nodoactual = node_load(1);

	$nodoactual->get('title')->value = "nuevo titulo";
	$nodoactual->get('body')->value = "nuevo body";
	$nodoactual->get('uid')->target_id = 0;

	//los cambios no se verán afectados en el nodo hasta que no se hayan guardado:

	$nodeactual->save();

?>