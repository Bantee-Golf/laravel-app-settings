<?php


namespace EMedia\AppSettings;


use EMedia\AppSettings\Entities\Setting;
use EMedia\AppSettings\Entities\SettingsRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class SettingsManager
{

	/**
	 * @var SettingsRepository
	 */
	private $settingsRepo;

	public function __construct(SettingsRepository $settingsRepo)
	{
		$this->settingsRepo = $settingsRepo;
	}

	public function set($key, $value, $dataType = null, $description = null)
	{
		echo 'set called with key ' . $key;
		$data = [
			'setting_key' => $key,
			'setting_value' => $value,
			'setting_data_type' => $dataType,
			'description' => $description,
		];

		return $this->setByArray($data);
	}

	public function update($id, $data)
	{
		$this->validate($data, false);
		$setting = $this->settingsRepo->find($id);

		if (!$setting) {
			throw new InvalidArgumentException("Invalid setting ID");
		}

		return $this->settingsRepo->update($setting, $data);
	}

	public function setByArray($data)
	{
		$this->validate($data);

		return $this->settingsRepo->create($data);
	}

	/**
	 *
	 * Retrieve a setting from the database
	 *
	 * @param $key
	 *
	 * @return string
	 */
	public function get($key)
	{
		$setting = Setting::where('setting_key', $key)->first();

		if ($setting) {
			return $setting->setting_value;
		}

		return '';
	}

	protected function validate($data, $isNewRecord = true)
	{
		$rules = [
			'setting_key'  => 'required|unique:settings,setting_key',
			'setting_value' => 'required',
		];

		if (!$isNewRecord) {
			// if this is not a new record, it won't be unique in the DB
			$rules['setting_key'] = 'required';
		}

		$validator = Validator::make($data, $rules);

		if ($validator->fails())
		{
			$message = implode(' ', $validator->messages()->all());
		    throw new InvalidArgumentException($message);
		}
	}

}