<?php

namespace App\Modules\Posts;

use ICanBoogie\ActiveRecord\Model;
use ICanBoogie\ActiveRecord\Query;

class PostModel extends Model
{
	protected function scope_ordered(Query $query, $direction = -1)
	{
		return $query->order('created ' . ($direction < 0 ? 'DESC' : 1));
	}
}
