<?php

namespace App\Modules\Posts;

use ICanBoogie\ActiveRecord;

use App\CreatedProperty;

use function Brickrouge\render_exception;
use function ICanBoogie\normalize;

/**
 * @method string render()
 *
 * @property string $slug
 */
class Post extends ActiveRecord
{
	use CreatedProperty;

	const MODEL_ID = 'posts';

	/**
	 * @var int
	 */
	public $id;

	/**
	 * @var int
	 */
	public $category_id;

	/**
	 * @var int
	 */
	public $user_id;

	/**
	 * @var string
	 */
	public $name;

	/**
	 * @var string
	 */
	private $slug;

	/**
	 * @return string
	 */
	protected function get_slug()
	{
		return $this->slug;
	}

	/**
	 * @param $slug
	 */
	protected function set_slug($slug)
	{
		if (preg_match('/[^0-9A-Za-z\-]/', $slug))
		{
			$slug = normalize($slug);
		}

		$this->slug = $slug;
	}

	/**
	 * @var string
	 */
	public $content;

	/**
	 * @return string
	 */
	public function __toString()
	{
		try
		{
			return (string) $this->render();
		}
		catch (\Exception $e)
		{
			return render_exception($e);
		}
	}
}
