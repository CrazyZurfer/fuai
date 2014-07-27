<?php

class CoursesController extends \BaseController {

	/**
	 * Display a listing of courses
	 *
	 * @return Response
	 */
	public function index()
	{

		$page = Input::get('page') ? Input::get('page') : 1;
		$count = Input::get('count') ? Input::get('count') : 20;
		$from = 1 + $count * ($page - 1);

		$posts = Course::search(Input::get('search'))
		->with('teachers')
		->take($count)
		->skip($from - 1)
		->get()
		->toArray();

		$total_items = NLJModel::getQueryCount(0);

		$paginator = Paginator::make($posts, $total_items, $count);

		return $paginator;
	}

	/**
	 * Show the form for creating a new course
	 *
	 * @return Response
	 */
	public function create()
	{
		//return View::make('courses.create');
	}

	/**
	 * Store a newly created course in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Course::$rules);

		if ($validator->fails())
		{
			//return Redirect::back()->withErrors($validator)->withInput();
			//return array('error' => '')
			$messages = $validator->messages();
			return array('error' => $messages->first());
		}

		Course::create($data);

		return Redirect::route('courses.index');
	}

	/**
	 * Display the specified course.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$course = Course::with('teachers')->findOrFail($id);

		return $course;
		//return View::make('courses.show', compact('course'));
	}

	/**
	 * Show the form for editing the specified course.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$course = Course::find($id);

		//return View::make('courses.edit', compact('course'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$course = Course::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Course::$rules);

		if ($validator->fails())
		{
			//return Redirect::back()->withErrors($validator)->withInput();
			//return array('error' => '')
			$messages = $validator->messages();
			return array('error' => $messages->first());
		}

		$course->update($data);

		return Redirect::route('courses.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Course::destroy($id);

		return Redirect::route('courses.index');
	}

}