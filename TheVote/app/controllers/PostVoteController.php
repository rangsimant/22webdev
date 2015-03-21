<?php

class PostVoteController extends BaseController {

     /**
     * Post Model
     * @var Post
     */
    protected $post;
    protected $user;

    /**
     * Inject the models.
     * @param Post $post
     */
    public function __construct(Post $post, User $user)
    {
        parent::__construct();
        $this->post = $post;
        $this->user = $user;
    }

    public function getView($idPost)
    {
        // Get this blog post data
        $post = $this->post->where('id', '=', $idPost)->first();

        $agree = Vote::getCountVote($post->id);
        $disagree = Vote::getCountWorse($post->id);

        // Check if the blog post exists
        if (is_null($post))
        {
            // If we ended up in here, it means that
            // a page or a blog post didn't exist.
            // So, this means that it is time for
            // 404 error page.
            return App::abort(404);
        }

        // Get this post comments
        $comments = $post->comments()->orderBy('created_at', 'DESC')->get();

        // Get current user and check permission
        $user = $this->user->currentUser();
        $canComment = false;
        if(!empty($user)) {
            $canComment = $user->can('post_comment');
        }

        // Show the page
        return View::make('site/blog/view_post', compact('post', 'comments', 'canComment','agree','disagree'));
    }

    public function postCreate()
	{
        // Declare the rules for the form validation
        $rules = array(
            'title'   => 'required|min:3',
            'content' => 'required|min:3'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Create a new blog post
            $user = Auth::user();

            // Update the blog post data
            $this->post->title            = Input::get('title');
            $this->post->slug             = Input::get('title');
            $this->post->content          = Input::get('content');
            $this->post->meta_title       = Input::get('title');
            $this->post->meta_description = Input::get('content');
            $this->post->meta_keywords    = empty(Input::get('keywords'))?Input::get('title'):Input::get('keywords');
            $this->post->user_id          = $user->id;

            // Was the blog post created?
            if($this->post->save())
            {
                // Redirect to the new blog post page
                return Redirect::to('/')->with('success', Lang::get('admin/blogs/messages.create.success'));
            }

            // Redirect to the blog post create page
            return Redirect::to('/')->with('error', Lang::get('admin/blogs/messages.create.error'));
        }

        // Form validation failed
        return Redirect::to('/')->withInput()->withErrors($validator);
	}

    public function postView($idPost)
    {

        $user = $this->user->currentUser();
        $canComment = $user->can('post_comment');
        if ( ! $canComment)
        {
            return Redirect::to($idPost . '#comments')->with('error', 'You need to be logged in to post comments!');
        }

        // Get this blog post data
        $post = $this->post->where('id', '=', $idPost)->first();

        // Declare the rules for the form validation
        $rules = array(
            'comment' => 'required|min:3'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Save the comment
            $comment = new Comment;
            $comment->user_id = Auth::user()->id;
            $comment->content = Input::get('comment');

            // Was the comment saved with success?
            if($post->comments()->save($comment))
            {
                // Redirect to this blog post page
                return Redirect::to($idPost . '#comments')->with('success', 'Your comment was added with success.');
            }

            // Redirect to this blog post page
            return Redirect::to($idPost . '#comments')->with('error', 'There was a problem adding your comment, please try again.');
        }

        // Redirect to this blog post page
        return Redirect::to($idPost)->withInput()->withErrors($validator);
    }

}