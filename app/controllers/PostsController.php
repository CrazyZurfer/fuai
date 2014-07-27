<?php

class PostsController extends \BaseController {

	/**
	 * Display a listing of posts
	 *
	 * @return Response
	 */
	public function index()
	{
		$page = Input::get('page') ? Input::get('page') : 1;
		$count = Input::get('count') ? Input::get('count') : 20;
		$from = 1 + $count * ($page - 1);

		if (Input::get('tag')) {
			$posts = Post::whereHas('tags', function($q)
			{
				$q->where('tag', '=', Input::get('tag'));

			})->search(Input::get('search'));
		} else {
			$posts = Post::search(Input::get('search'));
		}
		$posts = $posts
		->with('tags')
		->take($count)
		->skip($from - 1)
		->orderBy('created_at', 'desc');



		$posts = $posts->get()->toArray();


		$total_items = NLJModel::getQueryCount(0);

		//return DB::getQueryLog();

		$paginator = Paginator::make($posts, $total_items, $count);

		return $paginator;
	}

	public function getPopular()
	{
		$posts = Post::select(['id', 'title', 'visits'])
		->orderBy('visits', 'desc')
		->limit(5)
		->get()
		->toArray();

		return $posts;
	}

	public function getTags()
	{
		$tags = Tag::groupBy('tag')->orderBy('tag')->get();

		return $tags;
	}

	/**
	 * Store a newly created post in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Post::$rules);

		if ($validator->fails())
		{
			//return Redirect::back()->withErrors($validator)->withInput();
			//return array('error' => '')
			$messages = $validator->messages();
			return array('error' => $messages->first());
		}

		// Take out html tags
		$helper = new Helper;
		$data = $helper->cleanTags($data);


		Post::create($data);

		return Redirect::route('posts.index');
	}

	/**
	 * Display the specified post.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::findOrFail($id);
		$post->tags;

		$post->visits++;
		$post->save();
		return $post;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$post = Post::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Post::$rules);

		if ($validator->fails())
		{
			//return Redirect::back()->withErrors($validator)->withInput();
			//return array('error' => '')
			$messages = $validator->messages();
			return array('error' => $messages->first());
		}

		// Take out html tags
		$helper = new Helper;
		$data = $helper->cleanTags($data);

		$post->update($data);

		return Redirect::route('posts.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Post::destroy($id);

		return Redirect::route('posts.index');
	}

}