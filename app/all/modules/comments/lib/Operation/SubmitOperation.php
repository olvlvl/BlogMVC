<?php

namespace App\Modules\Comments\Operation;

use ICanBoogie\ErrorCollection;
use ICanBoogie\DateTime;
use ICanBoogie\Module\Operation\SaveOperation;

use App\Modules\Comments\SubmitForm;

class SubmitOperation extends SaveOperation
{
	protected function get_controls()
	{
		return [

			self::CONTROL_PERMISSION => false,
			self::CONTROL_RECORD => false,
			self::CONTROL_OWNERSHIP => false

		] + parent::get_controls();
	}

	protected function lazy_get_form()
	{
		return new SubmitForm;
	}

	protected function lazy_get_properties()
	{
		$properties = parent::lazy_get_properties();

		if (!$this->key)
		{
			$properties['created'] = DateTime::now();
		}

		return $properties;
	}

	protected function validate(ErrorCollection $errors)
	{
		$post_id = $this->request['post_id'];

		if (!$post_id)
		{
			$errors['post_id']->add("PostID is required.");
		}
		else if (!$this->app->models['posts']->exists($post_id))
		{
			$errors['post_id']->add("Invalid PostId: %id.", [ 'id' => $post_id ]);
		}

		return $errors;
	}

	protected function process()
	{
		$rc = parent::process();

		$this->response->message = $this->format("Your comment has been saved");

		return $rc;
	}
}
