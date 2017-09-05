<?php

namespace Drupal\common_whooosh\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\core\modules\user\src\Form;
use \Drupal\Core\Form\FormBase;
use Drupal\block\Entity\Block;

/**
 * Provides footer block
 * 
 * @Block (
 *  id = "footer_block",
 *  admin_label = @Translation("Footer block")
 * )
 */
class FooterBlock extends BlockBase {
  
  /**
   * {@inheritdoc}
   */
  public function build() {
    // $front_page = \Drupal::service('path.matcher')->isFrontPage();
    $menu = Block::load('customercare');
    $prod_menu = \Drupal::entityTypeManager()->getViewBuilder('block')->view($menu);

    $menu1 = Block::load('helpfulinformation');
    $prod_menu1 = \Drupal::entityTypeManager()->getViewBuilder('block')->view($menu1);
    // $log_form = \Drupal::formBuilder()->getForm(Drupal\user\Form\UserLoginForm::class);
    return array(
      '#theme' => 'footer_block',
      '#items' => array(
        'care' => $prod_menu,
        'helpful' => $prod_menu1,       
        ),
      // '#logs' => array('log_form' => $log_form),
    );
  }
}

