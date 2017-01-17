<?php

namespace App\Modules\Comments;

$hooks = Hooks::class . '::';

return [

	'patron.markups' => [

		'comments:submit' => [ $hooks . 'markup_comments_submit', [

			'post' => [ 'expression' => true, 'default' => 'this' ]

		] ]

	]

];
