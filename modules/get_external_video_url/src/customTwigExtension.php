<?php
namespace Drupal\get_external_video_url;
/**
 * extend Drupal's Twig_Extension class
 */
class customTwigExtension extends \Twig_Extension {

  /**
   * {@inheritdoc}
   * Return your custom twig function to Drupal
   */
  public function getFunctions() {
    return [
      new \Twig_SimpleFunction('get_video_url', [$this, 'get_video_url']),
    ];
  }
  
  /**
   * Returns embed url and image from youtube/vimeo url
   */
  public function get_video_url($video) {   
    //Recuperar url de videos embed para youtube y vimeo + sus imagenes de video default
    
    $video_array = array();
     
    if(strstr($video, 'youtube') || strstr($video, 'youtu.be')){      
      if(preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video, $match)){
        $video_array['espec_video'] = 'https://www.youtube.com/embed/' . $match[1];
        $video_array['espec_img_video'] = 'https://img.youtube.com/vi/' . $match[1] . '/maxresdefault.jpg'; 
      }                    
    }
    
    if(strstr($video, 'vimeo')){              
      if(preg_match("/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $video, $match)) {
        $video_array['espec_video'] = 'https://player.vimeo.com/video/' . $match[5];
        $video_array['espec_img_video'] = 'http://i.vimeocdn.com/video/' . $match[5] . '_1080.webp';
      }
    }
    
    return $video_array;
  } 
}