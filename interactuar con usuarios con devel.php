<?php
	
	//Buscar usuario con el id 1

	use Drupal\user\Entity\User;

	$usuario = User::load(1);

		/*Forma resumida:
		
			use Drupal\user\Entity\User::load(1);
		*/

	//Buscar usuario logueado actualmente

	$usuario = Drupal::currentUser();


	//Buscar ID usuario logueado actualmente

	$usuario = Drupal::currentUser()->id();

	//Información sobre el usuario:

	use Drupal\user\Entity\User;

	$usuario = User::load(1);

	ksm($usuario);

		//Saber nombre
		ksm($usuario->get("name")->value);
		//Saber roles (en el caso de que se sepa los roles que el usuario tiene se hace como se muestra más abajo (solo dos roles). Sino, se debe hacer un bucle para podere encontrarlos)
		ksm($usuario->get("roles")[0]->target_id);
		ksm($usuario->get("roles")[1]->target_id);

	//Editar usuario:

	use Drupal\user\Entity\User;

	$usuario = User::load(1);

	$usuario->get("name")->value = 'Mariano';
	$usuario->get("mail")->value = 'mariano@mariano.com';

	$usuario->save();

	//Crear usuario:

	$usuario = entity_create('user', array(

	'name' => 'Prueba',
	'mail' => 'a@a.com',
	'status' => 1 //para que esté como activo

	));

	$usuario -> save();

	//Eliminar usuario (se borrará usuario con el id 2):

	use Drupal\user\Entity\User;

	$usuario = User::load(2);

	$usuario -> delete();

?>