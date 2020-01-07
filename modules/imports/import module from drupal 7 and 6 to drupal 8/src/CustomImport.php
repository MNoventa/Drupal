<?php
use Drupal\node\Entity\Node;
use Drupal\file\Entity\File;
namespace Drupal\cridajson;

/**
 * Class CustomService.
 */
class CustomImport {
  public function import_videos(){
    // Importar videos del D6 al D8

    $path = drupal_get_path('module', 'cridajson') . '/content_field_video.txt';

    if(file_exists($path)) {
      $file = file_get_contents($path);
      $json_array = json_decode($file, true);
      $rows = $json_array[2]['data'];

      foreach ($rows as $key => $position) {
          $nid = $position['nid'];
          $videourl = $position['field_video_embed'];
          $node = Node::load($nid);

          if($node->bundle() == 'espectacle'){
            $field_video = 'field_espectacle_video';
          }elseif($node->bundle() == 'edicio'){
            $field_video = 'field_edicio_video';
          }
          
          $node->set($field_video, $videourl);
          $node->save();
          kint($node->getFieldDefinitions());
      } 
    }
  }

  public function import_translates(){
    // Importar traduccions del D6 al D8
   
    $node_type = "espectacle";
    $result = db_query("SELECT nid FROM node WHERE type = :nodeType ", array(':nodeType'=>$node_type));

    $nids = array();
    foreach ($result as $obj) {
      $nids[] = $obj->nid;
    }

    $contador = 0;
    $contador_total = 0;
    $array_nids = array();

    foreach ($nids as $key => $nodeid) { 
        $node = Node::load($nodeid);

        try {
          $title = ($node->title->getValue()[0]['value'] != NULL) ? $node->title->getValue()[0]['value'] : '';
          $field_alarma = ($node->field_alarma->getValue()[0]['value'] != NULL) ? $node->field_alarma->getValue()[0]['value'] : '';
          $field_artistes_fa = $node->field_artistes_fa->getValue();
          $field_artistes_fa_array = array();
          foreach ($field_artistes_fa as $key => $value) {
            $field_artistes_fa_array[] = ($node->field_artistes_fa->getValue()[$key]['value'] != NULL) ? $node->field_artistes_fa->getValue()[$key]['value'] : '';
          }
          $field_artistes_fa2 = $node->field_artistes_fa2->getValue();
          $field_artistes_fa_array_2 = array();
          foreach ($field_artistes_fa2 as $key => $value) {
            $field_artistes_fa_array_2[] = ($node->field_artistes_fa2->getValue()[$key]['value'] != NULL) ? $node->field_artistes_fa2->getValue()[$key]['value'] : '';
          }        
          $field_artistes_fa3 = $node->field_artistes_fa3->getValue();
          $field_artistes_fa_array_3 = array();
          foreach ($field_artistes_fa3 as $key => $value) {
            $field_artistes_fa_array_3[] = ($node->field_artistes_fa3->getValue()[$key]['value'] != NULL) ? $node->field_artistes_fa3->getValue()[$key]['value'] : '';
          }
          $field_artistes_fa4 = $node->field_artistes_fa4->getValue();
          $field_artistes_fa_array_4 = array();
          foreach ($field_artistes_fa4 as $key => $value) {
            $field_artistes_fa_array_4[] = ($node->field_artistes_fa4->getValue()[$key]['value'] != NULL) ? $node->field_artistes_fa4->getValue()[$key]['value'] : '';
          }
          $field_artistes_fa5 = $node->field_artistes_fa5->getValue();
          $field_artistes_fa_array_5 = array();
          foreach ($field_artistes_fa5 as $key => $value) {
            $field_artistes_fa_array_5[] = ($node->field_artistes_fa5->getValue()[$key]['value'] != NULL) ? $node->field_artistes_fa5->getValue()[$key]['value'] : '';
          }                     

          $field_artistes_fa_6 = $node->field_artistes_fa_6->getValue();
          $field_artistes_fa_6_array = array();
          foreach ($field_artistes_fa_6 as $key => $value) {
            $field_artistes_fa_6_array[] = ($node->field_artistes_fa_6->getValue()[$key]['value'] != NULL) ? $node->field_artistes_fa_6->getValue()[$key]['value'] : '';
          }

          $field_artistes_fa_7 = $node->field_artistes_fa_7->getValue();
          $field_artistes_fa_7_array = array();
          foreach ($field_artistes_fa_7 as $key => $value) {
            $field_artistes_fa_7_array[] = ($node->field_artistes_fa_7->getValue()[$key]['value'] != NULL) ? $node->field_artistes_fa_7->getValue()[$key]['value'] : '';
          }       
          $field_audio = ($node->field_audio->getValue()[0]['value'] != NULL) ? $node->field_audio->getValue()[0]['value'] : '';
          $field_autor = ($node->field_autor->getValue()[0]['value'] != NULL) ? $node->field_autor->getValue()[0]['value'] : '';
          $field_companyia = ($node->field_companyia->getValue()[0]['value'] != NULL) ? $node->field_companyia->getValue()[0]['value'] : '';
          $field_dates_espectacle = ($node->field_dates_espectacle->getValue()[0]['value'] != NULL) ? $node->field_dates_espectacle->getValue()[0]['value'] : '';
          $field_desc_idioma_en = ($node->field_desc_idioma_en->getValue()[0]['value'] != NULL) ? $node->field_desc_idioma_en->getValue()[0]['value'] : '';
          $field_desc_idioma_es = ($node->field_desc_idioma_es->getValue()[0]['value'] != NULL) ? $node->field_desc_idioma_es->getValue()[0]['value'] : '';
          $field_documents = ($node->field_documents->getValue()[0]['value'] != NULL) ? $node->field_documents->getValue()[0]['value'] : '';
          $field_edicio = ($node->field_edicio->getValue()[0]['target_id'] != NULL) ? $node->field_edicio->getValue()[0]['target_id'] : '';

          $field_espai = ($node->field_espai->entity->nid->getValue()[0]['value'] != NULL) ? $node->field_espai->entity->nid->getValue()[0]['value'] : '';
          $field_espectacle_video = ($node->field_espectacle_video->getValue()[0]['value'] != NULL) ? $node->field_espectacle_video->getValue()[0]['value'] : '';
          $field_genere = ($node->field_genere->getValue()[0]['value'] != NULL) ? $node->field_genere->getValue()[0]['value'] : '';
          $field_id_ext = ($node->field_id_ext->getValue()[0]['value'] != NULL) ? $node->field_id_ext->getValue()[0]['value'] : '';
          $field_idioma = ($node->field_idioma->getValue()[0]['value'] != NULL) ? $node->field_idioma->getValue()[0]['value'] : '';

          $field_images_array = array();

          for($i = 0; $i < $node->field_images->count(); $i++){
            $field_images = $node->field_images[$i]->entity->getFileUri();
            $data = file_get_contents($field_images);
            $file = file_save_data($data, 'public://' . substr($node->field_images[$i]->entity->getFileUri(), 31), FILE_EXISTS_REPLACE);
            $field_images_array[$i]['target_id'] = $file->id();
          }
          $field_marc = ($node->field_marc->getValue()[0]['value'] != NULL) ? $node->field_marc->getValue()[0]['value'] : '';
          $field_mes_grec = ($node->field_mes_grec->getValue()[0]['value'] != NULL) ? $node->field_mes_grec->getValue()[0]['value'] : '';
          $field_mes_informacio = ($node->field_mes_informacio->getValue()[0]['value'] != NULL) ? $node->field_mes_informacio->getValue()[0]['value'] : '';
          $field_mes_informacio_en = ($node->field_mes_informacio_en->getValue()[0]['value'] != NULL) ? $node->field_mes_informacio_en->getValue()[0]['value'] : '';
          $field_mes_informacio_es = ($node->field_mes_informacio_es->getValue()[0]['value'] != NULL) ? $node->field_mes_informacio_es->getValue()[0]['value'] : '';
          $field_nota_peu = ($node->field_nota_peu->getValue()[0]['value'] != NULL) ? $node->field_nota_peu->getValue()[0]['value'] : '';
          $field_nota_peu_en = ($node->field_nota_peu_en->getValue()[0]['value'] != NULL) ? $node->field_nota_peu_en->getValue()[0]['value'] : '';
          $field_nota_peu_es = ($node->field_nota_peu_es->getValue()[0]['value'] != NULL) ? $node->field_nota_peu_es->getValue()[0]['value'] : '';
          $field_observacions_espectacle = ($node->field_observacions_espectacle->getValue()[0]['value'] != NULL) ? $node->field_observacions_espectacle->getValue()[0]['value'] : '';
          $field_observacions_espectacle_en = ($node->field_observacions_espectacle_en->getValue()[0]['value'] != NULL) ? $node->field_observacions_espectacle_en->getValue()[0]['value'] : '';
          $field_observacions_espectacle_es = ($node->field_observacions_espectacle_es->getValue()[0]['value'] != NULL) ? $node->field_observacions_espectacle_es->getValue()[0]['value'] : '';
          
          if($node->field_programa->entity != NULL){
            $field_programa = $node->field_programa->entity->getFileUri();
            $data = file_get_contents($field_programa);
            $file = file_save_data($data, 'public://' . substr($node->field_programa->entity->getFileUri(), 31), FILE_EXISTS_REPLACE);
            $field_programa = [];
            $field_programa[0]['target_id'] = $file->id();
          }else{
            $field_programa = '';
          }

          $field_programa_text = ($node->field_programa_text->getValue()[0]['value'] != NULL) ? $node->field_programa_text->getValue()[0]['value'] : '';
          $field_programa_text_en = ($node->field_programa_text_en->getValue()[0]['value'] != NULL) ? $node->field_programa_text_en->getValue()[0]['value'] : '';
          $field_programa_text_es = ($node->field_programa_text_es->getValue()[0]['value'] != NULL) ? $node->field_programa_text_es->getValue()[0]['value'] : '';
          $field_tipus_espectacle = ($node->field_tipus_espectacle->getValue()[0]['value'] != NULL) ? $node->field_tipus_espectacle->getValue()[0]['value'] : '';
          $field_titol_fa = ($node->field_titol_fa->getValue()[0]['value'] != NULL) ? $node->field_titol_fa->getValue()[0]['value'] : '';
          $field_titol_fa2 = ($node->field_titol_fa2->getValue()[0]['value'] != NULL) ? $node->field_titol_fa2->getValue()[0]['value'] : '';
          $field_titol_fa3 = ($node->field_titol_fa3->getValue()[0]['value'] != NULL) ? $node->field_titol_fa3->getValue()[0]['value'] : '';
          $field_titol_fa4 = ($node->field_titol_fa4->getValue()[0]['value'] != NULL) ? $node->field_titol_fa4->getValue()[0]['value'] : '';
          $field_titol_fa5 = ($node->field_titol_fa5->getValue()[0]['value'] != NULL) ? $node->field_titol_fa5->getValue()[0]['value'] : '';
          $field_titol_fa6 = ($node->field_titol_fa6->getValue()[0]['value'] != NULL) ? $node->field_titol_fa6->getValue()[0]['value'] : '';
          $field_titol_fa_7 = ($node->field_titol_fa_7->getValue()[0]['value'] != NULL) ? $node->field_titol_fa_7->getValue()[0]['value'] : ''; 
          $field_espectacle_disciplina = ($node->field_espectacle_disciplina->getValue()[0]['target_id'] != '') ? $node->field_espectacle_disciplina->getValue()[0]['target_id'] : 0; 
          $field_rol_fa = ($node->field_rol_fa->getValue() != '') ? $node->field_rol_fa->getValue() : '';
          $field_rol_fa2 = ($node->field_rol_fa2->getValue() != '') ? $node->field_rol_fa2->getValue() : '';
          $field_rol_fa3 = ($node->field_rol_fa3->getValue() != '') ? $node->field_rol_fa3->getValue() : '';
          $field_rol_fa4 = ($node->field_rol_fa4->getValue() != '') ? $node->field_rol_fa4->getValue() : '';
          $field_rol_fa5 = ($node->field_rol_fa5->getValue() != '') ? $node->field_rol_fa5->getValue() : '';
          $field_rol_fa6 = ($node->field_rol_fa6->getValue() != '') ? $node->field_rol_fa6->getValue() : '';
          $field_rol_fa7 = ($node->field_rol_fa7->getValue() != '') ? $node->field_rol_fa7->getValue() : '';
          $field_fitxa_artistica = ($node->field_fitxa_artistica->getValue()[0]['value'] != NULL) ? $node->field_fitxa_artistica->getValue()[0]['value'] : '';
          $field_fitxa_artistica_2 = ($node->field_fitxa_artistica_2->getValue()[0]['value'] != NULL) ? $node->field_fitxa_artistica_2->getValue()[0]['value'] : '';
          $field_fitxa_artistica_3 = ($node->field_fitxa_artistica_3->getValue()[0]['value'] != NULL) ? $node->field_fitxa_artistica_3->getValue()[0]['value'] : '';
          $field_fitxa_artistica_4 = ($node->field_fitxa_artistica_4->getValue()[0]['value'] != NULL) ? $node->field_fitxa_artistica_4->getValue()[0]['value'] : '';
          $field_fitxa_artistica_5 = ($node->field_fitxa_artistica_5->getValue()[0]['value'] != NULL) ? $node->field_fitxa_artistica_5->getValue()[0]['value'] : '';
          $field_fitxa_artistica_6 = ($node->field_fitxa_artistica_6->getValue()[0]['value'] != NULL) ? $node->field_fitxa_artistica_6->getValue()[0]['value'] : '';
          $field_fitxa_artistica_7 = ($node->field_fitxa_artistica_7->getValue()[0]['value'] != NULL) ? $node->field_fitxa_artistica_7->getValue()[0]['value'] : '';
          $array_link = array();
          $array_link['uri'] = ($node->field_links->getValue()[0]['uri'] != NULL) ? $node->field_links->getValue()[0]['uri'] : '';
          $array_link['title'] = ($node->field_links->getValue()[0]['title'] != NULL) ? $node->field_links->getValue()[0]['title'] : '';


          $node_fields = array(
            'title' => $title,
            'field_alarma' => $field_alarma,
            'field_artistes_fa' => $field_artistes_fa_array,
            'field_artistes_fa2' => $field_artistes_fa_array_2,
            'field_artistes_fa3' => $field_artistes_fa_array_3,
            'field_artistes_fa4' => $field_artistes_fa_array_4,
            'field_artistes_fa5' => $field_artistes_fa_array_5,
            'field_artistes_fa_6' => $field_artistes_fa_6_array,
            'field_artistes_fa_7' => $field_artistes_fa_7_array,
            'field_audio' => $field_audio,
            'field_autor' => $field_autor,
            'field_companyia' => $field_companyia,
            'field_dates_espectacle' => $field_dates_espectacle,
            'field_desc_idioma_en' => $field_desc_idioma_en,
            'field_desc_idioma_es' => $field_desc_idioma_es,
            'field_documents' => $field_documents,
            'field_edicio' => $field_edicio,
            'field_espai' => $field_espai,
            'field_espectacle_video' => $field_espectacle_video,
            'field_id_ext' => $field_id_ext,
            'field_idioma' => $field_idioma,
            'field_images' => $field_images_array,
            'field_links' => $field_links,
            'field_mes_informacio' => $field_mes_informacio,
            'field_mes_informacio_en' => $field_mes_informacio_en,
            'field_mes_informacio_es' => $field_mes_informacio_es,
            'field_nota_peu' => $field_nota_peu,
            'field_nota_peu_en' => $field_nota_peu_en,
            'field_nota_peu_es' => $field_nota_peu_es,
            'field_observacions_espectacle' => $field_observacions_espectacle,
            'field_observacions_espectacle_en' => $field_observacions_espectacle_en,
            'field_observacions_espectacle_es' => $field_observacions_espectacle_es,
            'field_programa' => $field_programa,
            'field_programa_text' => $field_programa_text,
            'field_programa_text_en' => $field_programa_text_en,
            'field_programa_text_es' => $field_programa_text_es,          
            'field_titol_fa' => $field_titol_fa,
            'field_titol_fa2' => $field_titol_fa2,
            'field_titol_fa3' => $field_titol_fa3,
            'field_titol_fa4' => $field_titol_fa4,
            'field_titol_fa5' => $field_titol_fa5,
            'field_titol_fa6' => $field_titol_fa6,
            'field_titol_fa_7' => $field_titol_fa_7,
            'field_espectacle_disciplina' => $field_espectacle_disciplina,
            'field_rol_fa' => $field_rol_fa,
            'field_rol_fa2' => $field_rol_fa2,
            'field_rol_fa3' => $field_rol_fa3,
            'field_rol_fa4' => $field_rol_fa4,
            'field_rol_fa5' => $field_rol_fa5,
            'field_rol_fa6' => $field_rol_fa6,
            'field_rol_fa7' => $field_rol_fa7,
            'field_fitxa_artistica' => $field_fitxa_artistica,
            'field_fitxa_artistica_2' => $field_fitxa_artistica_2,
            'field_fitxa_artistica_3' => $field_fitxa_artistica_3,
            'field_fitxa_artistica_4' => $field_fitxa_artistica_4,
            'field_fitxa_artistica_5' => $field_fitxa_artistica_5,
            'field_fitxa_artistica_6' => $field_fitxa_artistica_6,
            'field_fitxa_artistica_7' => $field_fitxa_artistica_7,
          );

          // $node->addTranslation('en',
          //   $node_fields
          // )->save();

          if ($node->hasTranslation('en')) {
            $trans = $node->getTranslation('en');
            $trans->set('field_links', $array_link);
            $trans->save();
          }
        
        } catch (Exception $e) {
            echo($key . ' ' . $nodeid . ' ');
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
/*
       if($key < 100){ 
         $node = Node::load($nodeid);
        
         if($node->langcode != 'es'){
           $node->langcode = 'es';
           $node->save();
         }
       }
*/
    }
  }

  
    // Importar files del D6 al D8

  public function return_files($cartell){
    $path = drupal_get_path('module', 'cridajson') . '/files.txt';
    if(file_exists($path)){
      $file = file_get_contents($path);
      $json_array = json_decode($file, true);
      
      $rows = $json_array[2]['data'];

      foreach ($rows as $key => $position) {          
        if($position['fid'] == $cartell){
          return $position['filepath'];
        }
      }
    }
  }

  public function import_files(){

    $path = drupal_get_path('module', 'cridajson') . '/content_field_programa.txt';

    if(file_exists($path)){
      $file = file_get_contents($path);
      $json_array = json_decode($file, true);
      $rows = $json_array[2]['data'];

      foreach ($rows as $key => $position) {
        $nid = $position['nid'];
        $cartell = $position['field_programa_fid'];
        
        if($cartell != NULL){
          $node = Node::load($nid);
          
          $filepath = return_files($cartell);  

          $files = \Drupal::entityTypeManager()
            ->getStorage('file')
            ->loadByProperties(['uri' => $filepath]);
          $file = reset($files);

          if (!$file) {
            $file = File::create([
              'uri' => $filepath,
            ]);
            $file->save();
          }
     
          //$node->field_publicacions->appendItem(array('target_id' => $file->id()));
          
          // $node->field_publicacions[] = [
          //   'target_id' => $file->id(),
          // ];

          if ($node->hasTranslation('en')) {
            $translation = $node->getTranslation('en');
            $translation->field_edicio_programa = [
              'target_id' => $file->id(),
            ];
            $node->save();
           }
         }
      }
    }else{
      kint('No existe');
    }
  }

  public function import_taxonomy(){
    //Importar camp taxonomy rol (espectacles)

    $path = drupal_get_path('module', 'cridajson') . '/content_field_rol_fa_6.txt';
    if(file_exists($path)){
      $file = file_get_contents($path);
      $json_array = json_decode($file, true);

      $rows = $json_array[2]['data'];

      // Rellenar campo rol para todos los nodos de tc espectacle
      foreach ($rows as $key => $position) { 
        $nid = $position['nid'];
        $rol_value = $position['field_rol_fa_6_value'];
        if($rol_value != NULL){
          $node = Node::load($nid);
          $node->field_rol_fa7[] = ['target_id' => $rol_value];
          $node->save();
        }
      }
              
    }else{
      kint('no existe');
    }
  }

  public function set_fitxa_artistica(){
    // Guardar roles y artistas en wysiwyg

    $node_type = "espectacle";
    $result = db_query("SELECT nid FROM node WHERE type = :nodeType ", array(':nodeType'=>$node_type));

    $nids = array();
    foreach ($result as $obj) {
      $nids[] = $obj->nid;
    }

    foreach ($nids as $key => $nodeid) {

      $node = Node::load($nodeid);
      $check_rol = $node->field_rol_fa7->getValue()[0]['target_id'];
      
      if($check_rol != 0){
        $count_rol = $node->field_rol_fa7->count();
        $field_rol = $node->field_rol_fa7;
        $text_array = array();

        foreach ($field_rol as $key => $value) {            
          $tid = $value->getValue()['target_id'];
          $term = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($tid);
          $title_term = $term->name->value;
          
          if($node->field_artistes_fa_7[$key] != NULL){
            $artista = $node->field_artistes_fa_7[$key]->getValue()['value'];
          }

          if($title_term != '' && $artista != ''){
            if($key == $count_rol-1){
              $rol_artista = '<strong>' . $title_term . '</strong>' . ': ' . $artista. '; ';

            }else{
              $rol_artista = '<strong>' . $title_term . '</strong>' . ': ' . $artista;
            }
          }
        
          $text_array[] =  $rol_artista;              
        }
      
        //Cuando NO tiene texto
        if(!empty($text_array)){
          $text_normal = implode('; ', $text_array);
          $node->set('field_fitxa_artistica_7', $text_normal);
          $node->save();
        }
        
        //Cuando YA tiene texto
        /*
        if(!empty($text_array)){
          $text_anterior = $node->field_fitxa_artistica->getValue()[0]['value'];
          $text_normal = implode('; ', $text_array);
          $node->set('field_fitxa_artistica', $text_anterior . $text_normal);
        }
        */
      }
    }
  }
    
  public function import_unlimited_images(){
    // Importació imatges ilimitades nodes espectacles

    $path = drupal_get_path('module', 'cridajson') . '/content_field_images.txt';
    if(file_exists($path)){
      $file = file_get_contents($path);
      $json_array = json_decode($file, true);

      $rows = $json_array[2]['data'];

      foreach ($rows as $key => $position) { 
        $nid = $position['nid'];
        $fid = $position['field_images_fid'];
        $data = $position['field_images_data'];
        
        if($fid != NULL){
          $node = Node::load($nid);
          if($node != NULL && $node->bundle() == 'espectacle' && $nid != 9805){
            $filepath = return_files($fid);       

            $files = \Drupal::entityTypeManager()
              ->getStorage('file')
              ->loadByProperties(['uri' => $filepath]);
            $file = reset($files);

            if (!$file) {
              $file = File::create([
                'uri' => $filepath,
              ]); 
              $file->save();
            }
            
            $node->field_images[] = [
              'target_id' => $file->id(),
            ];

            $node->save();
          }
        }  
      }                
    }else{
      kint('no existe');
    }
  }

  public function import_discipline(){
    // Importació camp genere per disciplina

    $path = drupal_get_path('module', 'cridajson') . '/term_node.txt';
    if(file_exists($path)){
      $file = file_get_contents($path);
      $json_array = json_decode($file, true);

      $rows = $json_array[2]['data'];

      $contador = 0;

      foreach ($rows as $key => $position) { 
        $nid = $position['nid'];
        $tid = $position['tid'];
        $node = Node::load($nid);

        if($node != NULL && $node->bundle() == 'espectacle' && $tid != NULL){
          if($tid == 18821 || $tid == 18820 || $tid == 18596 || $tid == 18597 || $tid == 18425 || $tid == 18143 || $tid == 1836 || $tid == 1839 || $tid == 1837 || $tid == 1838 || $tid == 17857){              

            $tid_final = 0;
          
            if($contador <= 500){            
              if($tid == 1839){
                $tid_final = 18823;

              }elseif($tid == 1837) {
                $tid_final = 18824;

              }elseif($tid == 1838) {
                $tid_final = 18825;

              }elseif($tid == 17857) {
                $tid_final = 18826;

              }else {
                $tid_final = 18822;
              }

              $node->set('field_espectacle_disciplina', $tid_final);
              $node->save();
            }

            $contador++;
          }
        }          
      }
    }
  }

  public function espectacles_without_espai(){
    // Saber quants nodes tc espectacles no tenen posat espai

    $node_type = "espectacle";
    $result = db_query("SELECT nid FROM node WHERE type = :nodeType ", array(':nodeType'=>$node_type));

    $nids = array();
    foreach ($result as $obj) {
      $nids[] = $obj->nid;
    }

    $nids_without_esp = array();
    $contador = 0;

    foreach ($nids as $key => $nodeid) {
      $node = Node::load($nodeid);
      if($node->field_espectacle_disciplina->getValue()[0] == NULL){
        $contador++;
        $nids_without_esp[] = $nodeid;
      }
    } 
  }

  public function import_nodes_from_api(){
    // Importació nodes espectacles amb API JSON del d7

    $file = file_get_contents('http://grec2018.dd:8083/ca/api-json/all');
    $json_array = json_decode($file, true);
    
    foreach ($json_array['content'] as $key => $value) {           
      $file_node = file_get_contents('http://grec2018.dd:8083/ca/api-json/' . $value);
      $json_array_node = json_decode($file_node, true);

      for($i=0; $i<3; $i++){

        $date_array = array();
        foreach ($json_array_node['content'][$i]['field_schedules']['und'] as $key => $value) {
          $date = $value['value'];
          $date_array[$key]['value'] = date('Y-m-d\TH:i:s', strtotime($date));

        }

        $date = $date_array[0]['value'];
        $date_check = date('Y', strtotime($date));
        
        if($date_check == '2018' || $date_check == '2019'){
          $edicio = array();

          if($date_check == '2019'){
            $edicio['target_id'] = 9852;
          }else{
            $edicio['target_id'] = 9767;
          }

          $title = ($json_array_node['content'][$i]['title'] != NULL) ? $json_array_node['content'][$i]['title'] : '';
          $sumary = ($json_array_node['content'][$i]['field_entradeta']['und'][0]['value'] != NULL) ? $json_array_node['content'][$i]['field_entradeta']['und'][0]['value'] : '';
          $body = ($json_array_node['content'][$i]['body']['und'][0]['value'] != NULL) ? $json_array_node['content'][$i]['body']['und'][0]['value'] : '';
          $fartistica = ($json_array_node['content'][$i]['field_fitxa_artistica']['und'][0]['value'] != NULL) ? $json_array_node['content'][$i]['field_fitxa_artistica']['und'][0]['value'] : '';
          $array_link;
          $array_link['uri'] = ($json_array_node['content'][$i]['field_links']['und'][0]['url'] != '') ? $json_array_node['content'][$i]['field_links']['und'][0]['url'] : '';
          $array_link['title'] = ($json_array_node['content'][$i]['field_links']['und'][0]['title'] != '') ? $json_array_node['content'][$i]['field_links']['und'][0]['title'] : '';

          $array_images = array();
          if (!empty($json_array_node['content'][$i]['field_miniatura'])){
            $miniatura_filename = ($json_array_node['content'][$i]['field_miniatura']['und'][0]['uri'] != NULL) ? $json_array_node['content'][$i]['field_miniatura']['und'][0]['uri'] : '';
            $miniatura_filename = str_replace("public://", "",$miniatura_filename);
            $miniatura_path = 'http://grec2018.dd:8083/sites/default/files/' . $miniatura_filename;
            $data = file_get_contents($miniatura_path);
            $file = file_save_data($data, 'public://' . $miniatura_filename, FILE_EXISTS_REPLACE);
            $array_images[0]['target_id'] = $file->id();
          }

          $disciplina = array();
          if(!empty($json_array_node['content'][$i]['field_discipline']['und'][0]['tid'])){
            foreach ($json_array_node['content'][$i]['field_discipline']['und'] as $key => $value) {                            
              switch($json_array_node['content'][$i]['field_discipline']['und'][$key]['tid']){
                case 2: $disciplina_tid = 18823; break;case 4: $disciplina_tid = 18825; break;case 14: $disciplina_tid = 18827; break;case 3: $disciplina_tid = 18824; break;case 5: $disciplina_tid = 18826; break;case 15: $disciplina_tid = 18828; break;
              }

              $disciplina['target_id'] = $disciplina_tid;
            }
          }

          $espai = array();
          if(!empty($json_array_node['content'][$i]['field_space']['und'][0]['target_id'])){
            switch($json_array_node['content'][$i]['field_space']['und'][0]['target_id']){ 
              case 13: $espai_tid = 8793; break; case 15: $espai_tid = 8802; break; case 5124: $espai_tid = 8921; break; case 5144: $espai_tid = 264; break; case 7575: $espai_tid = 8911; break; case 7578: $espai_tid = 8795; break; case 7588: $espai_tid = 8300; break; case 7600: $espai_tid = 8852; break; case 7603: $espai_tid = 320; break; case 7606: $espai_tid = 9771; break; case 7609: $espai_tid = 321; break; case 7612: $espai_tid = 9553; break; case 7615: $espai_tid = 210; break; case 7618: $espai_tid = 8824; break; case 7621: $espai_tid = 8807; break; case 7628: $espai_tid = 323; break; case 7634: $espai_tid = 6538; break; case 7722: $espai_tid = 6863; break; case 7728: $espai_tid = 9469; break; case 7737: $espai_tid = 8868; break; case 7741: $espai_tid = 9516; break; case 7744: $espai_tid = 6492; break; case 7747: $espai_tid = 9512; break; case 7750: $espai_tid = 8884; break; case 9862: $espai_tid = 326; break; case 9865: $espai_tid = 365; break; case 9916: $espai_tid = 7718; break; case 10439: $espai_tid = 8832; break; case 10450: $espai_tid = 8315; break; case 10516: $espai_tid = 333; break; case 10519: $espai_tid = 6542; break; case 10534: $espai_tid = 291; break; case 5149: $espai_tid = 9820; break; case 7581: $espai_tid = 9821; break; case 7591: $espai_tid = 9822; break; case 7594: $espai_tid = 9823; break; case 7597: $espai_tid = 9824; break; case 7631: $espai_tid = 9825; break; case 7734: $espai_tid = 9826; break; case 7756: $espai_tid = 9827; break; case 9853: $espai_tid = 9828; break; case 9856: $espai_tid = 9829; break; case 9859: $espai_tid = 9830; break; case 9870: $espai_tid = 9831; break; case 10433: $espai_tid = 9832; break; case 10436: $espai_tid = 363; break; case 10442: $espai_tid = 9834; break; case 10447: $espai_tid = 9835; break; case 10454: $espai_tid = 9836; break; case 10474: $espai_tid = 9837; break; case 10513: $espai_tid = 9838; break; case 10522: $espai_tid = 9839; break; case 10525: $espai_tid = 9840; break; case 10528: $espai_tid = 9841; break; case 10531: $espai_tid = 9842; break; case 10537: $espai_tid = 9843; break; case 10540: $espai_tid = 9844; break; case 10543: $espai_tid = 9845; break; case 10546: $espai_tid = 9846; break; case 51: $espai_tid = 9819;
            }
            $term = \Drupal\node\Entity\Node::load($espai_tid);
            $espai['target_id'] = $espai_tid;
          }

          $duration = ($json_array_node['content'][$i]['field_duration']['und'][0]['value'] != NULL) ? $json_array_node['content'][$i]['field_duration']['und'][0]['value'] : '';

          $price = '';
          if(!empty($json_array_node['content'][$i]['field_price_rang'])){
            $price = $json_array_node['content'][$i]['field_price_rang']['und'][0]['value'];
          }else if(!empty($json_array_node['content'][$i]['field_price'])){
            $price = $json_array_node['content'][$i]['field_price']['und'][0]['value'];
          }

          $language = ($json_array_node['content'][$i]['field_language']['und'][0]['tid'] != NULL) ? $json_array_node['content'][$i]['field_language']['und'][0]['tid'] : '';
          if($language != NULL && $language != ''){
            switch($language){
              case 27: $language_text = "Alemany"; break; case 62: $language_text = "Alemany amb sobretitulació en català"; break; case 25: $language_text = "Anglès"; break; case 48: $language_text = "Anglès amb sobretitulació en català"; break; case 75: $language_text = "Anglès, francès, alemany, neerlandès i italià amb sobretitulació en català"; break; case 98: $language_text = "Anglès, llengua xona i moltes altres"; break; case 13: $language_text = "Castellà"; break; case 55: $language_text = "Castellà, català, anglès i cantonès, amb sobretitulació en català"; break; case 91: $language_text = "Català i anglès"; break; case 90: $language_text = "Català i castellà"; break; case 89: $language_text = "Català i d'altres llengües"; break; case 96: $language_text = "Català i rus"; break; case 95: $language_text = "Català, castellà i altres llengües"; break; case 92: $language_text = "Català, castellà i italià"; break; case 51: $language_text = "Català, castellà, anglès i italià (amb sobretitulació en castellà"; break; case 76: $language_text = "Català, castellà, anglès i italià (amb sobretitulació en català, castellà i anglès"; break; case 52: $language_text = "Català, castellà, anglès, francès, xinès i alemany (amb sobretitulació en català"; break; case 50: $language_text = "En anglès i en bahasa indonèsia, amb sobretitulació en català"; break; case 60: $language_text = "En llatí, sànscrit, occità, català i castellà"; break; case 87: $language_text = "Espectacle amb textos i cançons en anglès, traduïts parcialment"; break; case 134: $language_text = "Espectacle en castellà i anglès, amb sobretitulació en català, anglès i castellà."; break; case 88: $language_text = "Espectacle en neerlandès amb sobretitulació en català"; break; case 93: $language_text = "Espectacle sense text"; break; case 33: $language_text = "Flamenc"; break; case 26: $language_text = "Francès"; break; case 99: $language_text = "Francès amb sobretitulació en català"; break; case 29: $language_text = "Italià"; break; case 31: $language_text = "Lituà"; break; case 129: $language_text = "Multilingüe amb sobretitulació en català"; break; case 94: $language_text = "Multilingüe amb sobretitulació en català i anglès"; break; case 28: $language_text = "Neerlandès"; break; case 53: $language_text = "Neerlandès i francès amb sobretitulació en català "; break; case 54: $language_text = "Representació en alemany amb sobretitulació en català "; break; case 49: $language_text = "Romaní"; break; case 30: $language_text = "Rus"; break; case 97: $language_text = "Valencià i castellà"; break; case 64: $language_text = "Versió original subtitulada"; break; case 63: $language_text = "Versió original subtitulada en castellà"; break; case 32: $language_text = "Xinès"; break; case 1: $language_text = " Espectacle sense paraules"; break; case 12: $language_text = "Català "; break;   
            }
          }

          $autor = ($json_array_node['content'][$i]['field_autor']['und'][0]['target_id'] != NULL) ? $json_array_node['content'][$i]['field_autor']['und'][0]['target_id'] : '';
          if($autor != NULL && $autor != ''){
            switch($autor){
              case 75: $autor = "Tomasito & Raynakd Colom"; break; case 5126: $autor = "Akram Khan Company"; break; case 5127: $autor = "Alva Noto i Ryuichi Sakamoto"; break; case 5129: $autor = "Václav Havel"; break; case 5131: $autor = "Jan Fabre"; break; case 5134: $autor = "Federico García Lorca"; break; case 5137: $autor = "Nao Albet/ Marcel Borràs"; break; case 5139: $autor = "Direcció: Oriol Broggi"; break; case 5141: $autor = "Stephen Karam"; break; case 5145: $autor = "Brian Friel"; break; case 5147: $autor = "Yoann Bourgeois / CCN2-Centre chorégraphique national de Grenoble"; break; case 5150: $autor = "Maarten Seghers"; break; case 5152: $autor = "An Evening with Pat Metheny"; break; case 5154: $autor = "Rocío Molina con Sílvia Pérez Cruz"; break; case 5157: $autor = "Stefano Massini"; break; case 5159: $autor = "Clàudia Cedó"; break; case 7481: $autor = "XENOS"; break; case 7482: $autor = "Two"; break; case 7483: $autor = "Belgian Rules / Belgium Rules"; break; case 7484: $autor = "Concert by a Band Facing the Wrong Way"; break; case 7485: $autor = "Grito pelao"; break; case 7772: $autor = "Sachli Gholamalizad"; break; case 7773: $autor = "El Solar Agency. Object Detectives"; break; case 7774: $autor = "Miedo"; break; case 7775: $autor = "My Neighbor Sky. Lluna, sol i una estrella"; break; case 9815: $autor = "My Neighbor Sky. Lluna, sol i una estrella"; break; case 9811: $autor = "José Saramago"; break; case 7776: $autor = "José Saramago"; break; case 7777: $autor = "SoftMachine: Surjit + Rianto"; break; case 7778: $autor = "Cirque Alfonse"; break; case 7779: $autor = "Pine Smoke (Cursive II)"; break; case 7780: $autor = "De banda a banda"; break; case 7781: $autor = "Irrepetible"; break; case 9801: $autor = "Roberto Olivan Performing Arts "; break; case 7782: $autor = "Roberto Olivan Performing Arts "; break; case 7783: $autor = "Jonathan Dove / Alasdair Middleton"; break; case 7784: $autor = "Dancing Grandmothers"; break; case 7785: $autor = "Cuentos de azúcar"; break; case 7871: $autor = "Sòfocles"; break; case 7872: $autor = "Mumusic Circus"; break; case 7873: $autor = "Mos Maiorum"; break; case 7874: $autor = "Egschiglen / Hamsa Hamsa"; break; case 7875: $autor = "Naked Thoughts / The Prom / Kaash"; break; case 7876: $autor = "El Jamboree, al Grec"; break; case 7877: $autor = "Gala"; break; case 7878: $autor = "Baró d’evel"; break; case 7879: $autor = "La casa del panda"; break; case 9824: $autor = "El Conde de Torrefiel"; break; case 7880: $autor = "El Conde de Torrefiel"; break; case 7881: $autor = "Jorge-Yamam Serrano"; break; case 7882: $autor = "Pasionaria"; break; case 7883: $autor = "Xirriquiteula Teatre"; break; case 7884: $autor = "Milo Rau / International Institute of Political Murder"; break; case 9751: $autor = "Panikkar, poeta i fangador"; break; case 7885: $autor = "Panikkar, poeta i fangador"; break; case 7886: $autor = "La Baldufa"; break; case 9755: $autor = "Pablo Messiez"; break; case 7887: $autor = "Pablo Messiez"; break; case 7888: $autor = "Marta Buchaca"; break; case 7889: $autor = "David Climent / Sònia Gómez / Pere Jou"; break; case 7890: $autor = "loosely inspired in 'Art of war' by Sunzi"; break; case 7891: $autor = "Companyia Motus"; break; case 7892: $autor = "Robert Glasper/Terrace Martin/Christian Scott/Derrick Hodge/Taylor McFerrin/ Justin Tison"; break; case 7893: $autor = "La Conquesta del Pol Sud"; break; case 7894: $autor = "Conservas"; break; case 7895: $autor = "Rhum & Cia"; break; case 7896: $autor = "Handle with care"; break; case 7897: $autor = "Tang Shu-wing Theatre Studio / Teatro de los Sentidos"; break; case 7898: $autor = "Factoria Los Sánchez / Imaginary Landscape Factory"; break; case 7899: $autor = "Los Galindos"; break; case 7900: $autor = "Anton P. Txèkhov"; break; case 9744: $autor = "El Harlem Jazz Club, al Grec"; break; case 9751: $autor = "Panikkar, poeta i fangador"; break; case 7885: $autor = "Panikkar, poeta i fangador"; break; case 9786: $autor = "CCOT"; break; case 9790: $autor = "Companyia Les Llibertàries"; break; case 9793: $autor = "[ carles santos per a nadons ! ]"; break; case 9794: $autor = "Choy Ka Fai"; break; case 9795: $autor = "Needcompany"; break; case 9796: $autor = "Deslumbrados por la democracia"; break; case 9797: $autor = "Enlluernats per la democràcia"; break; case 9798: $autor = "Dazed by democracy"; break; case 9801: $autor = "Roberto Olivan Performing Arts "; break; case 7782: $autor = "Roberto Olivan Performing Arts "; break; case 9805: $autor = "Basat en l'obra d'Elfriede Jelinek"; break; case 9984: $autor = "Basado en la obra de Elfriede Jelinek"; break; case 9806: $autor = "Basado en la obra de Elfriede Jelinek"; break; case 9807: $autor = "Based on the work of Elfriede Jelinek"; break; case 9811: $autor = "José Saramago"; break; case 7776: $autor = "José Saramago"; break; case 9815: $autor = "My Neighbor Sky. Lluna, sol i una estrella"; break; case 7775: $autor = "My Neighbor Sky. Lluna, sol i una estrella"; break; case 9816: $autor = "My Neighbor Sky. Luna, sol y una estrella"; break; case 9820: $autor = "Pantalla Grec"; break; case 9824: $autor = "El Conde de Torrefiel"; break; case 7880: $autor = "El Conde de Torrefiel"; break; case 9828: $autor = "L’Antic Teatre, al Grec 2018"; break; case 9840: $autor = "Os Serrenhos do Caldeirão, exercicis en antropologia de ficció"; break; case 9841: $autor = "Os Serrenhos do Caldeirão, ejercicios en antropología de ficción"; break; case 9842: $autor = "Os Serrenhos do Caldeirão, fictional anthropology exercises"; break; case 9849: $autor = "Histoire(s) du Théâtre (I)"; break; case 9850: $autor = "Historia(s) del teatro (I)"; break; case 9851: $autor = "Històrie(s) del teatre (I)"; break; case 9852: $autor = "Twenty Looks or Paris is Burning at The Judson Church (Plus)"; break; case 9922: $autor = "Agencia El Solar. Detectives de objetos"; break; case 9923: $autor = "Lliurement inspirat en ’L’art de la guerra’, de Sunzi"; break; case 9924: $autor = "Libremente inspirado en ‘El arte de la guerra’, de Sunzi"; break; case 9983: $autor = "Based in the work of Elfriede Jelinek"; break; case 9984: $autor = "Basado en la obra de Elfriede Jelinek"; break; case 9995: $autor = "Schaubühne de Berlin dirigida per Katie Mitchell"; break; case 9996: $autor = "Schaubühne de Berlin dirigida por Katie Mitchell"; break; case 9997: $autor = "Schaubühne Of Berlin directed by Katie Mitchell"; break; case 10097: $autor = "Lucas Hnath"; break; case 10098: $autor = "Direcció artística: Emily Molnar"; break; case 10099: $autor = "Colombiana"; break; case 10100: $autor = "Lost Souls"; break; case 10101: $autor = "Gravity & Other Myths"; break; case 10102: $autor = "HOWARD ASHMAN (LLIBRET I LLETRES) / ALAN MENKEN (MÚSICA)"; break; case 10103: $autor = "The Spanish Heart Band"; break; case 10104: $autor = "Internationaal Theater Amsterdam / Hanya Yanagihara"; break; case 10105: $autor = "Taylor Mac"; break; case 10106: $autor = "Lola Arias"; break; case 10154: $autor = "Baró d'evel"; break; case 10156: $autor = "Alícia Gorina"; break; case 10160: $autor = "Tiago Rodrigues"; break; case 10173: $autor = "Oriol Morales i Pujolar / La Llarga"; break; case 10176: $autor = "Torus"; break; case 10177: $autor = "Framing Time"; break; case 10181: $autor = "Las muchísimas"; break; case 10182: $autor = "Osso Club: Enric Ases, Andrés Corchero, Pep Ramis, Piero Steiner"; break; case 10185: $autor = "Zum-Zum Teatre"; break; case 10187: $autor = "Here"; break; case 10188: $autor = "Cia. Manolo Alcántara"; break; case 10189: $autor = "Rodrigo García"; break; case 10190: $autor = "Alessandro Sciarroni"; break; case 10191: $autor = "Toni Gomila"; break; case 10192: $autor = "Obskené / Quitte ou Double"; break; case 10193: $autor = "Refugi"; break; case 10194: $autor = "Juan Carlos Martel Bayod"; break; case 10195: $autor = "David Espinosa"; break; case 10196: $autor = "Via Augusta"; break; case 10197: $autor = "Beatriz Caravaggio"; break; case 10198: $autor = "Juan Mayorga"; break; case 10207: $autor = "T de Teatre / Denise Despeyroux"; break; case 10208: $autor = "Victoria Szpunberg"; break; case 10209: $autor = "Marie de Jongh Teatroa"; break; case 10211: $autor = "Play"; break; case 10213: $autor = "AM27"; break; case 10214: $autor = "Els Pirates Teatre"; break; case 10217: $autor = "Dennis Kelly"; break; case 10222: $autor = "Oriol Tarrasón / Les Antonietes"; break; case 10223: $autor = "Aurora Bertrana"; break; case 10224: $autor = "La tristura"; break; case 10225: $autor = "Roger Bernat / FFF / ITTeatre"; break; case 10226: $autor = "Constanza Brnčić / Albert Tola"; break; case 10227: $autor = "The Mamzelles"; break; case 10228: $autor = "Cia. Pepa Plana"; break; case 10260: $autor = "Kind"; break; case 10264: $autor = "Xesca Salvà"; break; case 10266: $autor = "Circa Contemporary Circus"; break; case 10268: $autor = "Coda"; break; case 10273: $autor = "Søren Evinson / L’Antic Teatre al Grec 2019"; break; case 10276: $autor = "Los Detectives (Mariona Naudín, María García Vera, Marina Colomina, Laia Cabrera) / L’Antic Teatre al Grec 2019"; break; case 10278: $autor = "Verónica Navas Ramírez / L’Antic Teatre al Grec 2019"; break; case 10280: $autor = "Legítimo / Rezo"; break; case 10282: $autor = "La Fura dels Baus / Pera Tantiñá"; break; case 10285: $autor = "La Sala BARTS al Grec"; break; case 10305: $autor = "Norma / La Sala BARTS al Grec"; break; case 10309: $autor = "The Red Wine Serenaders / El Harlem Jazz Club, al Grec"; break; case 10310: $autor = "Jordi Casanovas"; break; case 10314: $autor = "Sala Montjuïc"; break; case 10322: $autor = "White Bouncy Castle"; break; case 10327: $autor = "Nora Chipaumire"; break; case 10338: $autor = "Maduixa"; break; case 10341: $autor = "Split"; break; case 10343: $autor = "ab [intra]"; break; case 10346: $autor = "Robert Wilson / Isabelle Huppert"; break; case 10349: $autor = "Parking Shakespeare"; break; case 10351: $autor = "Animal de séquia"; break; case 10355: $autor = "London Community Gospel Choir, Messengers i Barcelona Big Latin Band"; break; case 10356: $autor = "Jez Butterworth"; break; case 10366: $autor = "Hattie Naylor"; break; case 10369: $autor = "Companyia Sixto Paz"; break; case 10468: $autor = "Societat Doctor Alonso"; break; case 10480: $autor = "Andrew Schneider & Co."; break; case 10484: $autor = "Les rutes de l’esclavatge"; break; case 10485: $autor = "Las rutas de la esclavitud"; break; case 10486: $autor = "The Routes of Slavery"; break; case 10487: $autor = "Lù (路)"; break; case 10488: $autor = "ATRESBANDES / Quartet Brossa"; break; case 10489: $autor = "William Forsythe, Dana Caspersen, Joel Ryan"; break; case 10500: $autor = "Bárbara Mestanza, Paula Ribó"; break; case 10508: $autor = "Kyle Abraham"; break; case 10509: $autor = "HOWARD ASHMAN (LLIBRETO Y LETRAS) / ALAN MENKEN (MÚSICA)"; break; case 10510: $autor = "HOWARD ASHMAN (LYRICS) / ALAN MENKEN (MUSIC)"; break;
            }
          }
          
          if (!empty($json_array_node['content'][$i]['field_programa'])){
            $programa_filename = ($json_array_node['content'][$i]['field_programa']['und'][0]['uri'] != NULL) ? $json_array_node['content'][$i]['field_programa']['und'][0]['uri'] : '';
            $programa_filename = str_replace("public://", "",$programa_filename);
            $programa_path = 'http://grec2018.dd:8083/sites/default/files/' . $programa_filename;
            $data = file_get_contents($programa_path);
            $file = file_save_data($data, 'public://' . $programa_filename, FILE_EXISTS_REPLACE);
            $field_programa_array[0]['target_id'] = $file->id();           
          }  

          $video = '';
          $contador = 1;

          if($json_array_node['content'][$i]['field_gallery']['und'] != NULL && $json_array_node['content'][$i]['field_gallery']['und'] != ''){
            foreach ($json_array_node['content'][$i]['field_gallery']['und'] as $key => $value) {
              $paragraph_id = $value['value'];
              $paragraph = file_get_contents('http://grec2018.dd:8083/ca/api-json-prgph/' . $paragraph_id);
              $paragraph_decode = json_decode($paragraph, true);
              
              if($paragraph_decode['content'][$paragraph_id]['field_video_url'] != NULL){
                $video = $paragraph_decode['content'][$paragraph_id]['field_video_url']['und'][0]['value'];
              }elseif($paragraph_decode['content'][$paragraph_id]['field_img_par'] != NULL){
                $img_filename = $paragraph_decode['content'][$paragraph_id]['field_img_par']['und'][0]['filename'];
                $img_path = 'http://grec2018.dd:8083/sites/default/files/' . $img_filename;
                $data = file_get_contents($img_path);
                $file = file_save_data($data, 'public://' . $img_filename, FILE_EXISTS_REPLACE);
                $array_images[$contador]['target_id'] = $file->id();  
                $contador++;
              }
            }
          }        
          
          $esp_hora = ($json_array_node['content'][$i]['field_alternative_text_schedule']['und'][0]['value'] != NULL) ? $json_array_node['content'][$i]['field_alternative_text_schedule']['und'][0]['value'] : '';
          
          $node_fields = [
              'title' => $title,
              'field_espectacle_sumary' => $sumary,
              'field_espectacle_body' => $body,
              'field_fitxa_artistica' => $fartistica, 
              'field_links' => $array_link,
              'field_images' => $array_images,
              'field_espectacle_disciplina' => $disciplina,
              'field_espai' => $espai,
              'field_espectacle_duration' => $duration,
              'field_espectacle_preu' => $price,
              'field_espectacle_language' => $language_text,
              'field_espectacle_subtitle' => $autor,
              'field_programa' => $field_programa_array,
              'field_dates_espectacle' => $date_array,
              'field_espectacle_video' => $video,
              'field_edicio' => $edicio,
              'field_espectacle_hora' => $esp_hora,
          ];

          if($json_array_node['content'][$i]['language'] == 'ca'){
            $node = \Drupal\node\Entity\Node::create([
              'type' => 'espectacle',
              'title' => $title,
              'field_espectacle_sumary' => $sumary,
              'field_espectacle_body' => $body,
              'field_fitxa_artistica' => $fartistica, 
              'field_links' => $array_link,
              'field_images' => $array_images,
              'field_espectacle_disciplina' => $disciplina,
              'field_espai' => $espai,
              'field_espectacle_duration' => $duration,
              'field_espectacle_preu' => $price,
              'field_espectacle_language' => $language_text,
              'field_espectacle_subtitle' => $autor,
              'field_programa' => $field_programa_array,
              'field_dates_espectacle' => $date_array,
              'field_espectacle_video' => $video,
              'field_edicio' => $edicio,
              'field_espectacle_hora' => $esp_hora,
            ]);          

            $node->save();
          }elseif($json_array_node['content'][$i]['language'] == 'en'){
            $node->addTranslation('en',
              $node_fields
            )->save();
          }elseif($json_array_node['content'][$i]['language'] == 'es'){
            $node->addTranslation('es',
              $node_fields
            )->save();
          }
        }
      }
    }
  }

  public function import_languages(){
    //Importació camp language per només nodes del drupal 7
    
    $path = drupal_get_path('module', 'cridajson') . '/content_type_espectacle.json-2.txt';
    
    if(file_exists($path)){
      $file = file_get_contents($path);
      $json_array = json_decode($file, true);
      $rows = $json_array[2]['data'];

      foreach ($rows as $key => $position) {                
        $nid = $json_array[2]['data'][$key]['nid'];
        $node = Node::load($nid);
        
        if($json_array[2]['data'][$key]['field_idioma_value'] != NULL){
          $node_ca = $node->getTranslation('ca');
          $node_ca->set('field_espectacle_language', $json_array[2]['data'][$key]['field_idioma_value']);
          $node_ca->save();
        }
        
        if($json_array[2]['data'][$key]['field_desc_idioma_es_value'] != NULL){
          $node_es = $node->getTranslation('es');
          $node_es->set('field_espectacle_language', $json_array[2]['data'][$key]['field_desc_idioma_es_value']);
          $node_es->save();
        }

        if($json_array[2]['data'][$key]['field_desc_idioma_en_value'] != NULL){
          $node_en = $node->getTranslation('en');
          $node_en->set('field_espectacle_language', $json_array[2]['data'][$key]['field_desc_idioma_en_value']);
          $node_en->save();
        }
      }
    }
  }
}
