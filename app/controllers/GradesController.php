<?php

class GradesController extends \BaseController {

	/**
	 * Display a listing of grades
	 *
	 * @return Response
	 */
	public function index()
	{
		$page = Input::get('page') ? Input::get('page') : 1;
		$count = Input::get('count') ? Input::get('count') : 20;
		$from = 1 + $count * ($page - 1);

		$posts = Grade::search(Input::get('search'))
		->take($count)
		->skip($from - 1)
		->get()
		->toArray();

		$total_items = NLJModel::getQueryCount(0);

		$paginator = Paginator::make($posts, $total_items, $count);

		return $paginator;
	}

	/**
	 * Store a newly created grade in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Grade::$rules);

		if ($validator->fails())
		{
			//return Redirect::back()->withErrors($validator)->withInput();
			//return array('error' => '')
			$messages = $validator->messages();
			return array('error' => $messages->first());
		}

		$grade = Grade::create($data);

		return $grade;
	}

	/**
	 * Display the specified grade.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$grade = Grade::with('teacher')->findOrFail($id);

		return $grade;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$grade = Grade::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Grade::$rules);

		if ($validator->fails())
		{
			//return Redirect::back()->withErrors($validator)->withInput();
			//return array('error' => '')
			$messages = $validator->messages();
			return array('error' => $messages->first());
		}

		$grade->update($data);

		//return Redirect::route('grade.index');
		return $grade;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Grade::destroy($id);

		//return Redirect::route('grades.index');
		return array('info' => 'Grade deleted successfully.');
	}
}