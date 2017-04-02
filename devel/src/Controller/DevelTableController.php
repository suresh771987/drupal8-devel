<?php

namespace Drupal\devel\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;
use Symfony\Component\HttpFoundation\Response;
use Drupal\Core\Render\Renderer;
use Drupal\devel\ControllerImageController;

class DevelTableController extends \Drupal\Core\Controller\ControllerBase {

  public function articleTable(NodeInterface $node) {
    $header = [
      'title' => 'Title',
      'image_url' => 'Image Url',
      'image' => 'Image'
    ];
    $image = ImageController::getImage($node);
    $rows = [
      'title' => $node->title->value,
      'image_url' => file_create_url($node->get('field_image')->entity->uri->value),
      'image' => $image,
    ];


    // The table description.
    $build = array(
      '#markup' => t('List of All Configurations')
    );

    // Generate the table.
    $build['config_table'] = array(
      '#theme' => 'table',
      '#header' => $header,
      '#rows' => $rows,
    );

    return $build;
  }

}
