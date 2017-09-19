<?php

namespace Drupal\twitter_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a Last facebook block.
 *
 * @Block(
 *   id = "facebook_block",
 *   admin_label = @Translation("Facebook block"),
 * )
 */
class FacebookBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
 // require_once __DIR__ . '/vendor/autoload.php'; // change path as needed

//enter your access token here
    $myFBToken="EAAG601G0ZAiwBAOFdiCZC10KI5x5nB0jR2oPoaZBRTWrmKcd7mFjZCzIqSAZAmqOkjLz5HcSw8ZCFr2JA5tawVzdJOuCUSVkg7PIvReSiIMfnIhAkd1iDoRIty2zOgwV35AjHbsUXXyjhRZB6wB9XYz2ZAZCNrXZAnAeQ0fJlvhFZBm8gZDZD";
    $fbID = "100017175998061";
    //must be https when using an access token
    $url="https://graph.facebook.com/21899050053/posts?access_token=".$myFBToken."&limit=20";
    // $c = curl_init($url);
    // curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    // //don't verify SSL (required for some servers)
    // curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    // curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);     
    // $page = json_decode(curl_exec($c));
    // curl_close($c);
    $durl = json_decode($url, true);
    $result = file_get_contents($url);
 
//Decode the JSON result.
$decoded = json_decode($result, true);
 
    // $post=reset($page-&gt;data);
    // return $post-&gt;message;
// $fb = new \Facebook\Facebook([
//   'app_id' => '486891748353580',
//   'app_secret' => 'fd3034c4fac8fefa550019e5b443ba93',
//   'default_graph_version' => 'v2.10',
  //'default_access_token' => '{access-token}', // optional

$pattern = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i';
  $replacement = '<a href="$0" target="_blank" title="$0">$0</a>';
  $facebook_posts = $decoded['data'];
foreach ($facebook_posts as $facebook_post) {
  $items[] = array(
    'message' => preg_replace($pattern, $replacement, $facebook_post['message']),
    'created' => $facebook_post['created_time'], //<--this used in twig(tweet.created)
    );
}
// $variables['items'] = $items;

// kint($variables['items']);
// kint($items);
return array(
  '#theme' => 'facebook_social_block',
  '#items' => $items,
    // => $item['created_time'])
  );
}
}
/**
foreach ($posts as $value) {
      // $facebook_post11 = $value['text'];
      $posts1 = $value['message'];
      $post2 = $value['created'];
    
      // $facebook_post7 = $value['hide'];
       $variables['posts1'][] = [
        // 'face' => $value['text'],
        'message' => $value['message'],
        'created' => $value['created'],
        // 'hide' => $value['hide'],
       ];
       kint($variables);
}       
kint($posts[0]['message']);
  return array(
    '#theme' => 'social_block',
    '#items' => array(
      'message' => $variables,
      
    ),
  );
}
}

*/

// $posts['message'][] = array(
//     $message = preg_replace($pattern, $replacement, $item['message']));
//   $posts['created'][] = array(
//     $created = $item['created_time']);

// for ($i = 0; $i < count($posts['created']); $i++) {
//   $tt[] = array('#markup' => $posts['created'][$i][0]);
// }
// // 100017175998061 // id
// return $tt;
// }


// foreach ($decoded['data'] as $item) {
//   $posts['message'][] = array($item['message']);
//   $posts['created_time'][] = array($item['created_time']);
// }
// kint($posts['message'][1]->toString());
// kint($posts['created_time']);
// foreach ($posts[0] as $key => $value) {
// }

// return array(
//   '#markup' => $posts['message'][1],
//   // '#theme' => 'social_block',
//   // '#items' => $posts,
//   );
// // 100017175998061 // id
// }
// }