<?php

namespace App\Modules\Comments;

use function ICanBoogie\app;

class Hooks
{
	static public function markup_comments_submit(array $args, $engine, $template)
	{
		$form = new SubmitForm([

			SubmitForm::POST_ID => $args['post']->id,
			SubmitForm::VALUES => app()->request->params

		]);

		return $template ? $engine($template, $form) : $form;
	}
}
