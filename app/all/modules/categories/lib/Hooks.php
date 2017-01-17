<?php

namespace App\Modules\Categories;

use ICanBoogie\Operation;
use App\Modules\Posts;
use function ICanBoogie\app;

class Hooks
{
	static private function update_post_count()
	{
		$models = app()->models;

		$count = $models['posts']
			->select('COUNT(id)')
			->group('category_id')
			->where('category_id = categories.id');

		$models['categories']("UPDATE {self} SET post_count = IFNULL(($count), 0)");
	}

	/*
	 * Events
	 */

	/**
	 * Update the `post_count` column when posts are saved.
	 *
	 * @param Operation\ProcessEvent $event
	 * @param Posts\Operation\SaveOperation $target
	 */
	static public function on_posts_save(Operation\ProcessEvent $event, Posts\Operation\SaveOperation $target)
	{
		self::update_post_count();
	}

	/**
	 * Update the `post_count` column when posts are deleted.
	 *
	 * @param Operation\ProcessEvent $event
	 * @param Posts\Operation\DeleteOperation $target
	 */
	static public function on_posts_delete(Operation\ProcessEvent $event, Posts\Operation\DeleteOperation $target)
	{
		self::update_post_count();
	}

	/*
	 * Markups
	 */

	static public function markup_category_home(array $args, \Patron\Engine $patron, $template)
	{
		$bind = app()->models['categories']->order('name')->all;

		return $patron($template, $bind);
	}
}
