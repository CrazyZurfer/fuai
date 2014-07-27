<?php

class TeachersController extends \BaseController {

	/**
	 * Display a listing of teachers
	 *
	 * @return Response
	 */
	public function index()
	{
		$page = Input::get('page') ? Input::get('page') : 1;
		$count = Input::get('count') ? Input::get('count') : 20;
		$from = 1 + $count * ($page - 1);

		$posts = Teacher::search(Input::get('search'))
		->with('courses')
		->take($count)
		->skip($from - 1)
		->get()
		->toArray();

		$total_items = NLJModel::getQueryCount(0);

		$paginator = Paginator::make($posts, $total_items, $count)->toArray();

		return View::make('teachers')->with('teachers', $paginator['data']);

	}


	/**
	 * Form to store a newly created teacher in storage.
	 *
	 * @return View
	 */
	public function add()
	{
		return View::make('addteacher')->with('title', 'Agregar Profesor')->with('action', 'add');
	}

	/**
	 * Store a newly created teacher in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Teacher::$rules);

		if ($validator->fails())
		{
			//return Redirect::back()->withErrors($validator)->withInput();
			//return array('error' => '')
			$messages = $validator->messages();
			return array('error' => $messages->first());
		}

		$teacher = Teacher::create($data);

		//return $teacher;
		return Redirect::to('/profesores');
	}

	/**
	 * Display the specified teacher.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$teacher = Teacher::findOrFail($id)->toArray();
		/*$grades = DB::Select(
			DB::Raw('SELECT AVG(grade) as avg from grades Where teacher_id = :teacherid'),
			array('teacherid' => $teacher->id)
		);
		$teacher->avg = $grades[0]->avg;
		*///return $teacher;
		return View::make('teacher', $teacher);

	}

	/**
	 * Form to update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return View
	 */
	public function edit($id)
	{
		$teacher = Teacher::findOrFail($id)->toArray();
		return View::make('addteacher')->with('title', 'Editar Profesor')->with('teacher', $teacher)->with('action', 'edit')->withId($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$teacher = Teacher::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Teacher::$rules);

		if ($validator->fails())
		{
			//return Redirect::back()->withErrors($validator)->withInput();
			//return array('error' => '')
			$messages = $validator->messages();
			return array('error' => $messages->first());
		}

		$teacher->update($data);

		return Redirect::route('teacher.list');
		//return $teacher;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Teacher::destroy($id);

		//return Redirect::route('teachers.index');
		return array('info' => 'Teacher deleted successfully.');
	}
}