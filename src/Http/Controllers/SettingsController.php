<?php


namespace EMedia\AppSettings\Http\Controllers;


use App\Http\Controllers\Controller;
use EMedia\AppSettings\Entities\Setting;
use EMedia\AppSettings\Entities\SettingsRepository;
use EMedia\AppSettings\Facades\Setting as SettingFacade;
use EMedia\Formation\Builder\Formation;
use Illuminate\Http\Request;
use InvalidArgumentException;
use ValidationException;

class SettingsController extends Controller
{

	/**
	 * @var SettingsRepository
	 */
	private $settingsRepo;

	public function __construct(SettingsRepository $settingsRepo)
	{
		$this->settingsRepo = $settingsRepo;

		// $this->middleware('auth.acl:permissions[edit-site-settings]');
	}

	public function index()
	{
		$data = [
			'allItems' => $this->settingsRepo->search(),
			'pageTitle' => 'Site Settings',
		];

		return view('app-settings::settings.index', $data);
	}

	public function create()
	{
		$entity = new Setting();

		$data = [
			'pageTitle' => 'Add New Setting',
			'entity' => $entity,
			'form' => new Formation($entity),
		];

		return view('app-settings::settings.form', $data);
	}

	public function edit($id)
	{
		$setting = $this->settingsRepo->find($id);
		if (!$setting) {
			return redirect()->route('settings')->with('error', 'Unable to find a setting with the given ID.');
		}

		$data = [
			'pageTitle' => 'Edit Setting',
			'entity' => $setting,
			'form' => new Formation($setting),
		];

		return view('app-settings::settings.form', $data);
	}

	public function store(Request $request)
	{
		try {
			SettingFacade::setByArray($request->only([
				'setting_key',
				'setting_value',
				'setting_data_type',
				'description'
			]));
		} catch (InvalidArgumentException $ex) {
			return back()->with('error', $ex->getMessage());
		}

		return redirect()->route('manage.settings.index')->with('success', 'Setting saved.');
	}

	public function update(Request $request, $id)
	{
		try {
			SettingFacade::update($id, $request->only([
				'setting_key',
				'setting_value',
				'setting_data_type',
				'description'
			]));
		} catch (InvalidArgumentException $ex) {
			return back()->with('error', $ex->getMessage());
		}

		return redirect()->route('manage.settings.index')->with('success', 'Setting saved.');
	}

	public function destroy($id)
	{
		$setting = $this->settingsRepo->find($id);

		if (!$setting->is_key_editable) {
			return back()->with('error', 'This key cannot be deleted.');
		}

		$this->settingsRepo->delete($id);

		return back()->with('success', 'Setting removed.');
	}

}