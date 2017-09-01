<?php

namespace Drupal\common_whooosh\Plugin\Block;

use Drupal\Core\Block\BlockBase;

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
    $site_name = \Drupal::config('system.site')->get('name');
    return array(
      '#theme' => 'footer_block',
      '#footer_items' => array('site_name' => $site_name),
    );
  }
}

