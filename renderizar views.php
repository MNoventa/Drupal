<!-- 
	Renderizar vistas o views en drupal. Por ejemplo, printar vista de tipo bloque en un lugar del tpl
 -->

<?php
    $view = views_get_view('especificas nombre del view *view-taxonomy*');
    $view->set_display('especificas de que tipo es *block*');

    //Se le hace una preview antes de renderizarla
    $view->preview();
    $view->render();
?> 
