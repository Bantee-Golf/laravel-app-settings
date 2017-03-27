<?php


namespace EMedia\AppSettings\Entities;


use EMedia\QuickData\Entities\Repositories\BaseRepository;

class SettingsRepository extends BaseRepository
{

	public function __construct(Setting $model)
	{
		parent::__construct($model);
	}

}