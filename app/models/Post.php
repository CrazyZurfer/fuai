<?php

class Post extends NLJModel {

	// Add your validation rules here
	public static $rules = [
		 'title' => 'required',
		 'read_more' => 'required:min10',
		 'content' => 'required',
	];

	protected $fillable = ['title', 'image', 'read_more', 'content', 'picture', 'visits'];

	protected $searchable = [
		['column' => 'title', 'relevance' => 10],
		['column' => 'read_more', 'relevance' => 1],
	];

	public function tags()
	{
		return $this->hasMany('Tag');
	}

}