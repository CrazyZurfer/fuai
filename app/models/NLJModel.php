<?php
/*
Copyright (c) 2014 Nicolás López Jullian
MIT License
*/


class NLJModel extends \Eloquent {

	//method to make searchs without pagination
	public function scopeSearch($query, $search)
	{
		//if no search query just return the simple query
		if (!$search) return $query;

		$selects = [];

		//here we add the if's functions to the selects array
		//we separate each word
		$words = explode(' ', $search);
		for ($i = 0; $i < count($this->searchable); $i++) {
			$field = $this->searchable[$i];
			//for each word and column we make a like and a =, the = has more relevance
			//first with the =
			$equal_fields = [];
			foreach ($words as $word) {
				$equal_fields[] = $field['column'] . " = '" . $word . "'";
			}

			//we join each =
			$equal_fields = join(' || ', $equal_fields);

			//we put the ='s into the if function and set the relevance
			//if it match it adds the relevance number to the relevance column
			$selects[] = 'if(' . $equal_fields . ', ' . $field['relevance'] * 15 . ', 0)';

			//then the like
			$like_fields = [];
			foreach ($words as $word) {
				$like_fields[] = $field['column'] . " LIKE '" . $word . "%'";
			}

			//we join each like
			$like_fields = join(' || ', $like_fields);

			//we put the like's into the if function and set the relevance
			//if it match it adds the relevance number to the relevance column
			$selects[] = 'if(' . $like_fields . ', ' . $field['relevance'] * 5 . ', 0)';

			//and then the other like
			$like_other_fields = [];
			foreach ($words as $word) {
				$like_other_fields[] = $field['column'] . " LIKE '%" . $word . "%'";
			}

			//we join each like
			$like_other_fields = join(' || ', $like_other_fields);

			//we put the like's into the if function and set the relevance
			//if it match it adds the relevance number to the relevance column
			$selects[] = 'if(' . $like_other_fields . ', ' . $field['relevance'] . ', 0)';
		}

		//we sum each match to see the relevance
		$selects = DB::raw(join(' + ', $selects) . ' as relevance');
		$query->select(['*', $selects]);

		//this make that we only select the matching rows
		$query->havingRaw('relevance > 0');
		//order rows by relevance
		$query->orderBy('relevance', 'desc');

		return $query;
	}

	//get the count of rows of a query
	//only tested with the search
	public static function getQueryCount($index)
	{
		//this gets the query
		$query = DB::getQueryLog()[$index]['query'];
		$bindings = DB::getQueryLog()[$index]['bindings'];

		//we take out the order by and limit, becouse its not necesary
		$query = explode(' order by ', $query)[0];
		$query = explode(' limit ', $query)[0];

		//build the count query
		$count_query = 'select count(*) as count from (' . $query . ') as results';



		//execute the query and get the result
		$count = DB::select(DB::raw($count_query), $bindings)[0]->count;

		return intval($count);
	}
}