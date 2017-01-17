<?php

namespace App\Modules\Users;

use ICanBoogie;

$hooks = Hooks::class . '::';

return [

	ICanBoogie\Routing\RouteDispatcher::class . '::dispatch:before' => $hooks . 'on_routing_dispatcher_dispatch',
	ICanBoogie\HTTP\AuthenticationRequired::class . '::rescue' => $hooks . 'on_authentication_required_rescue'

];
