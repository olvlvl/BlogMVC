<?php

namespace App\Modules\Posts;

class Admin extends \Brickrouge\ListView
{
	public function __construct(array $attributes = [])
	{
		parent::__construct($attributes + [

			self::COLUMNS => [

				'id' => [ Admin\KeyColumn::class, [

					'title' => $this->t("ID")

				] ],

				'name' => [ Admin\NameColumn::class, [

					'title' => $this->t("Name")

				] ],

				'created' => [ Admin\CreatedColumn::class, [

					'title' => $this->t("Publication date")

				] ],

				'category' => [ Admin\CategoryColumn::class, [

					'title' => $this->t("Category")

				] ],

				'actions' => [ Admin\ActionsColumn::class, [

					'title' => $this->t("Actions")

				] ]

			]

		]);
	}

	protected function render_table(array $decorated_headers, array $rendered_rows)
	{
		return parent::render_table($decorated_headers, $rendered_rows)
		->add_class('table')
		->add_class('table-striped');
	}
}
