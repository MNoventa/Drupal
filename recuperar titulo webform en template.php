<?php
	
	//Drupal 8
		//Recuperar titulo formulario webform

		function THEMENAME_preprocess_webform(&$variables){
		  $variables_id = $variables["element"]["#webform_id"];
		  $variables_form_actual = \Drupal\webform\Entity\Webform::load($variables_id);
		  $variables["titleformu"] = $variables_form_actual->label();
		}

?>
