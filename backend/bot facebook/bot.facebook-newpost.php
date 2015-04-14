<?php
require("pdo/Db.class.php");
require_once(__DIR__.'/facebooksdk/autoload.php');
ini_set('max_execution_time', 0);
date_default_timezone_set("Asia/Bangkok");
echo "<meta charset='UTF-8'></meta>";

$db = new DB();
// App name "sunnysun"
$fb = new Facebook\Facebook([
  'app_id' => '1646024095622253',
  'app_secret' => '25ad52f609d75e675d20704f44c3f7cf',
  'default_graph_version' => 'v2.2',
  //'default_access_token' => '{access-token}', // optional
]);
$page = 'ceclip';
$apptoken = '1646024095622253|25ad52f609d75e675d20704f44c3f7cf';

$response = getFeed($fb, $page, $apptoken);
$result = $response->getGraphObject();
getPost($fb, $result);

function insertPostToDB($data)
{
	$db = new DB();
	$sql = "INSERT IGNORE social_data(sd_social_id,sd_body,sd_type,sd_channel,created_at,updated_at,sd_Author) 
						Value(:sd_social_id, :sd_body, :sd_type, :sd_channel, :created_at, :updated_at, :sd_Author)";
	$insert = $db->query($sql,$data);
	if($insert > 0 ) {
	  return 'Succesfully created a new Post !';
	}
}

function insertAuthor($data)
{
	$db = new DB();
	$sql = "INSERT IGNORE author(aut_social_id, aut_name, created_at, updated_at)
						Value(:aut_social_id, :aut_name, :created_at, :updated_at)";
	$insert = $db->query($sql,$data);
	if($insert > 0 ) {
	  return 'Succesfully created a new Author !';
	}
}
function getPost($fb, $objectPost)
{
	$next = $fb->next($objectPost['posts']);
	$objectPost = json_decode($objectPost);
	foreach ($objectPost->posts as $key => $post) 
	{
		$data = array(
			'sd_social_id' => $post->id,
			'sd_body' => isset($post->message)?$post->message:NULL,
			'sd_type' => 'post',
			'sd_channel' => 'facebook',
			'created_at' => date('Y-m-d H:i:s)',strtotime($post->created_time->date)),
			'updated_at' => date('Y-m-d H:i:s)',strtotime($post->updated_time->date)),
			'sd_Author' => $post->from->id
			);
		$author = array(
			'aut_social_id' => $post->from->id, 
			'aut_name' => $post->from->name, 
			'created_at' => date('Y-m-d H:i:s'), 
			'updated_at' => date('Y-m-d H:i:s')
			);
		insertAuthor($author);
		insertPostToDB($data);
		echo ".";
	}
	if ($next) {
		echo ">";
		nextPage($fb, $next);
	}
	else
	{
		echo "Done.";
	}


}

function nextPage($fb, $next)
{	
	$post = json_decode($next);
	foreach ($post as $key => $post) 
	{
		$data = array(
			'sd_social_id' => $post->id,
			'sd_body' => isset($post->message)?$post->message:NULL,
			'sd_type' => 'post',
			'sd_channel' => 'facebook',
			'created_at' => date('Y-m-d H:i:s)',strtotime($post->created_time->date)),
			'updated_at' => date('Y-m-d H:i:s)',strtotime($post->updated_time->date)),
			'sd_Author' => $post->from->id
			);
		$author = array(
			'aut_social_id' => $post->from->id, 
			'aut_name' => $post->from->name, 
			'created_at' => date('Y-m-d H:i:s'), 
			'updated_at' => date('Y-m-d H:i:s')
			);
		insertAuthor($author);
		insertPostToDB($data);
		echo ".";
	}
	if ($fb->next($next)) {
		echo ">";
		$next = $fb->next($next);
		nextPage($fb, $next);
	}

}


function getFeed($fb, $page, $apptoken='1646024095622253|25ad52f609d75e675d20704f44c3f7cf')
{
	try {
	  // Get the Facebook\GraphNodes\GraphUser object for the current user.
	  // If you provided a 'default_access_token', the '{access-token}' is optional.
	  return $fb->get('/'.$page.'/?fields=posts{id,from,message,shares,created_time,updated_time,attachments}', $apptoken);
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}
}
