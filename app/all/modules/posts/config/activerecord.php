<?php

namespace App\Modules\Posts\Facets;

return [

	'facets' => [

		'posts' => [

			'author' => AuthorCriterion::class,
			'category' => CategoryCriterion::class,
			'created' => CreatedCriterion::class,
			'slug' => SlugCriterion::class

		]
	]
];
