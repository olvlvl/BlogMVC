<?php

namespace App\Modules\Categories\Routing;

use ICanBoogie\Binding\Routing\ForwardUndefinedPropertiesToApplication;
use ICanBoogie\Routing\Controller;

class CategoriesController extends Controller
{
	use Controller\ActionTrait, ForwardUndefinedPropertiesToApplication;

	protected function action_show()
	{
		return $this->forward_to($this->routes['posts:category']);
	}
}
