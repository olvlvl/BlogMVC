<?php

namespace App\Modules\Users\Operation;

use App\Modules\Users\User;
use ICanBoogie\ErrorCollection;
use ICanBoogie\Operation;

use App\Modules\Users\SignInForm;

class SignInOperation extends Operation
{
	/**
	 * @var User
	 */
	private $user;

	protected function get_controls()
	{
		return [

			self::CONTROL_FORM => true

		] + parent::get_controls();
	}

	protected function lazy_get_form()
	{
		return new SignInForm;
	}

	protected function validate(ErrorCollection $errors)
	{
		$request = $this->request;
		$username = $request['username'];
		$password = $request['password'];

		$user = $this->module->model
		->filter_by_username($username)
		->one;

		if (!$user || !$user->verify_password($password))
		{
			$errors->add('username', "Unknown username/password combination");
			$errors->add('password');

			return false;
		}

		$this->user = $this->module->model[$user->id];

		return true;
	}

	protected function process()
	{
		$this->user->login();

		$this->response->location = $this->request->uri;

		return true;
	}
}
