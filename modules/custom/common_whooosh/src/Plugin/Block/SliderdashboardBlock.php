<?php

namespace Drupal\common_whooosh\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
use Drupal\image\Entity\ImageStyle;
use Drupal\user\Entity\User;

/**
 * Implement block with dashboard slider
 * 
 * @Block(
 *  id = "slider_dash_block",
 *  admin_label = @Translation("Slider dashboard block"),
 * )
 */
class SliderdashboardBlock extends BlockBase {
  
  /**
   * {@inheritdoc}
   */
  public function build() {
    
    //get accidental five node ids of custom dashboard content type
    $nids = array();
    $nids = \Drupal::database()
        ->select('node', 'n')
        ->fields('n', array('nid'))
        ->condition('n.type', 'custom_dashboard')
//        ->range(0, 5)
//        ->orderRandom()
        ->execute()
        ->fetchCol();
    
    $nodes = Node::loadMultiple($nids);
    $img_style = ImageStyle::load('dashslider_image');
    
    $slides = array();
    
    foreach ($nodes as $nid => $node_obj) {
      //get title of node
      $slides[$nid]['title'] = $node_obj->getTitle();
      
      //get author of node
      $uid = $node_obj->getOwnerId();
      $slides[$nid]['user_name'] = User::load($uid)->getAccountName();
      
      // get color value
      $slides[$nid]['color_slide'] = $node_obj->field_color_slide->value;
      
      //get image url
      $img_uri = $node_obj->field_dashboard_image->entity->getFileUri();
//      $slides[$nid]['img_url'] = file_create_url($img_uri);
      $slides[$nid]['img_url'] = $img_style->buildUrl($img_uri);
      
      // generate path of node
      $slides[$nid]['node_alias'] = '/node/' . $nid;
      
    }
       
    return array(
      '#theme' => 'dashboard_slider_block',
      '#items' => $slides,
    );
  }
}
