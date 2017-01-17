<?php

namespace App\Modules\Users;

use ICanBoogie;

$hooks = Hooks::class . '::';

return [

	ICanBoogie\Application::class . '::get_user' => $hooks . 'app_get_user',
	ICanBoogie\HTTP\Request\Context::class . '::get_user' => $hooks . 'request_context_get_user'

];
