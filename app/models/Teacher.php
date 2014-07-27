<?php

class Teacher extends NLJModel {

	//validation rules
	public static $rules = [
		'name' => 'required|min:4',
		'last_name' => 'required|min:4',
	];

	//fillable attributes using Class::create($attributes)
	protected $fillable = ['name', 'last_name', 'nickname', 'methodology', 'phrases', 'freak'];

	//searchable attributes
	protected $searchable = [
		['column' => 'name', 'relevance' => 2],
		['column' => 'last_name', 'relevance' => 1],
	];

	public function courses (){
		return $this->belongsToMany('Course');
	}

	public function grades (){
		return $this->hasMany('Grade');
	}
}