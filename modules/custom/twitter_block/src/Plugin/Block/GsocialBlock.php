<?php

namespace Drupal\twitter_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a General social block.
 *
 * @Block(
 *   id = "gsocial_block",
 *   admin_label = @Translation("General social block"),
 * )
 */
class GsocialBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
 public function build() {
  $block = [
    '#type' => 'markup',
    '#markup' => 'My <strong>example</strong> content.'
  ];
  return $block;
}
}