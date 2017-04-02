<?php

namespace Drupal\devel\Controller;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityManager;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

class DevelBlockRefresh extends ControllerBase implements ContainerInjectionInterface {

  protected $entity;

  public function __construct(EntityManager $em) {
    $this->entity = $em;
  }

  public static function create(ContainerInterface $container) {
    return new static($container->get('entity.manager'));
  }

  public function blockRefresh() {
//    $block_id = 'views_block__article_view_block_1';
//    $block = $this->entityManager()->getStorage('block')->load($block_id);
//    return array(
//      '#markup' => render($this->entityManager()->getViewBuilder('block')->view($block)),
//      '#cache' => ['max_age' => 0],
//    );
    $build = array();
    $siteUrl = "http://sureshd88yuuuhapvm.devcloud.acquia-sites.com/article/v1/api";
    $request = \Drupal\devel\Http\ApiRequest::performRequest($siteUrl);
    $items = array();
    foreach ($request as $obj) {
      $items[] = array(
        'title' => $obj->title[0]->value,
        'imgsrc' => $obj->field_image[0]->url,
      );
    }
    // Render the 'faq' theme.
    $build['devel_block_refresh'] = array(
      '#theme' => 'devel_block_refresh',
      '#items' => $items,
    );

    $html = \Drupal::service('renderer')->renderRoot($build);
    $response = new Response();
    $response->setContent($html);

    return $response;
  }

}
