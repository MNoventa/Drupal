<?php
  
  //Drupal 8
    //Cambiar los campos que aparecen, según opcion seleccionada (en el .theme o .module)

    function THEMENAME_form_alter(&$form, \Drupal\Core\Form\FormStateInterface $form_state, $form_id){
      switch ($form_id) {
        case 'ID_FORMULARIO':
          $video_remote = [
            ':input[name="field_fashion_header_type_select"]' => [
              ['value' => 'Vimeo'],
              ['value' => 'Youtube'],
            ],
          ];

          $video_group = [
            ':input[name="field_fashion_header_type_select"]' => [
              ['value' => 'video_external'],
              ['value' => 'video_internal'],
            ],
          ];

          $video_image = [
            ':input[name="field_fashion_header_type_select"]' => [
              ['value' => 'image'],
            ],
          ];

          $form['field_fashion_list_head_video_id']['#states'] = [
            'visible' => $video_remote,
          ];

          $form['field_fashion_list_header_video']['#states'] = [
            'visible' => $video_group,
          ];

          $form['field_fashion_list_header_image']['#states'] = [
            'visible' => [$video_image, $video_group],
          ];

          break;
      }
    }
?>