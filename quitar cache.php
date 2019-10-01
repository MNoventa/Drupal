<?php
	
	//Drupal 8

		//default.settings.php
			//Descomentar todo lo que tenga cache
		//settings.php
			//Incluir al final del código:
				if (file_exists($app_root . '/' . $site_path . '/settings.local.php')) {
  					include $app_root . '/' . $site_path . '/settings.local.php';
  				}
?>