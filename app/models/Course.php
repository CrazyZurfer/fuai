<?php

class Course extends NLJModel {

	// Add your validation rules here
	public static $rules = [
		'name' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['name'];

	//searchable attributes
	protected $searchable = [
		['column' => 'name', 'relevance' => 1]
	];

	public function teachers()
	{
		return $this->belongsToMany('Teacher');
	}

}