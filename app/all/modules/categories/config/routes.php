<?php

namespace App\Modules\Categories\Routing;

return [

	'categories:view' => [

		'pattern' => '/category/:slug',
		'controller' => CategoriesController::class . '#show'

	]

];
