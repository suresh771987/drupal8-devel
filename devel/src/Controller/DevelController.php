<?php

/**
 * @file
 * Contains \Drupal\devel\Controller\DevelController.
 */

namespace Drupal\devel\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;
use Symfony\Component\HttpFoundation\Response;

class DevelController extends ControllerBase {

  public function articleJson(NodeInterface $node) {
    $node_arr = array();
    $node_arr['title'] = $node->title->value;
    $node_arr['image'] = file_create_url($node->get('field_image')->entity->uri->value);

    $response = new Response();
    $response->setContent(json_encode($node_arr));
    $response->headers->set('Content-Type', 'application/json');
    return $response;
  }

}
