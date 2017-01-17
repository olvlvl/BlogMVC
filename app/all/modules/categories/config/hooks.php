<?php

namespace App\Modules\Categories;

$hooks = Hooks::class . '::';

return [

	'patron.markups' => [

		'categories:home' => [ $hooks . 'markup_category_home' ]

	]

];
