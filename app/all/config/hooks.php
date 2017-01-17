<?php

namespace App;

$hooks = Hooks::class . '::';

return [

	'patron.markups' => [

		'time:ago' => [

			$hooks . 'markup_time_ago', [

				'select' => [ 'expression' => true, 'default' => 'this' ]

			]
		],

		'cache:sidebar' => [

			$hooks . 'markup_cache_sidebar'

		]
	]
];
