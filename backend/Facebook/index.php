<?php
echo "<meta charset='UTF-8'></meta>";
require_once(__DIR__.'/Facebook/autoload.php');
$fb = new Facebook\Facebook([
  'app_id' => '1646024095622253',
  'app_secret' => '25ad52f609d75e675d20704f44c3f7cf',
  'default_graph_version' => 'v2.2',
  //'default_access_token' => '{access-token}', // optional
]);


// Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
//   $helper = $fb->getRedirectLoginHelper();
//   $helper = $fb->getJavaScriptHelper();
//   $helper = $fb->getCanvasHelper();
//   $helper = $fb->getPageTabHelper();

try {
  // Get the Facebook\GraphNodes\GraphUser object for the current user.
  // If you provided a 'default_access_token', the '{access-token}' is optional.

  $response = $fb->get('/gateamth/?fields=feed', '1646024095622253|25ad52f609d75e675d20704f44c3f7cf');
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$me = $response->getGraphUser();
echo '<pre>';
print_r($me);