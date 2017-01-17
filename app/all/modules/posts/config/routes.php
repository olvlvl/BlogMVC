<?php

namespace App\Modules\Posts;

use ICanBoogie\Routing\RouteDefinition as Route;

return [

	'posts:index' => [

		Route::PATTERN => '/',
		Route::CONTROLLER => PostsController::class,
		Route::ACTION => 'index'

	],

	'posts:category' => [

		Route::PATTERN => '/category/:category',
		Route::CONTROLLER => PostsController::class,
		Route::ACTION => 'index'

	],

	'posts:by-user' => [

		Route::PATTERN => '/author/<id:\d+>',
		Route::CONTROLLER => PostsController::class,
		Route::ACTION => 'index'

	],

	'posts:view' => [

		Route::PATTERN => '/:slug',
		Route::CONTROLLER => PostsController::class,
		Route::ACTION => 'show'

	],

	'admin:posts:index' => [

		Route::PATTERN => '/admin/posts',
		Route::CONTROLLER => PostsController::class,
		Route::ACTION => 'admin'

	],

	'admin:posts:new' => [

		Route::PATTERN => '/admin/posts/new',
		Route::CONTROLLER => PostsController::class,
		Route::ACTION => 'new'

	],

	'admin:posts:edit' => [

		Route::PATTERN => '/admin/posts/<id:\d+>/edit',
		Route::CONTROLLER => PostsController::class,
		Route::ACTION => 'edit'

	],

	'admin:posts:delete' => [

		Route::PATTERN => '/admin/posts/<id:\d+>/delete',
		Route::CONTROLLER => PostsController::class,
		Route::ACTION => 'delete'

	],

	'redirect:admin' => [

		Route::PATTERN => '/admin',
		Route::LOCATION => '/admin/posts'

	]
];
