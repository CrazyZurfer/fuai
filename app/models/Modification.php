<?php

class Modification extends NLJModel {

	//validation rules
	public static $rules = [
		'teacher_id' => 'required|exists:teachers,id',
		'content' => 'required|min:2'
	];

	protected $hidden = ['id', 'created_at', 'updated_at'];
	protected $fillable = ['content', 'teacher_id'];

	public function teacher()
	{
		return $this->belongsTo('teacher');
	}
}