<?php

namespace App;

use ICanBoogie;
use App;
use Exception;

$hooks = Hooks::class . '::';

return [

	ICanBoogie\Routing\RouteDispatcher::class . '::dispatch' => $hooks . 'on_routing_dispatcher_dispatch',
	ICanBoogie\View\View::class . '::render:before' => $hooks . 'before_view_render',
	App\Modules\Posts\Operation\SaveOperation::class . '::process' => $hooks . 'on_posts_save',
	App\Modules\Posts\Operation\DeleteOperation::class . '::process' => $hooks . 'on_posts_delete',
	Exception::class . '::rescue' => $hooks . 'on_exception_rescue'

];
