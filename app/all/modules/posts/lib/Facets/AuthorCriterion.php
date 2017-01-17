<?php

namespace App\Modules\Posts\Facets;

use ICanBoogie\Facets\Criterion;
use ICanBoogie\ActiveRecord\Query;

class AuthorCriterion extends Criterion\BasicCriterion
{
	public function alter_query_with_value(Query $query, $value)
	{
		$users = $query->model->models['users']
		->select('id AS user_id, username');

		return $query
		->join($users, [ 'on' => 'user_id' ])
		->where("post.user_id = ? OR username = ?", $value, $value);
	}
}
