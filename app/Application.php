<?php

namespace ICanBoogie;

use App\Modules;

class Application extends Core
{
	use Binding\ActiveRecord\ApplicationBindings;
	use Binding\Render\ApplicationBindings;
	use Modules\Users\Binding\ApplicationBindings;
}
