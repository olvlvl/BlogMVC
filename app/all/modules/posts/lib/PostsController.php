<?php

namespace App\Modules\Posts;

use ICanBoogie\Binding\Routing\ForwardUndefinedPropertiesToApplication;
use ICanBoogie\HTTP\NotFound;
use ICanBoogie\Routing\Controller;
use ICanBoogie\View\ControllerBindings as ViewBindings;
use ICanBoogie\Binding\Routing\ControllerBindings as RoutingBindings;
use ICanBoogie\Module\ControllerBindings as ModuleBindings;

use Brickrouge\A;
use Brickrouge\Form;
use Brickrouge\Pagination;

class PostsController extends Controller
{
	use Controller\ActionTrait, ForwardUndefinedPropertiesToApplication;
	use RoutingBindings, ViewBindings, ModuleBindings;

	const LIMIT = 5;

	protected function action_index()
	{
		$request = $this->request;

		$this->view->content = $this->fetch_records([ 'limit' => self::LIMIT, 'order' => '-created' ] + $request->params);
		$this->view['pagination'] = new Pagination([

			Pagination::COUNT => $this->records_fetcher->count,
			Pagination::LIMIT => self::LIMIT,
			Pagination::POSITION => $request['page']

		]);
	}

	protected function action_show()
	{
		$record = $this->fetch_record([ 'limit' => 1, 'order' => '-created' ] + $this->request->params);

		if (!$record)
		{
			throw new NotFound;
		}

		$this->view->content = $record;
	}

	protected function action_admin()
	{
		$this->action_index();

		$this->view->content = new Admin([

			Admin::RECORDS => $this->view->content

		]);

		$this->view['new_link'] = new A("Add a new post", $this->routes['admin:posts:new'], [

			'class' => "btn btn-primary"

		]);
	}

	protected function action_new()
	{
		$this->view->content = new EditForm;
		$this->view['title'] = "Edit post";
		$this->view['back_link'] = new A("< Back to posts", $this->routes['admin:posts:index']);
		$this->view->template = 'posts/edit';
	}

	protected function action_edit($id)
	{
		$post = $this->model[$id];
		$values = $this->request->params + $post->to_array();

		$this->action_new();
		$this->view->content[Form::VALUES] = $values;
	}

	protected function action_delete($id)
	{
		/* @var $post Post */

		$post = $this->model[$id];

		$this->view->content = new DeleteForm($post);
		$this->view['post'] = $post;
	}
}
