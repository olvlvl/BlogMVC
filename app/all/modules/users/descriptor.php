<?php

namespace App\Modules\Users;

use ICanBoogie\ActiveRecord\Model;
use ICanBoogie\Module\Descriptor;

return [

	Descriptor::MODELS => [

		'primary' => [

			Model::SCHEMA => [

				'id' => 'serial',
				'username' => 'varchar',
				'password' => 'varchar'

			]
		]
	],

	Descriptor::NS => __NAMESPACE__,
	Descriptor::TITLE => "Users"

];
