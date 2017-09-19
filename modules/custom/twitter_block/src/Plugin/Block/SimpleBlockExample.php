<?php

/**
 * @file
 * Contains \Drupal\twitter_block\Plugin\Block\SimpleBlockExample.
 */

// Пространство имён для нашего блока.
// helloworld - это наш модуль.
namespace Drupal\twitter_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Добавляем простой блок с текстом.
 * Ниже - аннотация, она также обязательна.
 *
 * @Block(
 *   id = "simple_block_example",
 *   admin_label = @Translation("Simple block example"),
 * )
 */
class SimpleBlockExample extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $block = [
      '#type' => 'markup',
      '#markup' => '<strong>Hello World!</strong>'
    ];
    return array(
      '#theme' => 'simple_block_example',
      '#items' => null);
  }

}