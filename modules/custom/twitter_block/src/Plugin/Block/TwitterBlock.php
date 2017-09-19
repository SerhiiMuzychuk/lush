<?php

namespace Drupal\twitter_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a Last tweet block.
 *
 * @Block(
 *   id = "twitter_block",
 *   admin_label = @Translation("Twitter block"),
 * )
 */
class TwitterBlock extends BlockBase {

  public function getPostfields() {
    return $this->postfields;
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $content = '';
    $config = \Drupal::config('twitter_block.settings');
    $settings = array(
      'consumer_key' => $config->get('consumer_key'),
      'consumer_secret' => $config->get('consumer_secret'),
      'oauth_access_token' => $config->get('access_token'),
      'oauth_access_token_secret' => $config->get('access_token_secret'),
    );

    // Set here the Twitter account from where getting latest tweets
    $screen_name = 'AlexAle98690371';

    // Get timeline using TwitterAPIExchange
    $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
    $getfield = "screen_name=AlexAle98690371";
    $requestMethod = 'GET';

    $twitter = new \TwitterAPIExchange($settings);
    $user_timeline = $twitter
      ->setGetfield($getfield)
      ->buildOauth($url, $requestMethod)
      ->performRequest();

    $messages = json_decode($user_timeline);
    $pattern = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i';
    $replacement = '<a href="$0" target="_blank" title="$0">$0</a>';
    if (!empty($messages)) {
      foreach ($messages as $twitter) {
        $tw_items[] = array(
        'screen' => $twitter->user->screen_name,
        'content' => preg_replace($pattern, $replacement, $twitter->text),
        'created_at' => $twitter->created_at,
        );
      }
    }

    return array(
      '#theme' => 'twitter_social_block',
      '#tw' =>  $tw_items,
    );
  }

}