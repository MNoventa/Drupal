<!--
	Inspeccionar nodo (en este caso el que tiene la id 1) con devel.
	- localizacion devel / url: localhost/nombresitio/devel/php (para direccionar a esta url, se debe instalar modulo devel + devel php debido a que ha habido una actualización)
-->

<?php

	$nodoactual = node_load(1);

	//toda la información del nodo con el id 1
	ksm($nodoactual);

	//como es un objeto, para saber el valor de su titulo:
	ksm($nodoactual->get('title')->value);
	
	//para saber el id:
	ksm($nodoactual->id());
	ksm($nodoactual->get('nid')->value);

	//para saber su bundle (subtipo):
	ksm($nodoactual->bundle());

	//para saber si es nuevo:
	ksm($nodoactual->isNew());

	//para saber su titulo:
	ksm($nodoactual->label());

	//para saber su url:
	ksm($nodoactual->url());

	//saber contenido campo referenciado:
	ksm($nodoactual->get('uid')->target_id);

	//clonar nodo
	$nododuplicado = $nodoactual->createDuplicate();
	ksm($nododuplicado);
?>