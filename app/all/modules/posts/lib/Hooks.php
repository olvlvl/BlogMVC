<?php

namespace App\Modules\Posts;

use cebe\markdown\Markdown;

use function ICanBoogie\app;

class Hooks
{
	static public function render(Post $post)
	{
		return self::markdown($post->content);
	}

	static public function markup_posts_latest(array $args, $patron, $template)
	{
		$bind = app()->models['posts']->ordered->limit(5)->all;

		return $patron($template, $bind);
	}

	static private function markdown($text)
	{
		static $markdown;

		if (!$markdown)
		{
			$markdown = new Markdown;
		}

		return $markdown->parse($text);
	}
}
