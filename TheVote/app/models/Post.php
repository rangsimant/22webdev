<?php

use Illuminate\Support\Facades\URL;

class Post extends Eloquent {

	/**
	 * Deletes a blog post and all
	 * the associated comments.
	 *
	 * @return bool
	 */
	public function delete()
	{
		// Delete the comments
		$this->comments()->delete();

		// Delete the blog post
		return parent::delete();
	}

	/**
	 * Returns a formatted post content entry,
	 * this ensures that line breaks are returned.
	 *
	 * @return string
	 */
	public function content()
	{
		return nl2br($this->content);
	}

	/**
	 * Get the post's author.
	 *
	 * @return User
	 */
	public function author()
	{
		return $this->belongsTo('User', 'user_id');
	}

	/**
	 * Get the post's meta_description.
	 *
	 * @return string
	 */
	public function meta_description()
	{
		return $this->meta_description;
	}

	/**
	 * Get the post's meta_keywords.
	 *
	 * @return string
	 */
	public function meta_keywords()
	{
		return $this->meta_keywords;
	}

	/**
	 * Get the post's comments.
	 *
	 * @return array
	 */
	public function comments()
	{
		return $this->hasMany('Comment');
	}

    /**
     * Get the date the post was created.
     *
     * @param \Carbon|null $date
     * @return string
     */
    public function date($date=null)
    {
        if(is_null($date)) {
            $date = $this->created_at;
        }

        return String::date($date);
    }

	/**
	 * Get the URL to the post.
	 *
	 * @return string
	 */
	public function url()
	{
		return Url::to($this->id);
	}

	/**
	 * Returns the date of the blog post creation,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function created_at()
	{
		return $this->date($this->created_at);
	}

	/**
	 * Returns the date of the blog post last update,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function updated_at()
	{
        return $this->date($this->updated_at);
	}

	public function getCountAgree()
	{
		return 	Vote::getCountVote($this->id);
	}

	public function getCountDisAgree()
	{
		return 	Vote::getCountWorse($this->id);
	}

	public function getFeedsAll()
	{
		$feeds = DB::table('posts')
							->select('posts.id','posts.user_id','posts.title','posts.content','posts.attachment','users.first_name','users.last_name','users.picture','posts.created_at','posts.updated_at')
							->join('users', 'posts.user_id', '=', 'users.id')
							->orderBy('updated_at', 'DESC')
							->get();

		foreach ($feeds as $key => $feed) {
			$feed->created_time_ago = $this->date(new Carbon($feed->created_at));
			$feed->updated_time_ago = $this->date(new Carbon($feed->updated_at));
			$feed->agree = Vote::getCountVote($feed->id);
			$feed->disagree = Vote::getCountWorse($feed->id);
			$feed->comment = Comment::getCountComments($feed->id);
		}
		return $feeds;
	}
}
