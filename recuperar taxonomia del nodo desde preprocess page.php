 <?php
    function THEMENAME_preprocess_page(&$variables) {
        //Comprobar si la page tiene un nodo, y si el bandle es = a producto
        if(array_key_exists('node', $variables) && $variables['node']->bundle() == 'producto'){

            kint($variables['node']);
            kint($variables['node']->toArray());

            //Recuperar id del termino de taxonomia
            $tax_id = $variables['node']->get('field_familia')->getValue()[0]['target_id'];  

            $storage = \Drupal::entityTypeManager()->getStorage('taxonomy_term');
            $entity_load = $storage->load($tax_id);
            $view_builder = \Drupal::entityTypeManager()->getViewBuilder('taxonomy_term');
            $build = $view_builder->view($entity_load, 'full');
            kint($build);
            $output = render($build);

            $variables['termtax'] = $output;
        }
    }
?>