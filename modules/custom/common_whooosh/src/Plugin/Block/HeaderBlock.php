<?php

namespace Drupal\common_whooosh\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
use Drupal\file\Entity\File;
use Drupal\image\Entity\ImageStyle;
use Drupal\Core\core\modules\user\src\Form;
use \Drupal\Core\Form\FormBase;
use Drupal\block\Entity\Block;
use Drupal\core\modules\block_content\src\Entity\BlockContent;

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
   /**

  Other method to load and output Twitter block in hslider_block.html.twig template:  
    // $bid = 'twitterblock';
    // $block = Block::load($bid);
    // $render = \Drupal::entityTypeManager()->getViewBuilder('block')->view($block);
    // kint($render);
   */
    $menu2 = Block::load('customercare');
    $prod_menu2 = \Drupal::entityTypeManager()->getViewBuilder('block')->view($menu2);

    $menu3 = Block::load('helpfulinformation');
    $prod_menu3 = \Drupal::entityTypeManager()->getViewBuilder('block')->view($menu3);
    return array(
      '#theme' => 'hslider_block',
      '#items' => array(
        'care' => $prod_menu2,
        'helpful' => $prod_menu3,
        // 'twitter' => $render,
        )

    );
  }

}