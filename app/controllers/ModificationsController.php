<?php

class ModificationsController extends \BaseController {

	/**
	 * Display a listing of modifications
	 *
	 * @return Response
	 */
	public function index()
	{

		$modifications = Modification::all();

		return $modifications;
	}

	/**
	 * Store a newly created modification in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Modification::$rules);

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

		$modification = Modification::create($data);

		return $modification;
		//return Redirect::route('modifications.index');
	}

	/**
	 * Display the specified modification.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$modification = Modification::with('modification')->findOrFail($id);

		return $modification;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$modification = Modification::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Modification::$rules);

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

		$modification->update($data);

		return $modification;
		//return Redirect::route('modifications.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Modification::destroy($id);

		return array('info' => 'Modification deleted successfully');
		//return Redirect::route('modifications.index');
	}

	/**
	 * Apply the modification to the teacher in wiki
	 * @param int $id modification's id
	 * @return Response
	 */
	public function applyModification($id){
		$modification = Modification::findOrFail($id);
		$teacher = Teacher::findOrFail($modification->teacher_id);
		$teacher->content = $modification->content;
		$teacher->save();
		return array('info' => 'Modification applied correctly');
	}
}