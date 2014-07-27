<?php

class Grade extends NLJModel {

	// Add your validation rules here
	public static $rules = [
		'teacher_id' => 'required|exists:teachers,id',
		'grade' => 'required:int'
	];

	protected $guarded = ['id', 'created_at', 'updated_at'];

	public function teacher()
	{
		return $this->belongsTo('Teacher');
	}
}