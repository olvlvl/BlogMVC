<?php

namespace App\Modules\Users\Operation;

use ICanBoogie\ErrorCollection;
use ICanBoogie\Operation;

class SignOutOperation extends Operation
{
	protected function validate(ErrorCollection $errors)
	{
		return true;
	}

	protected function process()
	{
		$this->app->user->logout();

		$this->response->location = '/';

		return true;
	}
}
