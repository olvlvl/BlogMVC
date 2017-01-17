<?php

namespace App\Modules\Posts;

$hooks = Hooks::class . '::';

return [

	Post::class . '::render' => $hooks . 'render'

];
