<?php
	
	//Recuperar archivo json desde el modulo Drupal 8

	function MODULENAME_preprocess_html() {
		$path = drupal_get_path('module', 'MODULENAME') . '/FILE_NAMEtxt';

		if(file_exists($path)) {
			$file = file_get_contents($path);
			$json_array = json_decode($file, true);
			kint($json_array);
		} 
	}
?>