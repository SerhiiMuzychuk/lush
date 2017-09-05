<?php

namespace Drupal\common_whooosh\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\core\modules\user\src\Form;
use \Drupal\Core\Form\FormBase;
use Drupal\block\Entity\Block;
/**
 * Implement block with brand
 * 
 * @Block(
 *  id = "top_header_block",
 *  admin_label = @Translation("Top header block"),
 * )
 */
class TopheaderBlock extends BlockBase {
  
  /**
   * {@inheritdoc}
   */
  public function build() {
    $front_page = \Drupal::service('path.matcher')->isFrontPage();
    $menu = Block::load('products');
    $prod_menu = \Drupal::entityTypeManager()->getViewBuilder('block')->view($menu);

    $boards = views_embed_view('search_boards', 'block_search');


    // $log_form = \Drupal::formBuilder()->getForm(Drupal\user\Form\UserLoginForm::class);
    return array(
      '#theme' => 'top_header_block',
      '#items' => array(
        'front_page' => $front_page,
        'product' => $prod_menu,
        'boards' => $boards,

        ),
      // '#logs' => array('log_form' => $log_form),
    );
  }
  
}




