<?php

use EMedia\AppSettings\Entities\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

	use \EMedia\QuickData\Database\Seeds\Traits\SeedsWithoutDuplicates;

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// seed the settings, without creating any duplicates

		$data = [
			/*
			[
				'setting_key' 		=> 'resultsPerCrawl',
				'setting_value' 	=> 10
			],
			[
				'setting_key' 		=> 'proxiesActive',
				'setting_value' 	=> 'false',
				'setting_data_type' => 'boolean'
			],
			*/
		];

		$this->seedButDontCreateDuplicates($data, Setting::class, 'setting_key', 'setting_key');
	}
}
