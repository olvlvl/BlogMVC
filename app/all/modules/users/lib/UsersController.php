<?php

namespace App\Modules\Users;

use ICanBoogie\HTTP\Request;
use ICanBoogie\Routing\Controller;
use ICanBoogie\View\ControllerBindings as ViewBindings;

class UsersController extends Controller
{
	use Controller\ActionTrait, ViewBindings;

	protected function get_layout()
	{
		return 'admin';
	}

	protected function action_signin()
	{
		$this->view->template = null;
		$this->view->content = new SignInForm;
	}

	protected function action_signout()
	{
		return Request::from('/api/users/sign-out')->post();
	}
}
