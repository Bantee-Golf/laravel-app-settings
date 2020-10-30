<?php

namespace EMedia\AppSettings\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use ElegantMedia\OxygenFoundation\Http\Traits\Web\CanCRUD;
use EMedia\AppSettings\Entities\Settings\SettingsRepository;
use ValidationException;

class ManageSettingsController extends Controller
{

	use CanCRUD;

	public function __construct(SettingsRepository $repo)
	{
		$this->repo = $repo;

		$this->resourceEntityName = 'Settings';

		$this->viewsVendorName = 'app-settings';

		$this->resourcePrefix = 'manage';

		$this->isDestroyAllowed = true;
	}

}
