<?php

namespace App\Modules\Categories;

use App;

$hooks = Hooks::class . '::';

return [

	App\Modules\Posts\Operation\SaveOperation::class . '::process' => $hooks . 'on_posts_save',
	App\Modules\Posts\Operation\DeleteOperation::class . '::process' => $hooks . 'on_posts_delete',

];
