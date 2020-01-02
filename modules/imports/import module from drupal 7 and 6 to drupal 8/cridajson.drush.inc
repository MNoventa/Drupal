<?php 

	function cridajson_drush_command() {
	   $items = array();

	   $items['migration-mongo'] = [
	     'description' => 'Migration mongo',
	     'aliases' => ['mig:mon'],
	   ];
	 
   		return $items;
  	}


  	function drush_cridajson_migration_mongo() {
  		print("Me ejecuto?");
  		$retorno =  \Drupal::service('cridajson.custom_import')->import_nodes_from_api();
  		print($retorno);
  	}