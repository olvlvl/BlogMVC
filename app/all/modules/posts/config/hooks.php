<?php

namespace App\Modules\Posts;

$hooks = __NAMESPACE__ . '\Hooks::';

return [

	'patron.markups' => [

		'posts:latests' => [ $hooks . 'markup_posts_latest' ]

	]

];
