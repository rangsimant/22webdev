<?php
require_once("pdo/easyCRUD/easyCRUD.class.php");
/**
* 
*/
class Author Extends Crud
{
	protected $table = 'author';
	protected $pk	 = 'aut_id';

	public function createAuthor($data)
	{
		$author = new Author($data);
		return $author->Create();
	}
}