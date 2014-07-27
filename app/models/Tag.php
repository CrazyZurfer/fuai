<?php

class Tag extends NLJModel {

	//validation rules
	public static $rules = [
		'tag' => 'required|min:2|max:15',
		'post_id' => 'required|exists:id,posts',
	];

	protected $hidden = ['id', 'post_id', 'created_at', 'updated_at'];
	protected $fillable = ['tag', 'post_id'];

	public function post()
	{
		return $this->belongsTo('post');
	}
}