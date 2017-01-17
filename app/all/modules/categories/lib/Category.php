<?php

namespace App\Modules\Categories;

use ICanBoogie\ActiveRecord;
use ICanBoogie\Routing\ToSlug;

class Category extends ActiveRecord implements ToSlug
{
	/**
	 * @var int
	 */
	public $id;

	/**
	 * @var string
	 */
	public $name;

	/**
	 * @var string
	 */
	public $slug;

	/**
	 * @var int
	 */
	public $post_count;

	/**
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->name;
	}

	/**
	 * @return string
	 */
	public function to_slug()
	{
		return $this->slug;
	}
}
