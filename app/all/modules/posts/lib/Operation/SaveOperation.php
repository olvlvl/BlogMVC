<?php

namespace App\Modules\Posts\Operation;

use App\Modules\Posts\EditForm;
use App\Modules\Posts\Post;
use ICanBoogie\DateTime;

/**
 * @property Post $record
 */
class SaveOperation extends \ICanBoogie\Module\Operation\SaveOperation
{
	protected function lazy_get_form()
	{
		return new EditForm;
	}

	protected function lazy_get_properties()
	{
		$properties = parent::lazy_get_properties();

		unset($properties['user_id']);

		if (!$this->key)
		{
			$properties['user_id'] = $this->app->user->id;
			$properties['created'] = DateTime::now();
		}

		return $properties;
	}

	protected function process()
	{
		$rc = parent::process();

		$this->response->message = $this->format($rc['mode'] == 'update' ? '%name has been updated.' : '%name has been created.', [

			'name' => $this->record->name

		]);

		$this->response->location = $this->app->routes['admin:posts:index'];

		return $rc;
	}
}
