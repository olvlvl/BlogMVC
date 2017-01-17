<?php

namespace App\Modules\Posts;

use Brickrouge\Button;
use Brickrouge\Form;

use ICanBoogie\Operation;

class DeleteForm extends Form
{
	public function __construct(Post $post, array $attributes = [])
	{
		parent::__construct([

			Form::ACTIONS => [

				new Button("Delete", [ 'class' => 'btn btn-danger', 'type' => 'submit' ])

			],

			Form::HIDDENS => [

				Operation::DESTINATION => 'posts',
				Operation::NAME => 'delete',
				Operation::KEY => $post->id

			]

		]);
	}
}
