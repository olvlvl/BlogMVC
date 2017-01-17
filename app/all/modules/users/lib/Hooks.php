<?php

namespace App\Modules\Users;

use ICanBoogie\ActiveRecord\RecordNotFound;
use ICanBoogie\Application;
use ICanBoogie\HTTP\AuthenticationRequired;
use ICanBoogie\HTTP\Request;
use ICanBoogie\Routing\RouteDispatcher;

use function ICanBoogie\app;

class Hooks
{
	/*
	 * Events
	 */

	static public function on_routing_dispatcher_dispatch(RouteDispatcher\BeforeDispatchEvent $event, RouteDispatcher $target)
	{
		if (strpos($event->route->id, 'admin:') !== 0)
		{
			return;
		}

		$user = $event->request->context->user;

		if (!$user->is_guest)
		{
			return;
		}

		throw new AuthenticationRequired;
	}

	static public function on_authentication_required_rescue(\ICanBoogie\Exception\RescueEvent $event, AuthenticationRequired $target)
	{
		$event->response = Request::from('/signin')->get();
		$event->response->status = $target->getCode();
	}

	/*
	 * Prototypes
	 */

	static public function app_get_user(Application $core)
	{
		return $core->request->context->user;
	}

	static public function request_context_get_user(Request\Context $context)
	{
		$app = app();
		$user_id = $app->session['user_id'];

		if ($user_id)
		{
			try
			{
				return $app->models['users'][$user_id];
			}
			catch (RecordNotFound $e)
			{
				$app->session['user_id'] = null;
			}
		}

		return new User;
	}
}
