<?php
	
	//Incluir template pasando parametros en Drupal 8
		
		//Template principal:

			{% include '@THEMENAME/includes/block/MYTEMPLATE' with {
					'frase': 'something', 
					'img': 'something',	 
				} 
			%}

			//Template incluida:
				//Opcion 1:
				{% if attribute(content, frase) is defined %}
					{{ attribute(content, frase).0 }}
				{% endif %}
				//Opcion 2:
				{% if frase|render %}
					{{ frase }}
				{% endif %}
	
?>
