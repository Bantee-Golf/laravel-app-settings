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
				'setting_key' 		=> 'setting_1',
				'setting_value' 	=> 10
			],
			[
				'setting_key' 		=> 'setting_2_non_editable_key',
				'setting_value' 	=> 'false',
				'setting_data_type' => 'boolean',
				'is_key_editable'	=> false,
			],
			[
				'setting_key' 		=> 'setting_3_non_editable_value',
				'setting_value' 	=> 'false',
				'setting_data_type' => 'boolean',
				'is_value_editable' => false,
			],
			*/
            [
                'setting_key' => 'ABOUT_US',
                'setting_data_type' => 'string',
                'description' => 'Content for the about us screen.',
                'is_key_editable'	=> false,
            ],
            [
                'setting_key' => 'PRIVACY_POLICY',
                'setting_data_type' => 'string',
                'description' => 'Content for application privacy policy.',
                'is_key_editable'	=> false,
            ],
            [
                'setting_key' => 'TERMS_AND_CONDITIONS',
                'setting_data_type' => 'string',
                'description' => 'Content for application terms and conditins.',
                'is_key_editable'	=> false,
            ],
		];

		$this->seedButDontCreateDuplicates($data, Setting::class, 'setting_key', 'setting_key');
	}
}
