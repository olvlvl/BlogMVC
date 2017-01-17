<?php

namespace App;

use App;

$hooks = Hooks::class . '::';

return [

	App\Modules\Categories\Category::class. '::url' => $hooks . 'url',
	App\Modules\Categories\Category::class. '::get_url' => $hooks . 'get_url',
	App\Modules\Posts\Post::class. '::url' => $hooks . 'url',
	App\Modules\Posts\Post::class. '::get_url' => $hooks . 'get_url',
	App\Modules\Users\User::class. '::url' => $hooks . 'url',
	App\Modules\Users\User::class. '::get_url' => $hooks . 'get_url'

];
