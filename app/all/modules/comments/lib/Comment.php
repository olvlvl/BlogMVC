<?php

namespace App\Modules\Comments;

use ICanBoogie\ActiveRecord;

use App\CreatedProperty;

use function Brickrouge\render_exception;

class Comment extends ActiveRecord
{
	use CreatedProperty;

	/**
	 * @var int
	 */
	public $id;

	/**
	 * @var int
	 */
	public $post_id;

	/**
	 * @var string
	 */
	public $username;

	/**
	 * @var string
	 */
	public $mail;

	/**
	 * @var string
	 */
	public $content;

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

	public function render()
	{
		return \Textmark_Parser::parse($this->content);
	}

	protected function get_author()
	{
		return CommentAuthor::from($this->username);
	}
}
