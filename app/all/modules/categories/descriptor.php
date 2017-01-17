<?php

namespace App\Modules\Categories;

use ICanBoogie\ActiveRecord\Model;
use ICanBoogie\Module\Descriptor;

return [

	Descriptor::MODELS => [

		'primary' => [

			Model::SCHEMA => [

				'id' => 'serial',
				'name' => [ 'varchar', 50 ],
				'slug' => [ 'varchar', 50 ],
				'post_count' => [ 'varchar', 50 ]

			]
		]
	],

	Descriptor::NS => __NAMESPACE__,
	Descriptor::TITLE => "Categories"

];
