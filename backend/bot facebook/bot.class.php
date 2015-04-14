<?php

require("SocialStorage.class.php");
require("Author.class.php");
/**
* 
*/
class Bot
{
	private $db;
	private $fb;
	private $social_storage;
	private $author;
	function __construct(DB $db)
	{
		ini_set('max_execution_time', 0);
		date_default_timezone_set("Asia/Bangkok");

		$this->social_storage = new SocialStorage();
		$this->author = new Author();
		$this->db = $db;
		$this->fb = new Facebook\Facebook([
		  'app_id' => '1646024095622253',
		  'app_secret' => '25ad52f609d75e675d20704f44c3f7cf',
		  'default_graph_version' => 'v2.2',
		  //'default_access_token' => '{access-token}', // optional
		]);
	}

	public function run()
	{
		echo $page = 'ceclip';
		$apptoken = '1646024095622253|25ad52f609d75e675d20704f44c3f7cf';
		$response = getFeed($page, $apptoken);
		$result = $response->getGraphObject();
		getPost($result);
	}

	public function getFeed($page, $apptoken)
	{
		try {
		  // Get the Facebook\GraphNodes\GraphUser object for the current user.
		  // If you provided a 'default_access_token', the '{access-token}' is optional.
		  return $this->fb->get('/'.$page.'/?fields=posts{id,from,message,shares,created_time,updated_time,attachments}', $apptoken);
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

	public function getPost($objectPost)
	{
		$next = $this->fb->next($objectPost['posts']);
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
			// insertAuthor($author);
			// insertPostToDB($data);
			$this->author->createAuthor($author);
			$this->social_storage->createSocialStorage($data);
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

	public function nextPage($next)
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
			// insertAuthor($author);
			// insertPostToDB($data);
			$this->author->createAuthor($author);
			$this->social_storage->createSocialStorage($data);
			echo ".";
		}
		if ($this->fb->next($next)) {
			echo ">";
			$next = $this->fb->next($next);
			nextPage($next);
		}
	}

}