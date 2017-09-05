<?php

namespace Drupal\common_whooosh\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
use Drupal\file\Entity\File;
use Drupal\image\Entity\ImageStyle;
use Drupal\Core\core\modules\user\src\Form;
use \Drupal\Core\Form\FormBase;
use Drupal\block\Entity\Block;

/**
 * Provides header block
 *
 * @Block(
 *   id = "header_block",
 *   admin_label = @Translation("Social block"),
 * )
 */
class HeaderBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
//    $node = \Drupal::entityTypeManager()->getStorage('node')->load(1);
    $menu2 = Block::load('customercare');
    $prod_menu2 = \Drupal::entityTypeManager()->getViewBuilder('block')->view($menu2);

    $menu3 = Block::load('helpfulinformation');
    $prod_menu3 = \Drupal::entityTypeManager()->getViewBuilder('block')->view($menu3);
    return array(
      '#theme' => 'hslider_block',
      '#items' => array(
        'care' => $prod_menu2,
        'helpful' => $prod_menu3,
        )

    );
  }

}