<?php

/**
 * @file
 * Contains \Drupal\yourmodule\Plugin\Block\YourBlockName.
 */

namespace Drupal\devel\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides my custom block.
 *
 * @Block(
 *   id = "devel_block",
 *   admin_label = @Translation("My Custom Block"),
 *   category = @Translation("Blocks")
 * )
 */
class DevelBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $block = \Drupal\devel\Controller\DevelBlockRefresh::blockRefresh();
    return array(
      '#type' => 'markup',
      '#markup' => render($block),
    );
  }

}
