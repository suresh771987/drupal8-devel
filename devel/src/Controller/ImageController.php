<?php

namespace Drupal\devel\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;
use Symfony\Component\HttpFoundation\Response;
use Drupal\Core\Render\Renderer;

class ImageController extends \Drupal\Core\Controller\ControllerBase {

  public function getImage(NodeInterface $node) {
    $file = $node->field_image->entity;
    if ($file) {
      $variables = array(
        'style_name' => 'thumbnail',
        'uri' => $file->getFileUri(),
      );
      $image = file_create_url($node->get('field_image')->entity->uri->value);


      return '<img src =' . $image . ' />';
    }
  }

}
